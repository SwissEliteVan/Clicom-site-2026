<?php
  $pageTitle = 'Accueil';
  include 'header.php';
?>
<section class="bg-slate-900 text-white">
  <div class="mx-auto flex w-full max-w-6xl flex-col gap-10 px-6 py-20 md:flex-row md:items-center">
    <div class="space-y-6 md:w-1/2">
      <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-300">Agence digitale locale</p>
      <h1 class="text-4xl font-semibold leading-tight md:text-5xl">
        Un site vitrine clair, rapide et prêt à être mis en ligne sans complications.
      </h1>
      <p class="text-base text-slate-200">
        Clicom Studio accompagne les PME et indépendants avec des sites robustes, faciles à modifier et optimisés pour
        convertir.
      </p>
      <div class="flex flex-wrap gap-4">
        <a class="rounded-full bg-indigo-500 px-6 py-3 text-sm font-semibold text-white transition hover:bg-indigo-400" href="contact.php">
          Demander un devis
        </a>
        <a class="rounded-full border border-white/20 px-6 py-3 text-sm font-semibold text-white transition hover:bg-white/10" href="#services">
          Découvrir nos services
        </a>
      </div>
    </div>
    <div class="md:w-1/2">
      <div class="rounded-3xl bg-white/5 p-6 shadow-lg ring-1 ring-white/10">
        <div class="space-y-4">
          <div class="rounded-2xl bg-white/10 p-6">
            <p class="text-sm uppercase tracking-wide text-indigo-200">Dernier projet</p>
            <h2 class="text-xl font-semibold">Atelier Mécanique Laurent</h2>
            <p class="text-sm text-slate-200">Refonte complète + mise en avant des services et avis clients.</p>
          </div>
          <div class="grid gap-4 md:grid-cols-2">
            <div class="rounded-2xl bg-white/10 p-4">
              <p class="text-sm text-slate-200">+42% de demandes</p>
              <p class="text-xs text-slate-400">après mise en ligne</p>
            </div>
            <div class="rounded-2xl bg-white/10 p-4">
              <p class="text-sm text-slate-200">Livraison en 10 jours</p>
              <p class="text-xs text-slate-400">site prêt à l'emploi</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="services" class="bg-white">
  <div class="mx-auto w-full max-w-6xl px-6 py-16">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <div>
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-600">Nos services</p>
        <h2 class="text-3xl font-semibold">Tout ce qu'il faut pour un site solide</h2>
      </div>
      <p class="text-sm text-slate-600 md:max-w-sm">
        Une approche simple : une structure claire, un contenu percutant et une mise en ligne rapide.
      </p>
    </div>
    <div class="mt-10 grid gap-6 md:grid-cols-3">
      <div class="rounded-2xl border border-slate-200 p-6 shadow-sm">
        <h3 class="text-lg font-semibold">Site vitrine</h3>
        <p class="mt-3 text-sm text-slate-600">
          Pages essentielles, navigation claire et design sur mesure pour inspirer confiance.
        </p>
      </div>
      <div class="rounded-2xl border border-slate-200 p-6 shadow-sm">
        <h3 class="text-lg font-semibold">SEO local</h3>
        <p class="mt-3 text-sm text-slate-600">
          Optimisation des textes et des balises pour améliorer la visibilité sur Google.
        </p>
      </div>
      <div class="rounded-2xl border border-slate-200 p-6 shadow-sm">
        <h3 class="text-lg font-semibold">Maintenance simple</h3>
        <p class="mt-3 text-sm text-slate-600">
          Des fichiers propres pour que vous puissiez modifier le contenu en quelques minutes.
        </p>
      </div>
    </div>
  </div>
</section>

<section id="process" class="bg-slate-50">
  <div class="mx-auto w-full max-w-6xl px-6 py-16">
    <div class="grid gap-8 md:grid-cols-2">
      <div>
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-600">Méthode</p>
        <h2 class="text-3xl font-semibold">Un process clair en 3 étapes</h2>
      </div>
      <p class="text-sm text-slate-600">
        Nous allons à l'essentiel : comprendre vos besoins, structurer le contenu et livrer un site prêt à publier.
      </p>
    </div>
    <div class="mt-10 grid gap-6 md:grid-cols-3">
      <div class="rounded-2xl bg-white p-6 shadow-sm">
        <p class="text-xs font-semibold uppercase text-indigo-600">01</p>
        <h3 class="mt-3 text-lg font-semibold">Brief & stratégie</h3>
        <p class="mt-2 text-sm text-slate-600">Nous clarifions vos objectifs et votre proposition de valeur.</p>
      </div>
      <div class="rounded-2xl bg-white p-6 shadow-sm">
        <p class="text-xs font-semibold uppercase text-indigo-600">02</p>
        <h3 class="mt-3 text-lg font-semibold">Design & contenu</h3>
        <p class="mt-2 text-sm text-slate-600">Une maquette simple et un contenu rédigé pour convertir.</p>
      </div>
      <div class="rounded-2xl bg-white p-6 shadow-sm">
        <p class="text-xs font-semibold uppercase text-indigo-600">03</p>
        <h3 class="mt-3 text-lg font-semibold">Livraison rapide</h3>
        <p class="mt-2 text-sm text-slate-600">Un site propre en PHP, prêt à être transféré sur votre hébergement.</p>
      </div>
    </div>
  </div>
</section>

<section id="projets" class="bg-white">
  <div class="mx-auto w-full max-w-6xl px-6 py-16">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <div>
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-indigo-600">Projets récents</p>
        <h2 class="text-3xl font-semibold">Des résultats concrets</h2>
      </div>
      <a class="text-sm font-semibold text-indigo-600" href="contact.php">Voir les disponibilités →</a>
    </div>
    <div class="mt-10 grid gap-6 md:grid-cols-2">
      <article class="rounded-2xl border border-slate-200 p-6">
        <h3 class="text-lg font-semibold">Studio Yoga Luma</h3>
        <p class="mt-2 text-sm text-slate-600">Site vitrine + calendrier de cours intégré.</p>
        <div class="mt-4 text-xs text-slate-500">Objectif : remplir les cours du soir</div>
      </article>
      <article class="rounded-2xl border border-slate-200 p-6">
        <h3 class="text-lg font-semibold">Cabinet Oria Conseil</h3>
        <p class="mt-2 text-sm text-slate-600">Refonte UX + landing page de prise de rendez-vous.</p>
        <div class="mt-4 text-xs text-slate-500">Objectif : générer des leads qualifiés</div>
      </article>
    </div>
  </div>
</section>

<section class="bg-indigo-600">
  <div class="mx-auto w-full max-w-6xl px-6 py-16 text-white">
    <div class="flex flex-col items-start justify-between gap-6 md:flex-row md:items-center">
      <div>
        <h2 class="text-3xl font-semibold">Prêt à lancer votre site ?</h2>
        <p class="mt-2 text-sm text-indigo-100">Recevez une proposition claire en 48h.</p>
      </div>
      <a class="rounded-full bg-white px-6 py-3 text-sm font-semibold text-indigo-700 transition hover:bg-indigo-100" href="contact.php">
        Parlons de votre projet
      </a>
    </div>
  </div>
</section>
<?php include 'footer.php'; ?>
