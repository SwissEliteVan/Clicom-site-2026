<!-- PAGE SERVICES -->
<section class="section">
    <div class="container container-narrow">
        <div class="text-center mb-lg">
            <h1>Nos 8 Pôles d'Expertise</h1>
            <p class="text-muted">Solutions complètes pour votre transformation digitale</p>
        </div>
    </div>
</section>

<?php
$services_detailed = [
    [
        'title' => '1. Stratégie Digitale',
        'icon' => '🎯',
        'services' => [
            'Audit digital complet',
            'Positionnement & proposition de valeur',
            'Roadmap transformation digitale',
            'Analyse concurrentielle',
            'KPIs et tableaux de bord'
        ]
    ],
    [
        'title' => '2. Développement Web',
        'icon' => '💻',
        'services' => [
            'Sites vitrines sur mesure',
            'E-commerce & plateformes',
            'Applications web (CRM, outils métier)',
            'Maintenance & hébergement',
            'Performance & sécurité'
        ]
    ],
    [
        'title' => '3. Ads & Référencement',
        'icon' => '📈',
        'services' => [
            'Google Ads (Search, Display, Shopping)',
            'Meta Ads (Facebook, Instagram)',
            'SEO technique & contenu',
            'Marketing automation',
            'Analytics & reporting'
        ]
    ],
    [
        'title' => '4. Studio Créatif',
        'icon' => '🎨',
        'services' => [
            'Identité visuelle & branding',
            'Design UI/UX',
            'Motion design & vidéo',
            'Photographie produit',
            'Supports print & digital'
        ]
    ],
    [
        'title' => '5. Marketing d\'Influence',
        'icon' => '📱',
        'services' => [
            'Identification des créateurs pertinents',
            'Négociation & contrats',
            'Gestion de campagnes',
            'Suivi des performances',
            'Relations long-terme'
        ]
    ],
    [
        'title' => '6. Events & Activations',
        'icon' => '🎉',
        'services' => [
            'Organisation d\'événements corporate',
            'Lancements produits',
            'Pop-ups & activations terrain',
            'Livestreams & webinaires',
            'Community management live'
        ]
    ],
    [
        'title' => '7. Programme Ambassadeurs',
        'icon' => '👥',
        'services' => [
            'Recrutement d\'ambassadeurs clients',
            'Plateforme de gestion',
            'Gamification & récompenses',
            'UGC (contenus utilisateurs)',
            'Advocacy & bouche-à-oreille'
        ]
    ],
    [
        'title' => '8. Prospection B2B',
        'icon' => '🔍',
        'services' => [
            'Cold email & LinkedIn outreach',
            'Lead generation & qualification',
            'CRM & automation',
            'Scripts de vente',
            'Suivi & reporting'
        ]
    ]
];

$alternate = false;
foreach ($services_detailed as $service):
    $alternate = !$alternate;
    $bgClass = $alternate ? 'background: var(--color-bg);' : '';
?>
    <section class="section-sm" style="<?= $bgClass ?>">
        <div class="container">
            <div class="grid grid-2" style="align-items: center;">
                <div>
                    <div style="font-size: 3rem; margin-bottom: 1rem;"><?= $service['icon'] ?></div>
                    <h2><?= h($service['title']) ?></h2>
                    <ul style="list-style: none; padding: 0; margin-top: 1.5rem;">
                        <?php foreach ($service['services'] as $item): ?>
                            <li style="padding: 0.5rem 0; display: flex; align-items: center; gap: 0.75rem;">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                    <circle cx="10" cy="10" r="10" fill="var(--color-primary)" opacity="0.1"/>
                                    <path d="M6 10l3 3 5-6" stroke="var(--color-primary)" stroke-width="2" fill="none"/>
                                </svg>
                                <?= h($item) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div>
                    <div class="card" style="background: linear-gradient(135deg, rgba(51, 102, 255, 0.05), rgba(51, 102, 255, 0.1)); border: 2px solid var(--color-border);">
                        <h4>Demander un devis pour ce pôle</h4>
                        <p class="text-muted" style="margin-bottom: 1.5rem;">Nous établissons une proposition sur mesure adaptée à vos besoins.</p>
                        <a href="<?= lang_link('quote') ?>" class="btn btn-primary">Obtenir un devis →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>

<!-- CTA Final -->
<section class="section" style="background: var(--color-text); color: white; text-align: center;">
    <div class="container">
        <h2 style="color: white;">Besoin de plusieurs pôles ?</h2>
        <p style="color: rgba(255,255,255,0.8); margin-bottom: 2rem;">
            Nous proposons des offres packagées pour maximiser votre ROI.
        </p>
        <a href="<?= lang_link('pricing') ?>" class="btn" style="background: white; color: var(--color-text);">
            Voir nos tarifs →
        </a>
    </div>
</section>
