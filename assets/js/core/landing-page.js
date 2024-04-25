var swiper = new Swiper(".slider", {
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    coverflowEffect: {
        rotate: 10,
        stretch: 0,
        depth: 100,
        modifier: 2,
        slideShadows: true,
    },
    loop : true,
    autoplay: {
        delay: 1500,
        disableOnInteraction: false,
    },
});

console.log("ada")
// Active Nav
$(document).ready(function () {
    $('.nav-link').click(function () {
        console.log("Ada");
        $('.nav-link').removeClass('active')
        $(this).addClass('active')
    })
})


// AOS
AOS.init();