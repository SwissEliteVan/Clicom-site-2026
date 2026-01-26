<?php
/**
 * CLICOM - API Endpoint: Générateur de Devis
 * Fichier: api/quote.php
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

try {
    $input = json_decode(file_get_contents('php://input'), true);
    
    // Validation des champs requis
    $required = ['company_name', 'contact_name', 'email', 'services', 'urgency'];
    foreach ($required as $field) {
        if (empty($input[$field])) {
            echo json_encode(['success' => false, 'message' => "Le champ $field est requis."]);
            exit;
        }
    }
    
    if (!is_valid_email($input['email'])) {
        echo json_encode(['success' => false, 'message' => 'Email invalide.']);
        exit;
    }
    
    if (!is_array($input['services']) || count($input['services']) === 0) {
        echo json_encode(['success' => false, 'message' => 'Sélectionnez au moins un service.']);
        exit;
    }
    
    $db = getDB();
    
    // 1. Créer ou récupérer le client
    $stmt = $db->prepare("SELECT id FROM clients WHERE email = ?");
    $stmt->execute([$input['email']]);
    $existing_client = $stmt->fetch();
    
    if ($existing_client) {
        $client_id = $existing_client['id'];
    } else {
        $client_id = create_client([
            'company_name' => $input['company_name'],
            'contact_name' => $input['contact_name'],
            'email' => $input['email'],
            'phone' => $input['phone'] ?? null,
            'source' => 'website',
            'status' => 'lead'
        ]);
    }
    
    // 2. Créer un devis draft
    $quote_number = generate_quote_number();
    $services_list = implode(', ', $input['services']);
    $estimated_total = floatval(str_replace(['\'', ' ', 'CHF'], '', $input['estimated_total'] ?? '0'));
    
    // Calcul TVA
    $subtotal = $estimated_total / 1.077; // Retirer la TVA
    $totals = calculate_totals($subtotal, 7.70);
    
    $sql = "INSERT INTO quotes (quote_number, client_id, title, description, subtotal, vat_rate, vat_amount, total_amount, status, notes, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'draft', ?, NOW())";
    
    $stmt = $db->prepare($sql);
    $stmt->execute([
        $quote_number,
        $client_id,
        "Devis automatique - $services_list",
        "Services : $services_list\nUrgence : {$input['urgency']}\n\nMessage client :\n{$input['message']}",
        $totals['subtotal'],
        $totals['vat_rate'],
        $totals['vat_amount'],
        $totals['total'],
        "Budget indicatif : " . ($input['budget_range'] ?? 'Non spécifié')
    ]);
    
    $quote_id = $db->lastInsertId();
    
    // 3. Créer une tâche de suivi
    $task_sql = "INSERT INTO tasks (title, description, priority, status, due_date, client_id, created_at) 
                 VALUES (?, ?, 'high', 'pending', DATE_ADD(NOW(), INTERVAL 2 DAY), ?, NOW())";
    
    $task_stmt = $db->prepare($task_sql);
    $task_stmt->execute([
        "Répondre à la demande de devis - {$input['company_name']}",
        "Client: {$input['contact_name']}\nEmail: {$input['email']}\nDevis: $quote_number",
        $client_id
    ]);
    
    // 4. Envoyer un email de confirmation au client (optionnel)
    if (SMTP_ENABLED) {
        $email_subject = "Votre demande de devis CLICOM - $quote_number";
        $email_body = "
            <h2>Bonjour {$input['contact_name']},</h2>
            <p>Nous avons bien reçu votre demande de devis.</p>
            <p><strong>Numéro de devis :</strong> $quote_number</p>
            <p><strong>Estimation indicative :</strong> " . format_money($totals['total']) . "</p>
            <p>Notre équipe vous répondra sous 48h avec une proposition détaillée.</p>
            <p>Cordialement,<br>L'équipe CLICOM</p>
        ";
        
        send_email($input['email'], $email_subject, $email_body);
    }
    
    // Succès
    echo json_encode([
        'success' => true,
        'message' => 'Demande envoyée avec succès',
        'quote_number' => $quote_number,
        'estimated_total' => format_money($totals['total'])
    ]);
    
    log_error("Quote created: $quote_number for client ID $client_id", ['quote_id' => $quote_id]);
    
} catch (Exception $e) {
    log_error('Quote API Error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Erreur serveur. Veuillez réessayer.']);
}
