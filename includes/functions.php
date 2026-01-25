<?php
/**
 * CLICOM - Fonctions Helpers & Utilitaires
 * Fichier: includes/functions.php
 * Version: 1.0
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db_connect.php';

// =================================================
// SÉCURITÉ & SANITIZATION
// =================================================

/**
 * Protection XSS - Échappe les sorties HTML
 */
function h($string) {
    return htmlspecialchars($string ?? '', ENT_QUOTES, 'UTF-8');
}

/**
 * Nettoie une chaîne (trim + strip_tags)
 */
function clean($string) {
    return trim(strip_tags($string ?? ''));
}

/**
 * Valide un email
 */
function is_valid_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Protection CSRF - Génère un token
 */
function csrf_token() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

/**
 * Protection CSRF - Vérifie le token
 */
function csrf_verify($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

/**
 * Génère un token sécurisé (portail client, etc.)
 */
function generate_secure_token($length = 32) {
    return bin2hex(random_bytes($length));
}

/**
 * Hash SHA256 pour les tokens
 */
function hash_token($token) {
    return hash('sha256', $token);
}

// =================================================
// AUTHENTIFICATION
// =================================================

/**
 * Démarre la session si pas déjà active
 */
function init_session() {
    if (session_status() === PHP_SESSION_NONE) {
        ini_set('session.cookie_httponly', 1);
        ini_set('session.cookie_secure', 1); // HTTPS uniquement
        ini_set('session.cookie_samesite', 'Lax');
        session_name('CLICOM_SESSION');
        session_start();
    }
}

/**
 * Vérifie si l'utilisateur est connecté
 */
function is_logged_in() {
    init_session();
    return isset($_SESSION['user_id']) && isset($_SESSION['user_role']);
}

/**
 * Redirige si pas connecté
 */
function require_login($redirect_to = '/crm/login.php') {
    if (!is_logged_in()) {
        header('Location: ' . $redirect_to);
        exit;
    }
}

/**
 * Vérifie le rôle de l'utilisateur
 */
function has_role($role) {
    return is_logged_in() && $_SESSION['user_role'] === $role;
}

/**
 * Récupère les infos de l'utilisateur connecté
 */
function current_user() {
    if (!is_logged_in()) {
        return null;
    }
    
    $db = getDB();
    $stmt = $db->prepare("SELECT id, username, email, role FROM users WHERE id = ? AND is_active = 1");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch();
}

/**
 * Connexion utilisateur
 */
function login_user($username, $password) {
    $db = getDB();
    
    $stmt = $db->prepare("SELECT id, username, email, password_hash, role FROM users WHERE username = ? AND is_active = 1");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password_hash'])) {
        init_session();
        session_regenerate_id(true);
        
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['username'] = $user['username'];
        
        // MAJ last_login
        $update = $db->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
        $update->execute([$user['id']]);
        
        return true;
    }
    
    return false;
}

/**
 * Déconnexion
 */
function logout_user() {
    init_session();
    $_SESSION = [];
    session_destroy();
    setcookie(session_name(), '', time() - 3600, '/');
}

// =================================================
// HELPERS BASE DE DONNÉES
// =================================================

/**
 * Récupère un client par ID
 */
function get_client($id) {
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM clients WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

/**
 * Liste tous les clients
 */
function get_all_clients($filters = []) {
    $db = getDB();
    
    $sql = "SELECT * FROM clients WHERE 1=1";
    $params = [];
    
    if (!empty($filters['status'])) {
        $sql .= " AND status = ?";
        $params[] = $filters['status'];
    }
    
    if (!empty($filters['source'])) {
        $sql .= " AND source = ?";
        $params[] = $filters['source'];
    }
    
    $sql .= " ORDER BY created_at DESC";
    
    $stmt = $db->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll();
}

/**
 * Crée un nouveau client
 */
function create_client($data) {
    $db = getDB();
    
    $sql = "INSERT INTO clients (company_name, contact_name, email, phone, address, city, postal_code, country, source, status, notes, assigned_user_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $db->prepare($sql);
    $stmt->execute([
        $data['company_name'] ?? '',
        $data['contact_name'] ?? null,
        $data['email'] ?? '',
        $data['phone'] ?? null,
        $data['address'] ?? null,
        $data['city'] ?? null,
        $data['postal_code'] ?? null,
        $data['country'] ?? 'CH',
        $data['source'] ?? 'website',
        $data['status'] ?? 'lead',
        $data['notes'] ?? null,
        $data['assigned_user_id'] ?? null
    ]);
    
    return $db->lastInsertId();
}

/**
 * Génère un numéro de devis unique
 */
function generate_quote_number() {
    $year = date('Y');
    $db = getDB();
    
    $stmt = $db->prepare("SELECT COUNT(*) as count FROM quotes WHERE quote_number LIKE ?");
    $stmt->execute(["DEVIS-$year-%"]);
    $count = $stmt->fetch()['count'] + 1;
    
    return sprintf("DEVIS-%s-%03d", $year, $count);
}

/**
 * Génère un numéro de facture unique
 */
function generate_invoice_number() {
    $year = date('Y');
    $db = getDB();
    
    $stmt = $db->prepare("SELECT COUNT(*) as count FROM invoices WHERE invoice_number LIKE ?");
    $stmt->execute(["FACT-$year-%"]);
    $count = $stmt->fetch()['count'] + 1;
    
    return sprintf("FACT-%s-%03d", $year, $count);
}

/**
 * Calcule le total d'un devis/facture avec TVA
 */
function calculate_totals($subtotal, $vat_rate = 7.70) {
    $vat_amount = round($subtotal * ($vat_rate / 100), 2);
    $total = round($subtotal + $vat_amount, 2);
    
    return [
        'subtotal' => $subtotal,
        'vat_rate' => $vat_rate,
        'vat_amount' => $vat_amount,
        'total' => $total
    ];
}

// =================================================
// HELPERS PORTAIL CLIENT
// =================================================

/**
 * Génère un token d'accès portail pour un client
 */
function generate_portal_token($client_id, $expiry_days = null) {
    $db = getDB();
    $token = generate_secure_token(32);
    $token_hash = hash_token($token);
    
    $expiry_days = $expiry_days ?? PORTAL_TOKEN_EXPIRY_DAYS;
    $expires_at = date('Y-m-d H:i:s', strtotime("+$expiry_days days"));
    
    $sql = "INSERT INTO portal_tokens (client_id, token_hash, expires_at, is_active) VALUES (?, ?, ?, 1)";
    $stmt = $db->prepare($sql);
    $stmt->execute([$client_id, $token_hash, $expires_at]);
    
    return $token; // Retourne le token en clair (à envoyer au client)
}

/**
 * Vérifie un token de portail client
 */
function verify_portal_token($token) {
    $db = getDB();
    $token_hash = hash_token($token);
    
    $sql = "SELECT pt.*, c.* FROM portal_tokens pt 
            JOIN clients c ON pt.client_id = c.id 
            WHERE pt.token_hash = ? AND pt.is_active = 1 
            AND (pt.expires_at IS NULL OR pt.expires_at > NOW())";
    
    $stmt = $db->prepare($sql);
    $stmt->execute([$token_hash]);
    $result = $stmt->fetch();
    
    if ($result) {
        // MAJ dernière utilisation
        $update = $db->prepare("UPDATE portal_tokens SET last_accessed = NOW() WHERE id = ?");
        $update->execute([$result['id']]);
    }
    
    return $result;
}

// =================================================
// HELPERS EMAIL (Basique - À améliorer avec SMTP)
// =================================================

/**
 * Envoie un email simple
 */
function send_email($to, $subject, $message, $from = null) {
    $from = $from ?? SMTP_FROM_EMAIL;
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    return @mail($to, $subject, $message, $headers);
}

// =================================================
// HELPERS DIVERS
// =================================================

/**
 * Formate un montant en CHF
 */
function format_money($amount) {
    return number_format($amount, 2, '.', '\'') . ' CHF';
}

/**
 * Formate une date
 */
function format_date($date, $format = 'd.m.Y') {
    if (empty($date)) return '';
    return date($format, strtotime($date));
}

/**
 * Redirige vers une URL
 */
function redirect($url) {
    header("Location: $url");
    exit;
}

/**
 * Retourne le HTML d'une alerte
 */
function alert($message, $type = 'info') {
    $colors = [
        'success' => 'bg-green-50 text-green-700 border-green-500',
        'error' => 'bg-red-50 text-red-700 border-red-500',
        'warning' => 'bg-yellow-50 text-yellow-700 border-yellow-500',
        'info' => 'bg-blue-50 text-blue-700 border-blue-500'
    ];
    
    $class = $colors[$type] ?? $colors['info'];
    
    return "<div class='rounded-lg border-l-4 p-4 text-sm $class'>" . h($message) . "</div>";
}

/**
 * Logs une erreur
 */
function log_error($message, $context = []) {
    $log_file = STORAGE_PATH . '/logs/app.log';
    $timestamp = date('Y-m-d H:i:s');
    $context_str = !empty($context) ? ' | Context: ' . json_encode($context) : '';
    $log_message = "[$timestamp] ERROR: $message$context_str\n";
    
    @file_put_contents($log_file, $log_message, FILE_APPEND);
}
