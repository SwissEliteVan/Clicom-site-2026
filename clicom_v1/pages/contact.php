<!-- PAGE CONTACT -->
<section class="section">
    <div class="container">
        <div class="grid grid-2" style="gap: 3rem; align-items: start;">
            <!-- Colonne Gauche: Informations -->
            <div>
                <h1>Contactez-nous</h1>
                <p class="text-muted mb-lg">Une question ? Un projet ? Écrivez-nous, nous répondons sous 24h.</p>
                
                <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                    <div style="display: flex; gap: 1rem;">
                        <div style="width: 48px; height: 48px; background: rgba(51, 102, 255, 0.1); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            📧
                        </div>
                        <div>
                            <strong>Email</strong><br>
                            <a href="mailto:contact@clicom.ch">contact@clicom.ch</a>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 1rem;">
                        <div style="width: 48px; height: 48px; background: rgba(51, 102, 255, 0.1); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            📞
                        </div>
                        <div>
                            <strong>Téléphone</strong><br>
                            <a href="tel:+41221234567">+41 22 123 45 67</a>
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 1rem;">
                        <div style="width: 48px; height: 48px; background: rgba(51, 102, 255, 0.1); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                            📍
                        </div>
                        <div>
                            <strong>Adresse</strong><br>
                            Rue du Marché 12<br>
                            1204 Genève, Suisse
                        </div>
                    </div>
                </div>
                
                <div class="mt-lg">
                    <h3 style="margin-bottom: 1rem;">Horaires</h3>
                    <p class="text-muted">
                        Lundi - Vendredi: 9h00 - 18h00<br>
                        Samedi - Dimanche: Fermé
                    </p>
                </div>
            </div>
            
            <!-- Colonne Droite: Formulaire -->
            <div class="card">
                <form id="contactForm">
                    <div class="form-group">
                        <label class="form-label">Nom *</label>
                        <input type="text" name="name" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Email *</label>
                        <input type="email" name="email" class="form-input" required>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Téléphone</label>
                        <input type="tel" name="phone" class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Sujet *</label>
                        <select name="subject" class="form-select" required>
                            <option value="">-- Sélectionner --</option>
                            <option value="quote">Demande de devis</option>
                            <option value="info">Demande d'informations</option>
                            <option value="support">Support technique</option>
                            <option value="partnership">Partenariat</option>
                            <option value="other">Autre</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">Message *</label>
                        <textarea name="message" class="form-textarea" rows="5" required></textarea>
                    </div>
                    
                    <div id="contactMessages"></div>
                    
                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        Envoyer →
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
const contactForm = document.getElementById('contactForm');
const contactMessages = document.getElementById('contactMessages');

contactForm.addEventListener('submit', async (e) => {
    e.preventDefault();
    
    const formData = new FormData(contactForm);
    const data = Object.fromEntries(formData.entries());
    
    try {
        const response = await fetch('/api/contact.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });
        
        const result = await response.json();
        
        if (result.success) {
            contactMessages.innerHTML = '<div class="form-success" style="padding: 1rem; background: var(--color-success); color: white; border-radius: var(--radius-md); margin-bottom: 1rem;">✓ Message envoyé ! Nous vous répondrons rapidement.</div>';
            contactForm.reset();
        } else {
            contactMessages.innerHTML = '<div class="form-error" style="padding: 1rem; background: var(--color-error); color: white; border-radius: var(--radius-md); margin-bottom: 1rem;">Erreur : ' + (result.message || 'Veuillez réessayer.') + '</div>';
        }
    } catch (error) {
        contactMessages.innerHTML = '<div class="form-error" style="padding: 1rem; background: var(--color-error); color: white; border-radius: var(--radius-md); margin-bottom: 1rem;">Erreur réseau. Veuillez réessayer.</div>';
    }
});
</script>
