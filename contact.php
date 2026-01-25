<?php
  $pageTitle = 'Contact';
  include 'header.php';
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
      <form class="rounded-2xl bg-white p-6 shadow-sm">
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
            ></textarea>
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
</section>
<?php include 'footer.php'; ?>
