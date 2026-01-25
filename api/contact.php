<?php
/**
 * CLICOM - API Endpoint: Formulaire de Contact
 * Fichier: api/contact.php
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
    
    // Validation
    $required = ['name', 'email', 'subject', 'message'];
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
    
    // Envoyer l'email
    $to = SMTP_FROM_EMAIL;
    $email_subject = "[Contact CLICOM] {$input['subject']}";
    $email_body = "
        <h3>Nouveau message depuis le formulaire de contact</h3>
        <p><strong>Nom :</strong> {$input['name']}</p>
        <p><strong>Email :</strong> {$input['email']}</p>
        <p><strong>Téléphone :</strong> " . ($input['phone'] ?? 'Non fourni') . "</p>
        <p><strong>Sujet :</strong> {$input['subject']}</p>
        <hr>
        <p><strong>Message :</strong></p>
        <p>" . nl2br(h($input['message'])) . "</p>
    ";
    
    if (send_email($to, $email_subject, $email_body, $input['email'])) {
        echo json_encode([
            'success' => true,
            'message' => 'Message envoyé avec succès.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Erreur lors de l\'envoi. Veuillez réessayer.'
        ]);
    }
    
} catch (Exception $e) {
    log_error('Contact API Error: ' . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Erreur serveur.']);
}
