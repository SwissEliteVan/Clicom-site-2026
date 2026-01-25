<?php
$pageTitle = 'Accueil - ' . SITE_NAME;
require_once __DIR__ . '/includes/header.php';
?>

<main>
    <!-- Hero Section -->
    <section class="tech-grid-bg tech-radial-bg section-spacing">
        <div class="container-tech">
            <div style="max-width: 800px; margin: 0 auto; text-align: center;">
                <!-- Badge -->
                <div style="display: inline-flex; align-items: center; gap: 8px; padding: 8px 16px; background: var(--accent-soft); border: 1px solid var(--accent-border); border-radius: var(--radius-lg); font-size: 0.875rem; font-weight: 500; color: var(--accent-primary); margin-bottom: 2rem;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>
                    </svg>
                    <span>Marketing Digital Premium</span>
                </div>

                <!-- Hero Title -->
                <h1 style="font-family: var(--font-display); font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 700; line-height: 1.1; letter-spacing: -0.03em; color: var(--text-primary); margin-bottom: 1.5rem;">
                    Le marketing qui fait <span style="color: var(--accent-primary);">vendre</span>
                </h1>

                <!-- Hero Description -->
                <p style="font-size: clamp(1.125rem, 2vw, 1.375rem); line-height: 1.6; color: var(--text-secondary); margin-bottom: 3rem;">
                    Transformez vos visiteurs en clients fidèles grâce à des stratégies digitales innovantes et mesurables.
                </p>

                <!-- Hero CTA Buttons -->
                <div style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; align-items: center;">
                    <a href="contact.php" class="tech-button-primary">
                        <span>Demander un devis</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                    <a href="services.php" class="tech-button-secondary">
                        <span>Découvrir nos solutions</span>
                    </a>
                </div>

                <!-- Stats -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(140px, 1fr)); gap: 2rem; margin-top: 4rem; padding-top: 3rem; border-top: 1px solid var(--border-color);">
                    <div>
                        <div style="font-family: var(--font-display); font-size: 2rem; font-weight: 700; color: var(--accent-primary); margin-bottom: 0.5rem;">+250</div>
                        <div style="font-size: 0.875rem; color: var(--text-tertiary); text-transform: uppercase; letter-spacing: 0.05em;">Clients satisfaits</div>
                    </div>
                    <div>
                        <div style="font-family: var(--font-display); font-size: 2rem; font-weight: 700; color: var(--accent-primary); margin-bottom: 0.5rem;">98%</div>
                        <div style="font-size: 0.875rem; color: var(--text-tertiary); text-transform: uppercase; letter-spacing: 0.05em;">Taux de satisfaction</div>
                    </div>
                    <div>
                        <div style="font-family: var(--font-display); font-size: 2rem; font-weight: 700; color: var(--accent-primary); margin-bottom: 0.5rem;">+15ans</div>
                        <div style="font-size: 0.875rem; color: var(--text-tertiary); text-transform: uppercase; letter-spacing: 0.05em;">D'expérience</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="section-spacing" style="background: var(--bg-secondary);">
        <div class="container-tech">
            <!-- Section Header -->
            <div style="max-width: 700px; margin: 0 auto 4rem; text-align: center;">
                <div style="display: inline-block; padding: 6px 12px; background: var(--accent-soft); border-radius: var(--radius-md); font-size: 0.75rem; font-weight: 600; color: var(--accent-primary); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1rem;">
                    Nos Solutions
                </div>
                <h2 style="font-family: var(--font-display); font-size: clamp(2rem, 4vw, 3rem); font-weight: 700; line-height: 1.2; letter-spacing: -0.02em; color: var(--text-primary); margin-bottom: 1rem;">
                    Des services qui transforment votre présence digitale
                </h2>
                <p style="font-size: 1.125rem; line-height: 1.7; color: var(--text-secondary);">
                    De la stratégie à l'exécution, nous vous accompagnons à chaque étape de votre croissance digitale.
                </p>
            </div>

            <!-- Services Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                <!-- Service 1: Web & Design -->
                <div class="tech-card">
                    <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; background: var(--accent-soft); border-radius: var(--radius-md); margin-bottom: 1.5rem;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2">
                            <rect x="2" y="3" width="20" height="14" rx="2"/>
                            <line x1="8" y1="21" x2="16" y2="21"/>
                            <line x1="12" y1="17" x2="12" y2="21"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-display); font-size: 1.375rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.75rem;">
                        Web & Design
                    </h3>
                    <p style="color: var(--text-secondary); line-height: 1.7; margin-bottom: 1.5rem;">
                        Sites web performants, interfaces intuitives et expériences utilisateur exceptionnelles qui convertissent vos visiteurs en clients.
                    </p>
                    <a href="services.php#web-design" style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; color: var(--accent-primary); text-decoration: none; transition: gap 0.2s ease;">
                        <span>En savoir plus</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                <!-- Service 2: Marketing Digital -->
                <div class="tech-card">
                    <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; background: var(--accent-soft); border-radius: var(--radius-md); margin-bottom: 1.5rem;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2">
                            <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-display); font-size: 1.375rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.75rem;">
                        Marketing Digital
                    </h3>
                    <p style="color: var(--text-secondary); line-height: 1.7; margin-bottom: 1.5rem;">
                        Stratégies SEO, campagnes publicitaires et content marketing qui génèrent du trafic qualifié et des résultats mesurables.
                    </p>
                    <a href="services.php#marketing" style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; color: var(--accent-primary); text-decoration: none; transition: gap 0.2s ease;">
                        <span>En savoir plus</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                <!-- Service 3: Branding & Identité -->
                <div class="tech-card">
                    <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; background: var(--accent-soft); border-radius: var(--radius-md); margin-bottom: 1.5rem;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2">
                            <circle cx="12" cy="12" r="10"/>
                            <path d="M12 6v6l4 2"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-display); font-size: 1.375rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.75rem;">
                        Branding & Identité
                    </h3>
                    <p style="color: var(--text-secondary); line-height: 1.7; margin-bottom: 1.5rem;">
                        Création de marques mémorables avec logos professionnels, chartes graphiques et identités visuelles cohérentes.
                    </p>
                    <a href="services.php#branding" style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; color: var(--accent-primary); text-decoration: none; transition: gap 0.2s ease;">
                        <span>En savoir plus</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                <!-- Service 4: E-commerce -->
                <div class="tech-card">
                    <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; background: var(--accent-soft); border-radius: var(--radius-md); margin-bottom: 1.5rem;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2">
                            <circle cx="9" cy="21" r="1"/>
                            <circle cx="20" cy="21" r="1"/>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-display); font-size: 1.375rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.75rem;">
                        E-commerce
                    </h3>
                    <p style="color: var(--text-secondary); line-height: 1.7; margin-bottom: 1.5rem;">
                        Boutiques en ligne optimisées, tunnels de vente performants et intégrations de paiement sécurisées pour maximiser vos ventes.
                    </p>
                    <a href="services.php#ecommerce" style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; color: var(--accent-primary); text-decoration: none; transition: gap 0.2s ease;">
                        <span>En savoir plus</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                <!-- Service 5: Analytics & Data -->
                <div class="tech-card">
                    <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; background: var(--accent-soft); border-radius: var(--radius-md); margin-bottom: 1.5rem;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2">
                            <line x1="18" y1="20" x2="18" y2="10"/>
                            <line x1="12" y1="20" x2="12" y2="4"/>
                            <line x1="6" y1="20" x2="6" y2="14"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-display); font-size: 1.375rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.75rem;">
                        Analytics & Data
                    </h3>
                    <p style="color: var(--text-secondary); line-height: 1.7; margin-bottom: 1.5rem;">
                        Analyse de données, rapports personnalisés et insights stratégiques pour optimiser vos performances et votre ROI.
                    </p>
                    <a href="services.php#analytics" style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; color: var(--accent-primary); text-decoration: none; transition: gap 0.2s ease;">
                        <span>En savoir plus</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>

                <!-- Service 6: Support & Maintenance -->
                <div class="tech-card">
                    <div style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center; background: var(--accent-soft); border-radius: var(--radius-md); margin-bottom: 1.5rem;">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="2">
                            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                        </svg>
                    </div>
                    <h3 style="font-family: var(--font-display); font-size: 1.375rem; font-weight: 600; color: var(--text-primary); margin-bottom: 0.75rem;">
                        Support & Maintenance
                    </h3>
                    <p style="color: var(--text-secondary); line-height: 1.7; margin-bottom: 1.5rem;">
                        Maintenance proactive, mises à jour régulières et support technique réactif pour garantir la performance de vos plateformes.
                    </p>
                    <a href="services.php#support" style="display: inline-flex; align-items: center; gap: 8px; font-weight: 600; color: var(--accent-primary); text-decoration: none; transition: gap 0.2s ease;">
                        <span>En savoir plus</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="section-spacing tech-grid-bg">
        <div class="container-tech">
            <div style="display: grid; grid-template-columns: 1fr; gap: 4rem; align-items: center;">
                <div style="max-width: 600px;">
                    <div style="display: inline-block; padding: 6px 12px; background: var(--accent-soft); border-radius: var(--radius-md); font-size: 0.75rem; font-weight: 600; color: var(--accent-primary); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1rem;">
                        Pourquoi Clic COM
                    </div>
                    <h2 style="font-family: var(--font-display); font-size: clamp(2rem, 4vw, 3rem); font-weight: 700; line-height: 1.2; letter-spacing: -0.02em; color: var(--text-primary); margin-bottom: 1.5rem;">
                        Une expertise reconnue en Suisse
                    </h2>
                    <p style="font-size: 1.125rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: 2rem;">
                        Depuis plus de 15 ans, nous accompagnons les entreprises suisses dans leur transformation digitale avec passion, précision et résultats mesurables.
                    </p>

                    <!-- Feature List -->
                    <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                        <div style="display: flex; gap: 1rem;">
                            <div style="flex-shrink: 0; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; background: var(--accent-soft); border-radius: 50%;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="3">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </div>
                            <div>
                                <h4 style="font-family: var(--font-display); font-weight: 600; color: var(--text-primary); margin-bottom: 0.25rem;">Approche sur mesure</h4>
                                <p style="color: var(--text-secondary); line-height: 1.6;">Chaque projet est unique. Nous adaptons nos solutions à vos objectifs spécifiques.</p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 1rem;">
                            <div style="flex-shrink: 0; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; background: var(--accent-soft); border-radius: 50%;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="3">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </div>
                            <div>
                                <h4 style="font-family: var(--font-display); font-weight: 600; color: var(--text-primary); margin-bottom: 0.25rem;">ROI mesurable</h4>
                                <p style="color: var(--text-secondary); line-height: 1.6;">Des résultats concrets et quantifiables pour chaque franc investi dans votre marketing.</p>
                            </div>
                        </div>

                        <div style="display: flex; gap: 1rem;">
                            <div style="flex-shrink: 0; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; background: var(--accent-soft); border-radius: 50%;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--accent-primary)" stroke-width="3">
                                    <polyline points="20 6 9 17 4 12"/>
                                </svg>
                            </div>
                            <div>
                                <h4 style="font-family: var(--font-display); font-weight: 600; color: var(--text-primary); margin-bottom: 0.25rem;">Support continu</h4>
                                <p style="color: var(--text-secondary); line-height: 1.6;">Une équipe dédiée disponible pour vous accompagner à chaque étape de votre croissance.</p>
                            </div>
                        </div>
                    </div>

                    <div style="margin-top: 2rem;">
                        <a href="apropos.php" class="tech-button-primary">
                            <span>Découvrir notre histoire</span>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="section-spacing" style="background: var(--bg-secondary);">
        <div class="container-tech">
            <!-- Section Header -->
            <div style="max-width: 700px; margin: 0 auto 4rem; text-align: center;">
                <div style="display: inline-block; padding: 6px 12px; background: var(--accent-soft); border-radius: var(--radius-md); font-size: 0.75rem; font-weight: 600; color: var(--accent-primary); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1rem;">
                    Témoignages
                </div>
                <h2 style="font-family: var(--font-display); font-size: clamp(2rem, 4vw, 3rem); font-weight: 700; line-height: 1.2; letter-spacing: -0.02em; color: var(--text-primary); margin-bottom: 1rem;">
                    Ils nous font confiance
                </h2>
                <p style="font-size: 1.125rem; line-height: 1.7; color: var(--text-secondary);">
                    Découvrez les retours d'expérience de nos clients satisfaits.
                </p>
            </div>

            <!-- Testimonials Grid -->
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem;">
                <!-- Testimonial 1 -->
                <div class="tech-card">
                    <div style="margin-bottom: 1.5rem;">
                        <div style="display: flex; gap: 4px; margin-bottom: 1rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                        </div>
                        <p style="line-height: 1.7; color: var(--text-secondary);">
                            "Une équipe professionnelle qui a transformé notre présence en ligne. Nos ventes ont augmenté de 40% en 6 mois grâce à leur stratégie digitale."
                        </p>
                    </div>
                    <div style="display: flex; align-items: center; gap: 12px; padding-top: 1rem; border-top: 1px solid var(--border-color);">
                        <div style="width: 48px; height: 48px; border-radius: 50%; background: var(--accent-soft); display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--accent-primary);">
                            MC
                        </div>
                        <div>
                            <div style="font-weight: 600; color: var(--text-primary);">Marc Chevalier</div>
                            <div style="font-size: 0.875rem; color: var(--text-tertiary);">CEO, TechStart SA</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="tech-card">
                    <div style="margin-bottom: 1.5rem;">
                        <div style="display: flex; gap: 4px; margin-bottom: 1rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14 14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                        </div>
                        <p style="line-height: 1.7; color: var(--text-secondary);">
                            "Clic COM a redesigné notre site web et notre identité visuelle. Le résultat est exceptionnel et nos clients adorent la nouvelle image de notre marque."
                        </p>
                    </div>
                    <div style="display: flex; align-items: center; gap: 12px; padding-top: 1rem; border-top: 1px solid var(--border-color);">
                        <div style="width: 48px; height: 48px; border-radius: 50%; background: var(--accent-soft); display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--accent-primary);">
                            SD
                        </div>
                        <div>
                            <div style="font-weight: 600; color: var(--text-primary);">Sophie Dubois</div>
                            <div style="font-size: 0.875rem; color: var(--text-tertiary);">Directrice Marketing, SwissStyle</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="tech-card">
                    <div style="margin-bottom: 1.5rem;">
                        <div style="display: flex; gap: 4px; margin-bottom: 1rem;">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="var(--accent-primary)">
                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
                            </svg>
                        </div>
                        <p style="line-height: 1.7; color: var(--text-secondary);">
                            "Un accompagnement de qualité du début à la fin. Notre boutique en ligne génère maintenant plus de revenus que notre magasin physique!"
                        </p>
                    </div>
                    <div style="display: flex; align-items: center; gap: 12px; padding-top: 1rem; border-top: 1px solid var(--border-color);">
                        <div style="width: 48px; height: 48px; border-radius: 50%; background: var(--accent-soft); display: flex; align-items: center; justify-content: center; font-weight: 600; color: var(--accent-primary);">
                            LP
                        </div>
                        <div>
                            <div style="font-weight: 600; color: var(--text-primary);">Laurent Perret</div>
                            <div style="font-size: 0.875rem; color: var(--text-tertiary);">Propriétaire, Boutique Alpine</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-spacing tech-gradient-bg tech-grid-bg">
        <div class="container-tech">
            <div style="max-width: 700px; margin: 0 auto; text-align: center;">
                <h2 style="font-family: var(--font-display); font-size: clamp(2rem, 4vw, 3rem); font-weight: 700; line-height: 1.2; letter-spacing: -0.02em; color: var(--text-primary); margin-bottom: 1.5rem;">
                    Prêt à transformer votre présence digitale?
                </h2>
                <p style="font-size: 1.125rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: 3rem;">
                    Discutons de votre projet et découvrez comment nous pouvons vous aider à atteindre vos objectifs de croissance.
                </p>
                <div style="display: flex; flex-wrap: wrap; gap: 1rem; justify-content: center; align-items: center;">
                    <a href="contact.php" class="tech-button-primary" style="padding: 16px 32px; font-size: 1rem;">
                        <span>Demander un devis gratuit</span>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <polyline points="12 5 19 12 12 19"></polyline>
                        </svg>
                    </a>
                    <a href="realisations.php" class="tech-button-secondary" style="padding: 16px 32px; font-size: 1rem;">
                        <span>Voir nos réalisations</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
