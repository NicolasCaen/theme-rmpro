
// Injection de l'attribut data-menu-target dans les liens du menu de header.wp-block-template-part qui on une ancre
//___________________________________________________

document.addEventListener('DOMContentLoaded', function() {
// 1. Sélectionne le conteneur des liens
const headerMenu = document.querySelector('.main-header');

if (!headerMenu) {
  console.warn("Conteneur header non trouvé. Vérifiez le sélecteur.");
  return;
}

// 2. Sélectionne tous les liens "a" avec href contenant un fragment (#)
const headerLinks = headerMenu.querySelectorAll('a[href*="#"]');

// 3. Parcourt chaque lien
headerLinks.forEach(link => {
  const href = link.getAttribute('href');
  if (href) {
    // Extrait le fragment (#...) de l'URL
    const url = new URL(href, window.location.href);
    const menuId = url.hash.substring(1); // Récupère tout après le '#'

    if (menuId) {
      // Vérifie si l'élément cible existe
      const targetElement = document.getElementById(menuId);

      if (targetElement) {
        // Ajoute l'attribut data-menu-target
        link.dataset.menuTarget = menuId;

        // Vérifie si l'élément cible a une classe du type "menu-niv[X]"
        const nivMatch = Array.from(targetElement.classList).find(cls => cls.startsWith('menu-niv'));

        if (nivMatch) {
          // Extrait le nombre [X] de la classe "menu-niv[X]"
          const nivNumber = parseInt(nivMatch.replace('menu-niv', ''), 10);

          if (!isNaN(nivNumber)) {
            // Ajoute l'attribut data-niv avec la valeur [X]
            link.dataset.niv = nivNumber;
            console.log(`Attribut "data-niv" ajouté avec la valeur ${nivNumber} au lien "${link.textContent}".`);
          }
        }

        // Vérifie si l'élément cible a la classe menu-niv2
        if (targetElement.classList.contains('menu-niv2')) {
          link.classList.add('open-niv2');
        } else {
          console.warn(`L'élément avec l'ID "${menuId}" ne contient pas la classe "menu-niv2".`);
        }
      } else {
        console.warn(`Aucun élément trouvé avec l'ID : ${menuId}`);
      }
    } else {
      console.warn(`Lien avec href invalide : ${href}`);
    }
  }
});

  
//  GESTION des clics sur les éléments avec data-menu-target
//___________________________________________________

  const menuContainer=document.querySelectorAll('#menu-principal');
  const menusNiv1 = document.querySelectorAll('.menu-niv1');
  const menusNiv2 = document.querySelectorAll('.menu-niv2');
  const closeMenu = document.querySelectorAll('.close-menu-js');
  const itemClickable = document.querySelectorAll('[data-menu-target]'); // Sélecteur plus générique


  const body = document.body; // Référence au body

  let currentMenu = null; // Garder une trace du menu actuellement ouvert

  function openMenu(menuId) {
    console.log("openMenu appelée avec l'ID:", menuId);
    const menu = document.getElementById(menuId);
  
    if (!menu) {
      console.error(`Menu avec l'ID "${menuId}" introuvable.`);
      return;
    }
  
  
    currentMenu = menu;
    body.classList.add('menu-open');
    
 
    menusNiv1.forEach(element => {
      element.classList.remove('current-menu');
    });
    
    currentMenu.classList.add('current-menu');
    console.log("currentMenu:", currentMenu);
  }
  function openSubMenu(menuId) {
    console.log("openMenu appelée avec l'ID:", menuId);
    const menu = document.getElementById(menuId);
  
    if (!menu) {
      console.error(`Menu avec l'ID "${menuId}" introuvable.`);
      return;
    }
    currentMenu = menu;

    
    body.classList.add('menu-open');
    // Vérifie si aucun élément menu-niv2 n'a la classe active
    const hasActiveMenuNiv2 = Array.from(menusNiv2)
    .some(element => element.classList.contains('active'));

    if (!hasActiveMenuNiv2) {
    
    // Ajoute un délai avant d'ajouter la classe 'menu-niv2-is-open'
    addClassTimeout = setTimeout(() => {
      body.classList.add('menu-niv2-is-open');
    }, 500);
    } 
        
 
    menusNiv2.forEach(element => {
      element.classList.remove('active');
    });
    currentMenu.classList.add('active');
    console.log("currentMenu:", currentMenu);
  }

  // 3. Fonction pour fermer tous les menus

  function closeAllMenus() {

    currentMenu = null;

    body.classList.remove('menu-open'); // Supprime la classe du body pour réactiver le scroll
  }

  // 4. Gestion des clics sur les éléments déclencheurs (n'importe où sur la page)

  itemClickable.forEach(trigger => {
    trigger.addEventListener('click', function(event) {
      event.preventDefault(); // Empêche la navigation si le déclencheur est un lien
      const targetMenuId = this.dataset.menuTarget; // Récupère l'ID du menu cible
      const targetLevel = this.dataset.niv; // Récupère l'ID du menu cible
    
      if(targetLevel==1){
        openMenu(targetMenuId);
        body.classList.remove('menu-niv2-is-open'); // Suppr
        menusNiv2.forEach(element => {
          element.classList.remove('active');
        });
      }else if(targetLevel==2){
        openSubMenu(targetMenuId);
               

      }
    });
  });


closeMenu.forEach(button => {
  button.addEventListener('click', function(event) {
    event.preventDefault();
    closeAllMenus();
  });
});
  // 6. (Optionnel) Fermeture des menus en cliquant en dehors

//   document.addEventListener('click', function(event) {
//     if (currentMenu && !currentMenu.contains(event.target) && !event.target.matches('[data-menu-target]')) {
//       setTimeout(() => {
//         closeAllMenus();
//       }, 100); // Délai de 100 millisecondes
//     }
//   });


  // (Optionnel) Gestion de la touche "Echap" pour fermer les menus

  document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape' && currentMenu) {
      closeAllMenus();
    }
  });

// 1. Sélectionne tous les liens avec la classe open-niv2
const openNiv2Links = document.querySelectorAll('a.open-niv2');

// 2. Ajoute des gestionnaires d'événements pour chaque lien
// Fonction pour vérifier si la résolution est supérieure à 1024px
function isResolutionAbove1024() {
  return window.innerWidth > 1024;
}


openNiv2Links.forEach(link => {
  const targetId = link.dataset.menuTarget; // Récupère l'ID cible depuis data-menu-target
  const targetElement = document.getElementById(targetId); // Récupère l'élément cible

  if (!targetElement) {
    console.warn(`Aucun élément trouvé avec l'ID : ${targetId}`);
    return;
  }

  // Vérifie si la résolution est supérieure à 1024px avant d'ajouter les gestionnaires
  if (isResolutionAbove1024()) {
    // Gestionnaire d'événement au survol du lien
    link.addEventListener('mouseenter', () => {
      // Simule un clic sur le lien lors du survol
      link.click();
    });

    // Gestionnaire d'événement lorsqu'on quitte le survol du lien
    link.addEventListener('mouseleave', () => {
      // Supprime les classes actives si nécessaire
     
     // body.classList.remove('menu-niv2-is-open');
     // targetElement.classList.remove('active');
    });
  }
});
// Écoute l'événement resize pour ajuster dynamiquement les gestionnaires
window.addEventListener('resize', () => {
  openNiv2Links.forEach(link => {
    // Supprime les gestionnaires existants
    link.removeEventListener('mouseenter', () => {});
    link.removeEventListener('mouseleave', () => {});

    // Réajoute les gestionnaires si la résolution est supérieure à 1024px
    if (isResolutionAbove1024()) {
      const targetId = link.dataset.menuTarget;
      const targetElement = document.getElementById(targetId);

      if (targetElement) {
        link.addEventListener('mouseenter', () => {
          menusNiv2.forEach(element => {
            element.classList.remove('active');
          });
          const addClassTimeout = setTimeout(() => {
            body.classList.add('menu-niv2-is-open');
          }, 500);
  
          targetElement.classList.add('active');
        });

        link.addEventListener('mouseleave', (event) => {
          clearTimeout(addClassTimeout);

          if (event.relatedTarget && targetElement.contains(event.relatedTarget)) {
            return;
          }

          if (!link.classList.contains('active')) {
            body.classList.remove('menu-niv2-is-open');
            targetElement.classList.remove('active');
          }
        });
      }
    }
  });
});

// 3. Écoute un clic en dehors de l'élément actif
document.addEventListener('click', (event) => {
  // Vérifie si le clic a eu lieu en dehors de tout élément ayant la classe active
  const activeElements = document.querySelectorAll('.menu-niv2.active');

  activeElements.forEach(activeElement => {
    // Vérifie si le clic a eu lieu à l'intérieur de l'élément actif ou de son lien associé
    const link = document.querySelector(`a[data-menu-target="${activeElement.id}"]`);
    const isClickInside = activeElement.contains(event.target) || link?.contains(event.target);

    if (!isClickInside) {
      // Si le clic est en dehors, supprime la classe active
      activeElement.classList.remove('active');
    }
  });
});

});