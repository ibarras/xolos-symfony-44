new Splide( '.splide', {
    type  : 'fade',
    autoplay: true,
    rewind: true,
    pauseOnHover: true,
    drag: true,
    arrows: false,

 } ).mount(Splide);

 //glider
 window.addEventListener('load', function(){
   new Glider(document.querySelector('.glider'), {
      slidesToShow: 1,
      slidesToScroll: 1,
      draggable: true,
      dots: '.dots',
      dragVelocity: 1,
      responsive: [
         {
           // screens greater than >= 775px
           breakpoint: 768,
           settings: {
             // Set to `auto` and provide item width to adjust to viewport
             slidesToShow: 2,
             slidesToScroll: 2,
             dragVelocity: 1,
           }
         },
         {
           // screens greater than >= 1024px
           breakpoint: 1024,
           settings: {
             slidesToShow: 3,
             slidesToScroll: 3,
             dragVelocity: 1,
           }
         }
       ]
   })
 })

 

