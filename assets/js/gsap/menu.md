# Explication du Script de Menu Mobile

Ce script JavaScript gère l'affichage et les interactions d'un menu mobile, utilisant la librairie GSAP.
## 1. Initialisation

Le code commence par envelopper l'ensemble du script dans un écouteur d'événement `DOMContentLoaded`. Cela garantit que le script ne s'exécute qu'une fois que l'ensemble du document HTML a été chargé et analysé.
```javascript
document.addEventListener('DOMContentLoaded', function () {
  // Code du menu ici...
});
```

## 2. Sélection des Éléments HTML

Le script sélectionne plusieurs éléments HTML cruciaux pour le fonctionnement du menu :

```javascript
const menuPrincipal = document.getElementById('menu-principal');
const toggleMenuButton = document.querySelector('.toggle-menu-js');
const closeMenuButton = document.querySelector('.close-menu-js'); // Bouton de fermeture
const menuLinks = menuPrincipal.querySelectorAll('a');
const menuNiv1Elements = document.querySelectorAll('.menu-niv1');
```

*   **`menuPrincipal`:**  L'élément HTML qui contient l'ensemble du menu (probablement un `<nav>` ou un `<ul>`).
*   **`toggleMenuButton`:** Le bouton qui bascule l'affichage du menu (souvent une icône hamburger). Sa classe CSS est `.toggle-menu-js`.
*	**`closeMenuButton`**: Le bouton de fermeture du menu. Sa classe CSS est `.close-menu-js`.
*   **`menuLinks`:** Tous les liens (`<a>`) à l'intérieur du menu principal.
*   **`menuNiv1Elements`:** Tous les éléments HTML de premier niveau (classe `menu-niv1`) représentant des sections principales du menu, souvent contenant des sous-menus.

## 3. Fonctionnalité de Basculement du Menu Principal

Le script attache un écouteur d'événement `click` au bouton `toggleMenuButton`. Lorsque ce bouton est cliqué, le script effectue les actions suivantes :

```javascript
toggleMenuButton.addEventListener('click', function () {
  if (menuPrincipal.classList.contains('active')) {
    // Fermer le menu
    gsap.to(menuPrincipal, { x: '-100%', duration: 0.2 });
    menuPrincipal.classList.remove('active');

    // Fermer les sous-menus de niveau 1
    menuNiv1Elements.forEach(menu => {
      menu.classList.remove('active');
      gsap.to(menu, { x: '-100%', duration: 0.2 });
    });
  } else {
    // Ouvrir le menu
    gsap.to(menuPrincipal, { x: '0%', duration: 0.2 });
    menuPrincipal.classList.add('active');

    // Afficher le premier sous-menu de niveau 1 (si présent)
    if (menuNiv1Elements.length > 0) {
      const firstMenuNiv1 = menuNiv1Elements[0];
      firstMenuNiv1.classList.add('active');
      gsap.to(firstMenuNiv1, { x: '0%', duration: 0.2 });
    }
  }
});
```

*   **Vérification de l'état :** Vérifie si la classe `active` est présente sur `menuPrincipal`. Cela détermine si le menu est actuellement ouvert ou fermé.
*   **Animation avec GSAP :** Utilise `gsap.to()` pour animer la propriété `x` de `menuPrincipal`.  `x: '-100%'` déplace le menu hors de l'écran vers la gauche, et `x: '0%'` le ramène à sa position initiale.  La `duration` définit la durée de l'animation en secondes.
*   **Gestion de la classe `active` :** Ajoute ou supprime la classe `active` de `menuPrincipal` pour indiquer l'état du menu. Cette classe est probablement utilisée pour appliquer des styles CSS spécifiques au menu ouvert.
*   **Fermeture des sous-menus de niveau 1 :** Lorsque le menu principal est fermé, le code itère sur tous les éléments `menuNiv1Elements` et les ferme également en utilisant une animation GSAP.
*   **Ouverture du premier sous-menu de niveau 1 :** Lorsque le menu principal est ouvert, le code affiche le premier sous-menu de niveau 1, si il y en a un.

## 4. Fonctionnalité de fermeture du menu via le bouton de fermeture

Le script attache un écouteur d'événement `click` au bouton `closeMenuButton`. Lorsque ce bouton est cliqué, le script effectue les actions suivantes :

```javascript
closeMenuButton.addEventListener('click', function () {
	menuPrincipal.classList.remove('active');
	gsap.to(menuPrincipal, { x: '-100%', duration: 0.2 });
});
```
*	**Fermeture du menu principal**: Lorsque le bouton de fermeture est cliqué, le menu principal se ferme, ce qui anime en le déplaçant sur l'axe X à -100%, en utilisant la librairie GSAP pour une transition en douceur.
*	**Suppression de la classe active**: Supprime la classe CSS "active" de l'élément `menuPrincipal`, ce qui a probablement pour effet de masquer le menu visuellement et de désactiver certaines interactions.

## 5. Réinitialisation des Sous-Menus de Niveau 1

Ce code garantit que tous les sous-menus de niveau 1 sont initialement fermés et que certaines classes de style sont supprimées :

```javascript
menuNiv1Elements.forEach(menu => {
  menu.classList.remove('active', 'hover-active');
  gsap.to(menu, { x: '-100%', duration: 0.2 });
});
```

*   Itère sur tous les éléments `menuNiv1Elements`.
*   Supprime les classes `active` et `hover-active` de chaque sous-menu, assurant qu'ils sont initialement fermés et n'ont pas de style de survol persistant.
*   Anime chaque sous-menu hors de l'écran en utilisant `gsap.to()`.

## 6. Gestion des Événements de Lien de Menu

Le script attache des écouteurs d'événements `click`, `mouseover` et `mouseout` à chaque lien de menu (`menuLinks`).

```javascript
menuLinks.forEach(link => {
  // Gestion du clic
  link.addEventListener('click', function (e) { ... });

  // Gestion du survol (mouseover)
  link.addEventListener('mouseover', function () { ... });

  // Gestion de la sortie du survol (mouseout)
  link.addEventListener('mouseout', function () { ... });
});
```

### 6.1 Gestion du Clic

```javascript
link.addEventListener('click', function (e) {
  const targetId = link.getAttribute('href');
  const targetMenu = document.querySelector(targetId);

  // Si le lien commence par #, on empêche le comportement par défaut
  if (targetId && targetId.startsWith('#')) {
    e.preventDefault();
  }

  if (targetMenu && targetMenu.classList.contains('menu-niv1')) {
    // Gestion des sous-menus de niveau 1
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
    // Gestion des sous-menus de niveau 2
    targetMenu.classList.toggle('active');
    gsap.to(targetMenu, {
      x: targetMenu.classList.contains('active') ? '0%' : '-100%',
      duration: 0.2
    });
  }
});
```

*   **Récupération de l'ID cible :** Obtient l'attribut `href` du lien, qui est supposé être un sélecteur CSS (par exemple, `#sous-menu-1`).
*   **Sélection du menu cible :** Utilise `document.querySelector()` pour trouver l'élément HTML correspondant à l'ID cible.
*   **Prévention du comportement par défaut :** Si l'attribut `href` commence par `#`, le code empêche le comportement par défaut du lien (qui serait de naviguer vers l'ancre).  C'est important pour les menus qui ouvrent et ferment des sous-menus sans recharger la page.
*   **Gestion des sous-menus de niveau 1 :** Si le menu cible a la classe `menu-niv1`, le code ferme tous les autres sous-menus de niveau 1 avant d'ouvrir ou de fermer le sous-menu cliqué.  Cela assure qu'un seul sous-menu de niveau 1 est ouvert à la fois.
*   **Gestion des sous-menus de niveau 2 :** Si le menu cible a la classe `menu-niv2`, le code bascule simplement son état (ouvert/fermé) en ajoutant ou supprimant la classe `active` et en animant sa position.

### 6.2 Gestion du Survol (mouseover)

```javascript
link.addEventListener('mouseover', function () {
  const targetId = link.getAttribute('href');
  const targetMenu = document.querySelector(targetId);

  if (targetMenu && targetMenu.classList.contains('menu-niv2')) {
    targetMenu.classList.add('hover-active');
    targetMenu.style.zIndex = 100; // Mise à jour du z-index pour afficher au-dessus
    gsap.to(targetMenu, { x: '0%', duration: 0.2 });
  }
});
```

*   **Survol des sous-menus de niveau 2 :** Si le lien survolé pointe vers un élément avec la classe `menu-niv2` (un sous-menu de niveau 2), le code ajoute la classe `hover-active` à cet élément, modifie son `z-index` pour s'assurer qu'il s'affiche au-dessus des autres éléments, et l'anime pour qu'il devienne visible.

### 6.3 Gestion de la Sortie du Survol (mouseout)

```javascript
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
```

*   **Sortie du survol des sous-menus de niveau 2 :**  Lorsque la souris quitte un lien pointant vers un sous-menu de niveau 2, le code utilise un `setTimeout` pour attendre un court instant (200ms).  Si, après ce délai, la souris n'est *toujours pas* sur le sous-menu lui-même (`!targetMenu.matches(':hover')`), alors le code supprime la classe `hover-active`, rétablit le `z-index` à sa valeur par défaut (0) et anime le sous-menu hors de l'écran.  Ce délai évite que le sous-menu ne se ferme immédiatement si la souris passe brièvement hors du lien en allant vers le sous-menu.

## 7. Conclusion

En résumé, ce script JavaScript implémente un menu mobile réactif avec des animations fluides, gérant l'ouverture et la fermeture du menu principal et des sous-menus, ainsi que les interactions de survol pour les sous-menus de niveau 2.  L'utilisation de GSAP permet des transitions douces et personnalisables, tandis que la gestion des classes CSS et des événements assure un comportement interactif et une apparence visuelle cohérente.  Le délai dans la gestion du `mouseout` est une bonne pratique pour améliorer l'expérience utilisateur en évitant des fermetures accidentelles du menu.