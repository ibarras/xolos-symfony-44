const swiper = new Swiper('.swiper', {
    // Optional parameters
    effect: 'fade',
    fadeEffect: {
    crossFade: true
    },
    loop: true,
     autoplay: {
         delay: 4000,
    },
  
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
    },
  
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });