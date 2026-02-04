<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/includes/admin_layout.php';

// Récupérer tous les devis avec les informations client
$db = getDB();
$stmt = $db->query("SELECT 
    quotes.id, 
    quotes.reference, 
    quotes.total_ttc, 
    quotes.created_at, 
    quotes.status, 
    clients.name AS client_name
FROM quotes
JOIN clients ON quotes.client_id = clients.id
ORDER BY quotes.created_at DESC");
$quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fonction pour générer le badge de statut
function getStatusBadge($status) {
    $badges = [
        'draft' => '<span style="background-color: #6c757d; color: white; padding: 3px 8px; border-radius: 4px;">Brouillon</span>',
        'sent' => '<span style="background-color: #0d6efd; color: white; padding: 3px 8px; border-radius: 4px;">Envoyé</span>',
        'accepted' => '<span style="background-color: #198754; color: white; padding: 3px 8px; border-radius: 4px;">Accepté</span>',
        'invoiced' => '<span style="background-color: #6f42c1; color: white; padding: 3px 8px; border-radius: 4px;">Facturé</span>'
    ];
    return $badges[$status] ?? $status;
}

$pageTitle = "Gestion des Devis";
ob_start();
?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Liste des Devis</h3>
        <a href="quote_create.php" class="btn btn-primary">+ Nouveau Devis</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Référence</th>
                        <th>Client</th>
                        <th>Montant TTC (CHF)</th>
                        <th>Date</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($quotes as $quote): ?>
                        <tr>
                            <td><?= htmlspecialchars($quote['reference']) ?></td>
                            <td><?= htmlspecialchars($quote['client_name']) ?></td>
                            <td><?= number_format($quote['total_ttc'], 2) ?></td>
                            <td><?= date('d.m.Y', strtotime($quote['created_at'])) ?></td>
                            <td><?= getStatusBadge($quote['status']) ?></td>
                            <td>
                                <a href="quote_create.php?id=<?= $quote['id'] ?>" class="btn btn-sm btn-outline-secondary">Modifier</a>
                                <a href="#" class="btn btn-sm btn-outline-info" onclick="copyClientLink('<?= $quote['id'] ?>')">Lien Client</a>
                                <?php if ($quote['status'] === 'accepted'): ?>
                                    <a href="quote_to_invoice.php?id=<?= $quote['id'] ?>" class="btn btn-sm btn-success">Convertir en Facture</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function copyClientLink(quoteId) {
    const link = `<?= BASE_URL ?>/public_html/view_quote.php?token=${generateToken(quoteId)}`;
    navigator.clipboard.writeText(link).then(() => {
        alert('Lien client copié dans le presse-papiers !');
    });
}

function generateToken(quoteId) {
    // Logique de génération de token sécurisé (implémentée dans quote_create.php)
    return btoa(`quote_${quoteId}_${new Date().getTime()}`);
}
</script>

<?php
$pageContent = ob_get_clean();
include 'includes/admin_layout.php';
?>
