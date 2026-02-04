<?php
require_once __DIR__ . '/../includes/config.php';
require_once __DIR__ . '/../includes/db_connect.php';
require_once __DIR__ . '/includes/admin_layout.php';

$db = getDB();
$quoteId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$quote = [];
$items = [];

// Load existing quote if editing
if ($quoteId) {
    $stmt = $db->prepare("SELECT * FROM quotes WHERE id = ?");
    $stmt->execute([$quoteId]);
    $quote = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($quote) {
        $stmt = $db->prepare("SELECT * FROM quote_items WHERE quote_id = ?");
        $stmt->execute([$quoteId]);
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Get clients for dropdown
$clients = $db->query("SELECT id, name FROM clients ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = $quoteId ? "Modifier Devis #{$quote['reference']}" : "Créer un Nouveau Devis";
ob_start();
?>

<div class="card">
    <div class="card-header">
        <h3 class="mb-0"><?= $pageTitle ?></h3>
    </div>
    <div class="card-body">
        <form id="quoteForm" method="post" action="quote_save.php">
            <input type="hidden" name="quote_id" value="<?= $quoteId ?>">
            
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="client_id">Client</label>
                        <select class="form-control" id="client_id" name="client_id" required>
                            <option value="">Sélectionner un client</option>
                            <?php foreach ($clients as $client): ?>
                                <option value="<?= $client['id'] ?>" <?= ($quote && $quote['client_id'] == $client['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($client['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="issue_date">Date d'émission</label>
                        <input type="date" class="form-control" id="issue_date" name="issue_date" 
                               value="<?= $quote ? htmlspecialchars($quote['issue_date']) : date('Y-m-d') ?>" required>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="validity">Validité (jours)</label>
                        <input type="number" class="form-control" id="validity" name="validity" 
                               value="<?= $quote ? $quote['validity'] : '30' ?>" min="1" required>
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="d-flex justify-content-between mb-2">
                    <h5>Produits/Services</h5>
                    <div>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="addPack('launch')">
                            + Pack Lancement
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="addPack('pro')">
                            + Pack Pro
                        </button>
                        <button type="button" class="btn btn-sm btn-success" onclick="addItemRow()">
                            + Ajouter Ligne
                        </button>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered" id="itemsTable">
                        <thead class="thead-light">
                            <tr>
                                <th width="45%">Description</th>
                                <th width="15%">Quantité</th>
                                <th width="15%">Prix Unitaire (CHF)</th>
                                <th width="15%">Total Ligne (CHF)</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($items)): ?>
                                <tr id="row_0">
                                    <td><input type="text" class="form-control" name="items[0][description]" required></td>
                                    <td><input type="number" class="form-control qty" name="items[0][quantity]" min="1" value="1" step="1" required></td>
                                    <td><input type="number" class="form-control price" name="items[0][unit_price]" min="0" step="0.01" required></td>
                                    <td class="line-total">0.00</td>
                                    <td><button type="button" class="btn btn-sm btn-danger" onclick="removeRow(0)">✕</button></td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($items as $index => $item): ?>
                                    <tr id="row_<?= $index ?>">
                                        <td><input type="text" class="form-control" name="items[<?= $index ?>][description]" value="<?= htmlspecialchars($item['description']) ?>" required></td>
                                        <td><input type="number" class="form-control qty" name="items[<?= $index ?>][quantity]" min="1" value="<?= $item['quantity'] ?>" step="1" required></td>
                                        <td><input type="number" class="form-control price" name="items[<?= $index ?>][unit_price]" min="0" value="<?= $item['unit_price'] ?>" step="0.01" required></td>
                                        <td class="line-total"><?= number_format($item['quantity'] * $item['unit_price'], 2) ?></td>
                                        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeRow(<?= $index ?>)">✕</button></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 offset-md-6">
                    <div class="d-flex justify-content-between mb-2">
                        <span>Sous-total:</span>
                        <span id="subtotal">0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>TVA (8.1%):</span>
                        <span id="vat">0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2 font-weight-bold">
                        <span>Total TTC:</span>
                        <span id="total">0.00</span>
                    </div>
                </div>
            </div>
            
            <div class="mt-4">
                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                <button type="button" class="btn btn-secondary" onclick="window.history.back()">Annuler</button>
            </div>
        </form>
    </div>
</div>

<script>
let rowCount = <?= count($items) ?: 1 ?>;

// Add new item row
function addItemRow() {
    const tbody = document.querySelector('#itemsTable tbody');
    const newRow = document.createElement('tr');
    newRow.id = `row_${rowCount}`;
    newRow.innerHTML = `
        <td><input type="text" class="form-control" name="items[${rowCount}][description]" required></td>
        <td><input type="number" class="form-control qty" name="items[${rowCount}][quantity]" min="1" value="1" step="1" required></td>
        <td><input type="number" class="form-control price" name="items[${rowCount}][unit_price]" min="0" step="0.01" required></td>
        <td class="line-total">0.00</td>
        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeRow(${rowCount})">✕</button></td>
    `;
    tbody.appendChild(newRow);
    
    // Add event listeners to new inputs
    const inputs = newRow.querySelectorAll('.qty, .price');
    inputs.forEach(input => {
        input.addEventListener('input', calculateTotals);
    });
    
    rowCount++;
}

// Remove row
function removeRow(index) {
    const row = document.getElementById(`row_${index}`);
    if (row) row.remove();
    calculateTotals();
}

// Add predefined packs
function addPack(type) {
    const packs = {
        launch: [
            { description: "Site Vitrine 5 pages", unit_price: 2500 },
            { description: "Hébergement Premium (1 an)", unit_price: 300 },
            { description: "Formation CMS (2h)", unit_price: 200 }
        ],
        pro: [
            { description: "Site E-commerce", unit_price: 5000 },
            { description: "Module Paiement Sécurisé", unit_price: 1000 },
            { description: "Maintenance Annuelle", unit_price: 1200 },
            { description: "SEO Avancé", unit_price: 1500 }
        ]
    };
    
    const selectedPack = packs[type] || [];
    
    selectedPack.forEach(item => {
        addItemRow();
        const lastRow = document.querySelector('#itemsTable tbody tr:last-child');
        lastRow.querySelector('[name$="[description]"]').value = item.description;
        lastRow.querySelector('[name$="[unit_price]"]').value = item.unit_price;
        
        // Trigger calculation
        const qtyInput = lastRow.querySelector('.qty');
        const priceInput = lastRow.querySelector('.price');
        qtyInput.dispatchEvent(new Event('input'));
        priceInput.dispatchEvent(new Event('input'));
    });
}

// Calculate line totals and grand totals
function calculateTotals() {
    let subtotal = 0;
    
    // Calculate line totals
    document.querySelectorAll('#itemsTable tbody tr').forEach(row => {
        const qtyInput = row.querySelector('.qty');
        const priceInput = row.querySelector('.price');
        const lineTotalCell = row.querySelector('.line-total');
        
        if (qtyInput && priceInput && lineTotalCell) {
            const qty = parseFloat(qtyInput.value) || 0;
            const price = parseFloat(priceInput.value) || 0;
            const lineTotal = qty * price;
            
            lineTotalCell.textContent = lineTotal.toFixed(2);
            subtotal += lineTotal;
        }
    });
    
    // Calculate VAT and total
    const vatRate = 0.081; // 8.1%
    const vat = subtotal * vatRate;
    const total = subtotal + vat;
    
    // Update display
    document.getElementById('subtotal').textContent = subtotal.toFixed(2);
    document.getElementById('vat').textContent = vat.toFixed(2);
    document.getElementById('total').textContent = total.toFixed(2);
}

// Initialize event listeners
document.addEventListener('DOMContentLoaded', function() {
    // Add event listeners to existing inputs
    document.querySelectorAll('.qty, .price').forEach(input => {
        input.addEventListener('input', calculateTotals);
    });
    
    // Initial calculation
    calculateTotals();
});
</script>

<?php
$pageContent = ob_get_clean();
include 'includes/admin_layout.php';
?>