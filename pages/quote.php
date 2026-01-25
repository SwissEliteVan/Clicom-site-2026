<!-- PAGE GÉNÉRATEUR DE DEVIS INTERACTIF -->
<section class="section">
    <div class="container container-narrow">
        <div class="text-center mb-lg">
            <h1>Générateur de Devis Interactif</h1>
            <p class="text-muted">Obtenez une estimation personnalisée en 2 minutes</p>
        </div>
        
        <div class="card" style="max-width: 700px; margin: 0 auto;">
            <form id="quoteForm" style="display: flex; flex-direction: column; gap: 1.5rem;">
                <!-- Étape 1: Informations entreprise -->
                <div class="form-group">
                    <label class="form-label">Nom de l'entreprise *</label>
                    <input type="text" name="company_name" class="form-input" required>
                </div>
                
                <div class="grid grid-2">
                    <div class="form-group">
                        <label class="form-label">Votre nom *</label>
                        <input type="text" name="contact_name" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-input" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Téléphone</label>
                    <input type="tel" name="phone" class="form-input">
                </div>
                
                <!-- Étape 2: Sélection des services -->
                <div>
                    <label class="form-label">Services souhaités * (sélection multiple)</label>
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 1rem;">
                        <?php
                        $services = [
                            ['id' => 'strategie', 'name' => 'Stratégie', 'price' => 1500],
                            ['id' => 'web', 'name' => 'Développement Web', 'price' => 3000],
                            ['id' => 'ads', 'name' => 'Ads & SEO', 'price' => 2000],
                            ['id' => 'studio', 'name' => 'Studio Créatif', 'price' => 1800],
                            ['id' => 'influence', 'name' => 'Influence', 'price' => 2500],
                            ['id' => 'events', 'name' => 'Events', 'price' => 3500],
                            ['id' => 'ambassadeurs', 'name' => 'Ambassadeurs', 'price' => 2200],
                            ['id' => 'prospection', 'name' => 'Prospection B2B', 'price' => 1800]
                        ];
                        
                        foreach ($services as $service): ?>
                            <label style="display: flex; align-items: center; padding: 1rem; border: 2px solid var(--color-border); border-radius: var(--radius-md); cursor: pointer; transition: all var(--transition-fast);" class="service-option">
                                <input type="checkbox" name="services[]" value="<?= $service['id'] ?>" data-price="<?= $service['price'] ?>" style="margin-right: 0.75rem;">
                                <div>
                                    <div style="font-weight: 600;"><?= h($service['name']) ?></div>
                                    <div style="font-size: 0.875rem; color: var(--color-text-muted);"><?= $service['price'] ?> CHF</div>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Étape 3: Urgence -->
                <div class="form-group">
                    <label class="form-label">Délai souhaité *</label>
                    <select name="urgency" class="form-select" id="urgencySelect" required>
                        <option value="">-- Sélectionner --</option>
                        <option value="standard" data-multiplier="1.0">Standard (4-6 semaines)</option>
                        <option value="express" data-multiplier="1.3">Express (2-3 semaines) +30%</option>
                        <option value="urgent" data-multiplier="1.5">Urgent (< 2 semaines) +50%</option>
                    </select>
                </div>
                
                <!-- Étape 4: Budget indicatif -->
                <div class="form-group">
                    <label class="form-label">Budget indicatif (optionnel)</label>
                    <select name="budget_range" class="form-select">
                        <option value="">-- Non défini --</option>
                        <option value="0-2500">< 2'500 CHF</option>
                        <option value="2500-5000">2'500 - 5'000 CHF</option>
                        <option value="5000-10000">5'000 - 10'000 CHF</option>
                        <option value="10000+">10'000+ CHF</option>
                    </select>
                </div>
                
                <!-- Message -->
                <div class="form-group">
                    <label class="form-label">Description du projet</label>
                    <textarea name="message" class="form-textarea" rows="4" placeholder="Décrivez brièvement vos besoins et objectifs..."></textarea>
                </div>
                
                <!-- Estimation en temps réel -->
                <div id="estimationBox" style="background: linear-gradient(135deg, rgba(51, 102, 255, 0.05), rgba(51, 102, 255, 0.1)); padding: 1.5rem; border-radius: var(--radius-lg); border: 2px solid var(--color-primary); display: none;">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-size: 0.875rem; color: var(--color-text-muted); margin-bottom: 0.25rem;">Estimation totale</div>
                            <div style="font-size: 2rem; font-weight: 700; color: var(--color-primary);">
                                <span id="totalPrice">0</span> CHF
                            </div>
                            <div style="font-size: 0.75rem; color: var(--color-text-muted); margin-top: 0.25rem;">TVA 7.7% incluse</div>
                        </div>
                        <div style="text-align: right;">
                            <div style="font-size: 0.875rem; color: var(--color-text-muted);">Services sélectionnés</div>
                            <div style="font-size: 1.5rem; font-weight: 700;" id="serviceCount">0</div>
                        </div>
                    </div>
                </div>
                
                <!-- Messages -->
                <div id="formMessages"></div>
                
                <!-- Boutons -->
                <div style="display: flex; gap: 1rem;">
                    <button type="submit" class="btn btn-primary" style="flex: 1;">
                        Envoyer la demande de devis →
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
// Calcul en temps réel du devis
const form = document.getElementById('quoteForm');
const checkboxes = form.querySelectorAll('input[type="checkbox"][name="services[]"]');
const urgencySelect = document.getElementById('urgencySelect');
const estimationBox = document.getElementById('estimationBox');
const totalPriceEl = document.getElementById('totalPrice');
const serviceCountEl = document.getElementById('serviceCount');
const formMessages = document.getElementById('formMessages');

function calculateEstimate() {
    let subtotal = 0;
    let count = 0;
    
    // Somme des services sélectionnés
    checkboxes.forEach(cb => {
        if (cb.checked) {
            subtotal += parseFloat(cb.dataset.price);
            count++;
        }
    });
    
    // Multiplicateur d'urgence
    const urgency = urgencySelect.value;
    let multiplier = 1.0;
    if (urgency) {
        const selectedOption = urgencySelect.querySelector(`option[value="${urgency}"]`);
        multiplier = parseFloat(selectedOption.dataset.multiplier) || 1.0;
    }
    
    // Total avec TVA suisse 7.7%
    const totalHT = subtotal * multiplier;
    const totalTTC = totalHT * 1.077;
    
    // Affichage
    if (count > 0) {
        estimationBox.style.display = 'block';
        totalPriceEl.textContent = Math.round(totalTTC).toLocaleString('fr-CH');
        serviceCountEl.textContent = count;
    } else {
        estimationBox.style.display = 'none';
    }
}

// Mise à jour en temps réel
checkboxes.forEach(cb => cb.addEventListener('change', calculateEstimate));
urgencySelect.addEventListener('change', calculateEstimate);

// Effet visuel sur sélection
document.querySelectorAll('.service-option').forEach(label => {
    const checkbox = label.querySelector('input[type="checkbox"]');
    checkbox.addEventListener('change', () => {
        if (checkbox.checked) {
            label.style.borderColor = 'var(--color-primary)';
            label.style.background = 'rgba(51, 102, 255, 0.05)';
        } else {
            label.style.borderColor = 'var(--color-border)';
            label.style.background = 'transparent';
        }
    });
});

// Soumission du formulaire (AJAX vers API)
form.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());
    
    // Récupérer tous les services (checkboxes multiples)
    data.services = Array.from(formData.getAll('services[]'));
    
    // Ajouter l'estimation
    data.estimated_total = document.getElementById('totalPrice').textContent;
    
    try {
        const response = await fetch('/api/quote.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
        
        const result = await response.json();
        
        if (result.success) {
            formMessages.innerHTML = '<div class="form-success" style="padding: 1rem; background: var(--color-success); color: white; border-radius: var(--radius-md);">✓ Votre demande a été envoyée ! Nous vous répondrons sous 48h.</div>';
            form.reset();
            estimationBox.style.display = 'none';
            
            // Scroll vers le message
            formMessages.scrollIntoView({ behavior: 'smooth' });
        } else {
            formMessages.innerHTML = '<div class="form-error" style="padding: 1rem; background: var(--color-error); color: white; border-radius: var(--radius-md);">Erreur : ' + (result.message || 'Veuillez réessayer.') + '</div>';
        }
    } catch (error) {
        formMessages.innerHTML = '<div class="form-error" style="padding: 1rem; background: var(--color-error); color: white; border-radius: var(--radius-md);">Erreur réseau. Veuillez réessayer.</div>';
    }
});
</script>
