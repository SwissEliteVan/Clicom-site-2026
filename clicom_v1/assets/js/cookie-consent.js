document.addEventListener('DOMContentLoaded', function() {
  const banner = document.getElementById('cookie-banner');
  const acceptBtn = document.getElementById('cookie-accept');
  const rejectBtn = document.getElementById('cookie-reject');
  
  // Vérifier si le consentement existe déjà
  if (!localStorage.getItem('cookie-consent')) {
    banner.classList.remove('hidden');
  }
  
  // Gestion des clics
  acceptBtn.addEventListener('click', function() {
    localStorage.setItem('cookie-consent', 'accepted');
    banner.classList.add('hidden');
    loadCookies();
  });
  
  rejectBtn.addEventListener('click', function() {
    localStorage.setItem('cookie-consent', 'rejected');
    banner.classList.add('hidden');
  });
  
  // Charger les cookies si acceptés
  function loadCookies() {
    if (localStorage.getItem('cookie-consent') === 'accepted') {
      // Charger les scripts tiers ici
      console.log('Cookies chargés');
    }
  }
  
  // Charger au démarrage si déjà accepté
  loadCookies();
});