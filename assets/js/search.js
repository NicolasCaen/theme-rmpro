document.addEventListener('DOMContentLoaded', function () {
    // Sélectionnez l'élément wp-block-search__button-only
    const searchButton = document.querySelector('.wp-block-search__button-only');
    const body = document.body;

    // Vérifie si l'élément existe avant de continuer
    if (searchButton) {
        // Fonction pour mettre à jour la classe du body
        function updateBodyClass() {
            if (!searchButton.classList.contains('wp-block-search__searchfield-hidden')) {
                body.classList.add('search-visible'); // Ajoute la classe si la condition est vraie
            } else {
                body.classList.remove('search-visible'); // Supprime la classe sinon
            }
        }

        // Appeler la fonction initialement pour définir l'état correct au chargement de la page
        updateBodyClass();

        // Observez les changements de classe sur l'élément
        const observer = new MutationObserver(function (mutationsList) {
            for (let mutation of mutationsList) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    updateBodyClass();
                }
            }
        });

        // Configurez l'observateur pour détecter les changements de classe
        observer.observe(searchButton, { attributes: true });
    }
});