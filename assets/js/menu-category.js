document.addEventListener('DOMContentLoaded', function () {
    // Sélectionnez tous les liens avec la classe .toggle-cat-menu
    const toggleMenuLinks = document.querySelectorAll('.toggle-cat-menu');
    const catMenu = document.getElementById('cat-menu');
  
    // Ajoutez un gestionnaire d'événement à chaque lien
    toggleMenuLinks.forEach(link => {
      link.addEventListener('click', function (event) {
        event.preventDefault(); // Empêche le comportement par défaut du lien
  
        // Basculer la classe "show-only-on-desktop" sur le menu
        catMenu.classList.toggle('show-only-on-desktop');
      });
    });
  });

  document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('a[href^="#"]');
  
    links.forEach(link => {
      if (link.getAttribute('href').startsWith('#') && !link.querySelector('img')) {
        link.classList.add('has-anchor');
      }
    });
  });