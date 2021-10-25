//slider noticias
new Splide( '.splide', {
  type  : 'fade',
  autoplay: true,
  rewind: true,
  pauseOnHover: true,
  drag: true,
  arrows: false,

} ).mount(Splide);


//swiper de jugadores
        var mySwiper = new Swiper(".mySwiper2", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        autoplay: {
          delay: 2500,
          disableOnInteraction: false,
        },
        breakpoints: {
          640: {
            slidesPerView: 2,
            spaceBetween: 20,
          },
          768: {
            slidesPerView: 2,
          },
          1024: {
            slidesPerView: 3,
          },
        },
      });


//swiper calendario partidos
         var mySwiper = new Swiper('.mySwiper', {
    // Optional parameters
    effect: 'fade',
    fadeEffect: {
    crossFade: true
    },
    loop: true,
     autoplay: {
         delay: 8000
    },
  
    // pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
 

