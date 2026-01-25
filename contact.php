<?php
  $pageTitle = 'Contact';
  include 'header.php';

  $errors = [];
  $success = '';

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? 'Demande depuis le site');
    $message = trim($_POST['message'] ?? '');

    if ($name === '') {
      $errors[] = 'Le nom est requis.';
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors[] = "Un email valide est requis.";
    }
    if ($message === '') {
      $errors[] = 'Le message est requis.';
    }

    if (empty($errors)) {
      $to = 'contact@clicom-studio.fr';
      $mailSubject = "Contact site : " . substr($subject, 0, 120);
      $body = "Nom: " . htmlspecialchars($name) . "\n";
      $body .= "Email: " . htmlspecialchars($email) . "\n\n";
      $body .= "Message:\n" . htmlspecialchars($message) . "\n";

      $headers = 'From: ' . $email . "\r\n" .
                 'Reply-To: ' . $email . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

      // Tentative d'envoi — Hostinger supporte généralement mail() mais vérifiez la configuration
      if (@mail($to, $mailSubject, $body, $headers)) {
        $success = 'Merci — votre message a bien été envoyé. Nous vous répondrons rapidement.';
        // vider les champs après envoi
        $name = $email = $subject = $message = '';
      } else {
        $errors[] = "Impossible d'envoyer le message pour le moment. Essayez plus tard.";
      }
    }
  }
?>

<section class="bg-slate-50">
  <div class="mx-auto w-full max-w-6xl px-6 py-16">
    <div class="grid gap-10 md:grid-cols-2">
      <div>
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-600">Contact</p>
        <h1 class="mt-3 text-3xl font-semibold">Parlons de votre site</h1>
        <p class="mt-4 text-sm text-slate-600">
          Dites-nous ce que vous souhaitez : type de site, pages nécessaires, délais. Nous vous répondons rapidement avec
          une proposition claire et sans jargon.
        </p>
        <div class="mt-6 space-y-3 text-sm text-slate-600">
          <p><strong>Adresse :</strong> 12 rue des Entrepreneurs, 69000 Lyon</p>
          <p><strong>Email :</strong> contact@clicom-studio.fr</p>
          <p><strong>Téléphone :</strong> 04 78 00 00 00</p>
        </div>
      </div>

      <div>
        <?php if (!empty($errors)): ?>
          <div class="mb-4 rounded-lg border-l-4 border-red-500 bg-red-50 p-4 text-sm text-red-700">
            <ul class="list-inside list-disc">
              <?php foreach ($errors as $e): ?>
                <li><?php echo htmlspecialchars($e); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php if ($success): ?>
          <div class="mb-4 rounded-lg border-l-4 border-green-500 bg-green-50 p-4 text-sm text-green-700">
            <?php echo htmlspecialchars($success); ?>
          </div>
        <?php endif; ?>

        <form method="post" class="rounded-2xl bg-white p-6 shadow-sm" novalidate>
          <div class="grid gap-4">
            <div>
              <label class="text-sm font-medium text-slate-700" for="name">Nom</label>
              <input
                class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none"
                type="text"
                id="name"
                name="name"
                placeholder="Votre nom"
                required
                value="<?php echo isset($name) ? htmlspecialchars($name) : ''; ?>"
              />
            </div>

            <div>
              <label class="text-sm font-medium text-slate-700" for="email">Email</label>
              <input
                class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none"
                type="email"
                id="email"
                name="email"
                placeholder="vous@email.fr"
                required
                value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>"
              />
            </div>

            <div>
              <label class="text-sm font-medium text-slate-700" for="subject">Sujet</label>
              <input
                class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none"
                type="text"
                id="subject"
                name="subject"
                placeholder="Ex: Site vitrine pour artisan"
                value="<?php echo isset($subject) ? htmlspecialchars($subject) : ''; ?>"
              />
            </div>

            <div>
              <label class="text-sm font-medium text-slate-700" for="message">Message</label>
              <textarea
                class="mt-1 w-full rounded-lg border border-slate-200 px-3 py-2 text-sm focus:border-indigo-500 focus:outline-none"
                id="message"
                name="message"
                rows="5"
                placeholder="Décrivez votre projet"
                required
              ><?php echo isset($message) ? htmlspecialchars($message) : ''; ?></textarea>
            </div>

            <button
              class="rounded-full bg-indigo-600 px-5 py-2 text-sm font-semibold text-white transition hover:bg-indigo-700"
              type="submit"
            >
              Envoyer la demande
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>
