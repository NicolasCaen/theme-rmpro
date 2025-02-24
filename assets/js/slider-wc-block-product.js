(function($) {
    $(document).ready(function() {
        const slider = $('.slider-5-3-1 ul');
        const gap = 2; // Gap en rem (1rem = 16px par défaut)
        const remToPx = gap * 16; // Convertir rem en px

        const adjustSlideWidth = () => {
            const slidesToShow = $(window).width() >= 1024 ? 5 : $(window).width() >= 600 ? 3 : 1;
            const totalGap = (slidesToShow - 1) * remToPx; // Calcul du gap total pour les slides visibles
            const slideWidth = Math.floor((slider.width() - totalGap) / slidesToShow); // Largeur de chaque slide

        
        };

        slider.slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            prevArrow: '<div class="custom-prev arrow-label"></div>',
            nextArrow: '<div class="custom-next arrow-label"></div>',
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });

        adjustSlideWidth(); // Appliquer les ajustements au chargement
        $(window).on('resize', adjustSlideWidth); // Réajuster lors du redimensionnement
    });
})(jQuery);