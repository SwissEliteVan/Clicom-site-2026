<?php include('includes/header.php'); ?>

<main>
    <section class="login-container">
        <h1>Connexion à votre Espace Pro</h1>
        <form action="../crm/login_check.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn-primary">Accéder à mes demandes</button>
        </form>
        <a href="#" class="forgot-password">Mot de passe oublié ?</a>
    </section>
</main>

<?php include('includes/footer.php'); ?>