<!-- PAGE MÉTHODE 30-60-90 -->
<section class="section">
    <div class="container container-narrow text-center">
        <h1>Méthode 30-60-90 Jours</h1>
        <p class="text-muted">Une approche éprouvée pour transformer votre présence digitale en 3 mois</p>
    </div>
</section>

<!-- Visualisation Timeline -->
<section class="section" style="background: var(--color-bg);">
    <div class="container">
        <div style="position: relative; padding: 3rem 0;">
            <!-- Ligne centrale -->
            <div style="position: absolute; top: 0; bottom: 0; left: 50%; width: 2px; background: var(--color-border);"></div>
            
            <?php
            $phases = [
                [
                    'day' => '30',
                    'title' => 'Fondations',
                    'color' => '#3366ff',
                    'items' => [
                        'Audit digital complet (SEO, UX, concurrence)',
                        'Définition de la stratégie et des KPIs',
                        'Setup des outils (Analytics, CRM, Ads)',
                        'Création des premiers assets (site, contenus)',
                        'Formation équipe interne'
                    ],
                    'deliverable' => 'Stratégie documentée + Site/Landing page live'
                ],
                [
                    'day' => '60',
                    'title' => 'Accélération',
                    'color' => '#5580ff',
                    'items' => [
                        'Lancement campagnes Ads (Google, Meta)',
                        'Production contenu (blog, social, vidéo)',
                        'Optimisation UX basée sur données',
                        'Tests A/B et itérations rapides',
                        'Community management actif'
                    ],
                    'deliverable' => 'Premières conversions + Reporting intermédiaire'
                ],
                [
                    'day' => '90',
                    'title' => 'Performance',
                    'color' => '#2952cc',
                    'items' => [
                        'Analyse ROI et ajustements budgets',
                        'Scaling des canaux performants',
                        'Automatisation des process',
                        'Formation avancée pour autonomie',
                        'Roadmap 6 mois suivants'
                    ],
                    'deliverable' => 'Bilan complet + Passation pour autonomie'
                ]
            ];
            
            foreach ($phases as $index => $phase):
                $isLeft = $index % 2 === 0;
                $alignClass = $isLeft ? 'text-right' : 'text-left';
                $marginClass = $isLeft ? 'margin-right: 52%;' : 'margin-left: 52%;';
            ?>
                <div style="position: relative; margin-bottom: 4rem; <?= $marginClass ?>">
                    <!-- Cercle sur la ligne -->
                    <div style="position: absolute; <?= $isLeft ? 'right: -2.5rem;' : 'left: -2.5rem;' ?> top: 1rem; width: 3rem; height: 3rem; background: <?= $phase['color'] ?>; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 700; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        <?= $phase['day'] ?>
                    </div>
                    
                    <div class="card" style="border-left: 4px solid <?= $phase['color'] ?>;">
                        <h3 style="color: <?= $phase['color'] ?>;"><?= h($phase['title']) ?></h3>
                        
                        <ul style="list-style: none; padding: 0; margin: 1rem 0;">
                            <?php foreach ($phase['items'] as $item): ?>
                                <li style="padding: 0.35rem 0; display: flex; align-items: flex-start; gap: 0.5rem;">
                                    <span style="color: <?= $phase['color'] ?>;">▸</span>
                                    <span><?= h($item) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        
                        <div style="background: rgba(51, 102, 255, 0.05); padding: 1rem; border-radius: var(--radius-md); margin-top: 1rem;">
                            <strong>Livrable clé :</strong> <?= h($phase['deliverable']) ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Avantages de cette approche -->
<section class="section">
    <div class="container">
        <h2 class="text-center mb-lg">Pourquoi cette méthode fonctionne</h2>
        
        <div class="grid grid-3">
            <div class="card">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">📊</div>
                <h3>Data-driven</h3>
                <p class="text-muted">Chaque décision est basée sur des données réelles, pas sur des intuitions.</p>
            </div>
            
            <div class="card">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">⚡</div>
                <h3>Résultats rapides</h3>
                <p class="text-muted">Premières optimisations dès J+30. Vous voyez l'impact immédiatement.</p>
            </div>
            
            <div class="card">
                <div style="font-size: 2.5rem; margin-bottom: 1rem;">🎯</div>
                <h3>Autonomie</h3>
                <p class="text-muted">À J+90, votre équipe maîtrise les outils et peut continuer seule.</p>
            </div>
        </div>
    </div>
</section>

<!-- Cas d'usage -->
<section class="section" style="background: var(--color-bg);">
    <div class="container container-narrow">
        <h2 class="text-center mb-lg">Cas Clients</h2>
        
        <div style="display: flex; flex-direction: column; gap: 2rem;">
            <div class="card">
                <h4>PME Industrie (B2B)</h4>
                <p style="color: var(--color-text-muted); margin-bottom: 1rem;">Fabricant de machines-outils, 0 présence digitale</p>
                <div class="grid grid-3" style="margin-top: 1.5rem;">
                    <div>
                        <div style="font-size: 2rem; font-weight: 700; color: var(--color-success);">+240%</div>
                        <div style="font-size: 0.875rem; color: var(--color-text-muted);">Leads qualifiés</div>
                    </div>
                    <div>
                        <div style="font-size: 2rem; font-weight: 700; color: var(--color-success);">12</div>
                        <div style="font-size: 0.875rem; color: var(--color-text-muted);">Nouveaux clients</div>
                    </div>
                    <div>
                        <div style="font-size: 2rem; font-weight: 700; color: var(--color-success);">ROI 4.2x</div>
                        <div style="font-size: 0.875rem; color: var(--color-text-muted);">En 90 jours</div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <h4>E-commerce Mode (B2C)</h4>
                <p style="color: var(--color-text-muted); margin-bottom: 1rem;">Boutique en ligne, trafic stagnant</p>
                <div class="grid grid-3" style="margin-top: 1.5rem;">
                    <div>
                        <div style="font-size: 2rem; font-weight: 700; color: var(--color-success);">+180%</div>
                        <div style="font-size: 0.875rem; color: var(--color-text-muted);">Trafic organique</div>
                    </div>
                    <div>
                        <div style="font-size: 2rem; font-weight: 700; color: var(--color-success);">-35%</div>
                        <div style="font-size: 0.875rem; color: var(--color-text-muted);">Coût acquisition</div>
                    </div>
                    <div>
                        <div style="font-size: 2rem; font-weight: 700; color: var(--color-success);">ROI 3.8x</div>
                        <div style="font-size: 0.875rem; color: var(--color-text-muted);">En 90 jours</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section text-center">
    <div class="container">
        <h2>Prêt à lancer votre plan 30-60-90 ?</h2>
        <p class="text-muted mb-lg">Recevez une roadmap personnalisée et un devis en 48h</p>
        <a href="<?= lang_link('quote') ?>" class="btn btn-primary btn-lg">Démarrer mon projet →</a>
    </div>
</section>
