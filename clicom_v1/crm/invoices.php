<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/includes/admin_layout.php';

// Récupérer toutes les factures avec les informations client
$db = getDB();
$stmt = $db->query("SELECT
    invoices.id,
    invoices.invoice_number,
    invoices.total_amount,
    invoices.issue_date,
    invoices.due_date,
    invoices.status,
    clients.name AS client_name
FROM invoices
JOIN clients ON invoices.client_id = clients.id
ORDER BY invoices.issue_date DESC");
$invoices = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fonction pour générer le badge de statut
function getInvoiceStatusBadge($status, $dueDate) {
    $today = date('Y-m-d');
    
    if ($status === 'paid') {
        return '<span class="badge bg-success">Payée</span>';
    } elseif ($status === 'overdue') {
        return '<span class="badge bg-danger">En retard</span>';
    } elseif ($today > $dueDate) {
        return '<span class="badge bg-danger">En retard</span>';
    } else {
        return '<span class="badge bg-warning text-dark">En attente</span>';
    }
}

$pageTitle = "Gestion des Factures";
ob_start();
?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Liste des Factures</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Numéro</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Échéance</th>
                        <th>Montant TTC (CHF)</th>
                        <th>Statut</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($invoices as $invoice): ?>
                        <tr>
                            <td><?= htmlspecialchars($invoice['invoice_number']) ?></td>
                            <td><?= htmlspecialchars($invoice['client_name']) ?></td>
                            <td><?= date('d.m.Y', strtotime($invoice['issue_date'])) ?></td>
                            <td><?= date('d.m.Y', strtotime($invoice['due_date'])) ?></td>
                            <td><?= number_format($invoice['total_amount'], 2) ?></td>
                            <td><?= getInvoiceStatusBadge($invoice['status'], $invoice['due_date']) ?></td>
                            <td>
                                <a href="view_invoice.php?token=<?= $invoice['token'] ?>" class="btn btn-sm btn-info" target="_blank">Voir</a>
                                <?php if ($invoice['status'] === 'sent' || $invoice['status'] === 'overdue'): ?>
                                    <a href="mark_paid.php?id=<?= $invoice['id'] ?>" class="btn btn-sm btn-success">Marquer Payée</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$pageContent = ob_get_clean();
include 'includes/admin_layout.php';
?>