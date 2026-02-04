// Burger menu functionality
document.addEventListener('DOMContentLoaded', function() {
  const burgerMenu = document.querySelector('.burger-menu');
  const navMenu = document.querySelector('nav ul');
  
  if (burgerMenu && navMenu) {
    burgerMenu.addEventListener('click', function() {
      navMenu.classList.toggle('active');
      burgerMenu.classList.toggle('active');
    });
  }
  
  // Sticky header with glassmorphism effect
  const header = document.querySelector('header');
  if (header) {
    window.addEventListener('scroll', function() {
      if (window.scrollY > 50) {
        header.classList.add('sticky');
      } else {
        header.classList.remove('sticky');
      }
    });
  }
});