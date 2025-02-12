document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner tous les éléments <details> avec un parent ayant la classe .ng1-faqs
    const detailsElements = document.querySelectorAll('.ng1-faqs details');

    // Ajouter l'attribut name="fad" à chaque élément <details> sélectionné
    detailsElements.forEach(function(details) {
        details.setAttribute('name', 'faqGroup');
    });
});