(function($) {
    $(document).ready(function() {
        const slider = $('.is-style-slider-1');
        const slider_2 = $('.is-style-slider-1-square');

        function initSlick(sliderElement) {
            if (sliderElement.hasClass('slick-initialized')) {
                sliderElement.slick('unslick'); // Désactive l'ancienne instance
            }

            sliderElement.slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true
            });

            // Attendre que le DOM soit bien affiché avant d'ajuster la largeur
            setTimeout(() => {
                const containerWidth = sliderElement.parent().width();
                sliderElement.css('width', containerWidth + 'px'); // Ajuste la largeur
                sliderElement.slick('setPosition'); // Corrige l'affichage
            }, 200);
        }

        initSlick(slider);
        initSlick(slider_2);

        // Met à jour la largeur si la fenêtre est redimensionnée
        function updateSlickLayout() {
            setTimeout(() => {
                const containerWidth1 = slider.parent().width();
                const containerWidth2 = slider_2.parent().width();

                slider.css('width', containerWidth1 + 'px');
                slider_2.css('width', containerWidth2 + 'px');

                slider.slick('setPosition');
                slider_2.slick('setPosition');
            }, 200);
        }

        window.addEventListener('resize', updateSlickLayout);

        // Observer si le parent Flexbox change de taille (utile si Flexbox est dynamique)
        const observer = new ResizeObserver(updateSlickLayout);
        observer.observe(slider.parent()[0]);
        observer.observe(slider_2.parent()[0]);
    });
})(jQuery);
