document.addEventListener('DOMContentLoaded', function () {
    const menuPrincipal = document.getElementById('menu-principal');
    const toggleMenuButton = document.querySelector('.toggle-menu-js');
    const closeMenuButton = document.querySelector('.close-menu-js'); // Bouton de fermeture
    const menuLinks = menuPrincipal.querySelectorAll('a');
    const menuNiv1Elements = document.querySelectorAll('.menu-niv1');

    // Fonctionnalité de basculement du menu
    toggleMenuButton.addEventListener('click', function () {
        if (menuPrincipal.classList.contains('active')) {
            gsap.to(menuPrincipal, { x: '-100%', duration: 0.2 });
            menuPrincipal.classList.remove('active');

            menuNiv1Elements.forEach(menu => {
                menu.classList.remove('active');
                gsap.to(menu, { x: '-100%', duration: 0.2 });
            });
        } else {
            gsap.to(menuPrincipal, { x: '0%', duration: 0.2 });
            menuPrincipal.classList.add('active');

            if (menuNiv1Elements.length > 0) {
                const firstMenuNiv1 = menuNiv1Elements[0];
                firstMenuNiv1.classList.add('active');
                gsap.to(firstMenuNiv1, { x: '0%', duration: 0.2 });
            }
        }
    });
    closeMenuButton.addEventListener('click', function () {
        menuPrincipal.classList.remove('active');
        gsap.to(menuPrincipal, { x: '-100%', duration: 0.2 });
    });
    menuNiv1Elements.forEach(menu => {
        menu.classList.remove('active', 'hover-active');
        gsap.to(menu, { x: '-100%', duration: 0.2 });
    });
    // Gestion des événements pour les liens de menu
    menuLinks.forEach(link => {

        // Gestion du clic
        link.addEventListener('click', function (e) {

            const targetId = link.getAttribute('href');
            const targetMenu = document.querySelector(targetId);
                          // Si le lien commence par #, on empêche le comportement par défaut
                          if (targetId && targetId.startsWith('#')) {
                            e.preventDefault();
                        }
            if (targetMenu && targetMenu.classList.contains('menu-niv1')) {
                menuNiv1Elements.forEach(menu => {
                    if (menu !== targetMenu) {
                        menu.classList.remove('active');
                        gsap.to(menu, { x: '-100%', duration: 0.2 });
                    }
                });

                targetMenu.classList.toggle('active');
                gsap.to(targetMenu, { 
                    x: targetMenu.classList.contains('active') ? '0%' : '-100%', 
                    duration: 0.2 
                });
            } else if (targetMenu && targetMenu.classList.contains('menu-niv2')) {
                targetMenu.classList.toggle('active');
                gsap.to(targetMenu, { 
                    x: targetMenu.classList.contains('active') ? '0%' : '-100%', 
                    duration: 0.2 
                });
            }
      
        });

        // Gestion du survol (mouseover)
        link.addEventListener('mouseover', function () {
            const targetId = link.getAttribute('href');
            const targetMenu = document.querySelector(targetId);

            if (targetMenu && targetMenu.classList.contains('menu-niv2')) {
                targetMenu.classList.add('hover-active');
                targetMenu.style.zIndex = 100; // Mise à jour du z-index pour afficher au-dessus
                gsap.to(targetMenu, { x: '0%', duration: 0.2 });
            }
        });

        // Gestion de la sortie du survol (mouseout)
        link.addEventListener('mouseout', function () {
            const targetId = link.getAttribute('href');
            const targetMenu = document.querySelector(targetId);

            if (targetMenu && targetMenu.classList.contains('menu-niv2')) {
                // Suppression après un léger délai pour éviter des erreurs dues au survol rapide
                setTimeout(() => {
                    if (!targetMenu.matches(':hover')) {
                        targetMenu.classList.remove('hover-active');
                        targetMenu.style.zIndex = 0; // Réinitialisation du z-index
                        gsap.to(targetMenu, { x: '-100%', duration: 0.2 });
                    }
                }, 200);
            }
        });
    });
});
