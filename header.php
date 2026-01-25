<?php
  $pageTitle = $pageTitle ?? 'Clicom Studio';
?>
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Clicom Studio, agence de communication digitale pour PME ambitieuses." />
    <title><?php echo htmlspecialchars($pageTitle); ?> | Clicom Studio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body class="bg-white text-slate-900 antialiased">
    <header class="border-b border-slate-200 bg-white/90 backdrop-blur">
      <div class="mx-auto flex w-full max-w-6xl items-center justify-between px-6 py-4">
        <a href="index.php" class="flex items-center gap-2 text-xl font-semibold text-slate-900">
          <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-indigo-600 text-white">C</span>
          <span>Clicom Studio</span>
        </a>
        <nav class="hidden items-center gap-8 text-sm font-medium text-slate-600 md:flex">
          <a class="transition hover:text-slate-900" href="index.php">Accueil</a>
          <a class="transition hover:text-slate-900" href="index.php#services">Services</a>
          <a class="transition hover:text-slate-900" href="index.php#process">Méthode</a>
          <a class="transition hover:text-slate-900" href="index.php#projets">Projets</a>
          <a class="rounded-full bg-indigo-600 px-4 py-2 text-white transition hover:bg-indigo-700" href="contact.php">Contact</a>
        </nav>
        <button
          class="inline-flex items-center justify-center rounded-full border border-slate-200 p-2 text-slate-600 transition hover:bg-slate-100 md:hidden"
          type="button"
          id="mobile-menu-button"
          aria-expanded="false"
          aria-controls="mobile-menu"
        >
          <span class="sr-only">Ouvrir le menu</span>
          <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
      <div class="hidden border-t border-slate-200 bg-white px-6 py-4 md:hidden" id="mobile-menu">
        <nav class="flex flex-col gap-4 text-sm font-medium text-slate-600">
          <a class="transition hover:text-slate-900" href="index.php">Accueil</a>
          <a class="transition hover:text-slate-900" href="index.php#services">Services</a>
          <a class="transition hover:text-slate-900" href="index.php#process">Méthode</a>
          <a class="transition hover:text-slate-900" href="index.php#projets">Projets</a>
          <a class="rounded-full bg-indigo-600 px-4 py-2 text-center text-white transition hover:bg-indigo-700" href="contact.php">Contact</a>
        </nav>
      </div>
    </header>
    <main>
