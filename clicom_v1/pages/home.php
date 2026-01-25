<!-- PAGE ACCUEIL -->
<section class="hero">
    <div class="container">
        <div class="hero-content fade-in">
            <div class="hero-label"><?= h(t('hero_label')) ?></div>
            <h1 class="hero-title"><?= t('hero_title') ?></h1>
            <p class="hero-subtitle"><?= h(t('hero_subtitle')) ?></p>
            
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="<?= lang_link('quote') ?>" class="btn btn-primary btn-lg"><?= h(t('cta_quote')) ?></a>
                <a href="<?= lang_link('services') ?>" class="btn btn-secondary btn-lg"><?= h(t('cta_discover')) ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Section Services Aperçu -->
<section class="section">
    <div class="container">
        <div class="text-center mb-lg">
            <h2>8 Pôles d'Expertise</h2>
            <p class="text-muted">Solutions complètes pour votre transformation digitale</p>
        </div>
        
        <div class="grid grid-4">
            <?php
            $services = [
                ['title' => 'Stratégie', 'icon' => '🎯', 'desc' => 'Positionnement et roadmap digitale'],
                ['title' => 'Web Dev', 'icon' => '💻', 'desc' => 'Sites performants et sur mesure'],
                ['title' => 'Ads & SEO', 'icon' => '📈', 'desc' => 'Acquisition et visibilité'],
                ['title' => 'Studio', 'icon' => '🎨', 'desc' => 'Création graphique et branding'],
                ['title' => 'Influence', 'icon' => '📱', 'desc' => 'Partenariats créateurs'],
                ['title' => 'Events', 'icon' => '🎉', 'desc' => 'Événements et activations'],
                ['title' => 'Ambassadeurs', 'icon' => '👥', 'desc' => 'Programme fidélité clients'],
                ['title' => 'Prospection', 'icon' => '🎯', 'desc' => 'Génération de leads B2B']
            ];
            
            foreach ($services as $service): ?>
                <div class="card">
                    <div class="card-icon"><?= $service['icon'] ?></div>
                    <h3 class="card-title"><?= h($service['title']) ?></h3>
                    <p class="card-text"><?= h($service['desc']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-lg">
            <a href="<?= lang_link('services') ?>" class="btn btn-primary">Voir tous les services</a>
        </div>
    </div>
</section>

<!-- Section Méthode 30-60-90 -->
<section class="section" style="background: linear-gradient(135deg, #f9fafb 0%, #ffffff 100%);">
    <div class="container">
        <div class="text-center mb-lg">
            <h2>Méthode 30-60-90 Jours</h2>
            <p class="text-muted">Une approche progressive pour des résultats mesurables</p>
        </div>
        
        <div class="grid grid-3">
            <div class="card">
                <div style="font-size: 2rem; font-weight: 700; color: var(--color-primary); margin-bottom: 1rem;">30</div>
                <h3 class="card-title">Fondations</h3>
                <p class="card-text">Audit, stratégie, et mise en place des outils essentiels pour démarrer.</p>
            </div>
            <div class="card">
                <div style="font-size: 2rem; font-weight: 700; color: var(--color-primary); margin-bottom: 1rem;">60</div>
                <h3 class="card-title">Accélération</h3>
                <p class="card-text">Déploiement des campagnes, optimisations et premières itérations.</p>
            </div>
            <div class="card">
                <div style="font-size: 2rem; font-weight: 700; color: var(--color-primary); margin-bottom: 1rem;">90</div>
                <h3 class="card-title">Performance</h3>
                <p class="card-text">Analyse des résultats, scaling et passage à l'autonomie.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Final -->
<section class="section" style="background: var(--color-primary); color: white;">
    <div class="container text-center">
        <h2 style="color: white;">Prêt à démarrer votre projet ?</h2>
        <p style="color: rgba(255,255,255,0.9); font-size: 1.125rem; margin-bottom: 2rem;">
            Obtenez un devis personnalisé en moins de 48h
        </p>
        <a href="<?= lang_link('quote') ?>" class="btn" style="background: white; color: var(--color-primary);">
            Générer mon devis →
        </a>
    </div>
</section>
