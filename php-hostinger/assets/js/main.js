/**
 * Clic COM - Tech Abstract Premium
 * Main JavaScript
 */

(function() {
  'use strict';

  /**
   * Smooth scroll for anchor links
   */
  function initSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {
      link.addEventListener('click', function(e) {
        const href = this.getAttribute('href');

        if (href === '#') return;

        const target = document.querySelector(href);

        if (target) {
          e.preventDefault();
          target.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      });
    });
  }

  /**
   * Add hover effect to service links
   */
  function initServiceLinkEffects() {
    const serviceLinks = document.querySelectorAll('.tech-card a');

    serviceLinks.forEach(link => {
      link.addEventListener('mouseenter', function() {
        const arrow = this.querySelector('svg');
        if (arrow) {
          this.style.gap = '12px';
        }
      });

      link.addEventListener('mouseleave', function() {
        const arrow = this.querySelector('svg');
        if (arrow) {
          this.style.gap = '8px';
        }
      });
    });
  }

  /**
   * Navbar scroll effect
   */
  function initNavbarScroll() {
    const navbar = document.querySelector('.tech-navbar');
    if (!navbar) return;

    let lastScroll = 0;
    const scrollThreshold = 10;

    window.addEventListener('scroll', function() {
      const currentScroll = window.pageYOffset;

      // Add shadow on scroll
      if (currentScroll > scrollThreshold) {
        navbar.style.boxShadow = 'var(--shadow-sm)';
      } else {
        navbar.style.boxShadow = 'none';
      }

      lastScroll = currentScroll;
    });
  }

  /**
   * Lazy load effect for cards on scroll
   */
  function initScrollAnimations() {
    const cards = document.querySelectorAll('.tech-card');

    const observerOptions = {
      root: null,
      rootMargin: '0px',
      threshold: 0.1
    };

    const observer = new IntersectionObserver(function(entries) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0)';
          observer.unobserve(entry.target);
        }
      });
    }, observerOptions);

    cards.forEach(card => {
      card.style.opacity = '0';
      card.style.transform = 'translateY(20px)';
      card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(card);
    });
  }

  /**
   * Form validation helper
   */
  function initFormValidation() {
    const forms = document.querySelectorAll('form');

    forms.forEach(form => {
      form.addEventListener('submit', function(e) {
        const inputs = form.querySelectorAll('.tech-input[required]');
        let isValid = true;

        inputs.forEach(input => {
          if (!input.value.trim()) {
            isValid = false;
            input.style.borderColor = 'var(--accent-primary)';

            setTimeout(() => {
              input.style.borderColor = '';
            }, 2000);
          }
        });

        if (!isValid) {
          e.preventDefault();
        }
      });
    });
  }

  /**
   * Initialize all features when DOM is ready
   */
  function init() {
    initSmoothScroll();
    initServiceLinkEffects();
    initNavbarScroll();
    initScrollAnimations();
    initFormValidation();
  }

  // Wait for DOM to be ready
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
