    </main>

    <!-- Footer - Tech Abstract Premium -->
    <footer class="tech-footer">
        <div class="container-tech py-16">
            <div class="tech-footer-grid">
                <!-- Company Info -->
                <div class="tech-footer-company">
                    <div class="tech-footer-brand">
                        <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor" class="tech-footer-dot" aria-hidden="true">
                            <circle cx="4" cy="4" r="4" />
                        </svg>
                        <p class="tech-footer-name"><?php echo SITE_NAME; ?></p>
                    </div>
                    <p class="tech-footer-slogan"><?php echo SITE_SLOGAN; ?></p>
                    <div class="tech-footer-contact">
                        <div class="tech-contact-item">
                            <span class="tech-contact-label">Email</span>
                            <a href="mailto:<?php echo SITE_EMAIL; ?>" class="tech-contact-link"><?php echo SITE_EMAIL; ?></a>
                        </div>
                        <div class="tech-contact-item">
                            <span class="tech-contact-label">Téléphone</span>
                            <a href="tel:<?php echo str_replace(' ', '', SITE_PHONE); ?>" class="tech-contact-link"><?php echo SITE_PHONE; ?></a>
                        </div>
                        <div class="tech-contact-item">
                            <span class="tech-contact-label">Site</span>
                            <a href="<?php echo SITE_URL; ?>" class="tech-contact-link"><?php echo SITE_URL; ?></a>
                        </div>
                    </div>
                </div>

                <!-- Useful Links -->
                <div class="tech-footer-section">
                    <h3 class="tech-footer-title">Liens utiles</h3>
                    <ul class="tech-footer-list">
                        <li><a href="services.php" class="tech-footer-link">Services</a></li>
                        <li><a href="realisations.php" class="tech-footer-link">Réalisations</a></li>
                        <li><a href="blog.php" class="tech-footer-link">Blog</a></li>
                        <li><a href="contact.php" class="tech-footer-link">Contact</a></li>
                    </ul>
                </div>

                <!-- Legal -->
                <div class="tech-footer-section">
                    <h3 class="tech-footer-title">Légal</h3>
                    <ul class="tech-footer-list">
                        <li><a href="mentions-legales.php" class="tech-footer-link">Mentions légales</a></li>
                        <li><a href="politique-confidentialite.php" class="tech-footer-link">Politique de confidentialité</a></li>
                        <li><a href="cookies.php" class="tech-footer-link">Cookies</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Copyright -->
        <div class="tech-footer-bottom">
            <div class="container-tech py-6">
                <div class="tech-footer-copyright">
                    <span>© <?php echo $currentYear; ?> <?php echo SITE_NAME; ?>. Tous droits réservés.</span>
                    <span class="tech-footer-separator" aria-hidden="true">·</span>
                    <span>Conçu en Suisse</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html>
