var html = document.querySelector("html");
html.classList.add("add");
window.addEventListener("load",function(){
  $("html").removeClass("add");
    setTimeout(function () {
   
        document.querySelector(".loader").style.display = "none";
    }, 750);
});





function nav(page) {   
    window.location.href=page;
  }
$("header .search_part").click(function () {
    $(this).parents(".navbar_collapse").find("#search_form").addClass("show");
  });
  $("header form i").click(function () {
    $(this).parents("#search_form").removeClass("show");
  });




$('#axtar').on('click', function () {
  $('#top_part').addClass('active');
  $('.overlay_search').addClass('active');
  html.classList.add("add");
      $('.search_holder').addClass('active');


});
$('#close_search').on('click', function(e){
  $('.search_holder').removeClass('active');
  $('.overlay_search').removeClass('active');
  $('#top_part').removeClass('active');
  html.classList.remove("add");
});






$('.call_form').on('click', function(e){
    e.preventDefault();
    if (!($(this).hasClass('active'))) {
        $(this).addClass('active');
        if (!($('.overlay_search').hasClass('active'))) {
            $('.overlay_search').addClass('active');
        }
        $('.modal_ticket_header_form').addClass('active');
        $('.search_holder').removeClass('active');
        $('.search_btn').removeClass('active');
        $('.prime_menu').removeClass('active');
        $('.ik-menu-expand').removeClass('ik-active');
    } else {
        $(this).removeClass('active');
        $('.overlay_search').removeClass('active');
        $('.modal_ticket_header_form').removeClass('active');

    }
});

$(".box .counter_one").each(function () {
    $(this)
      .prop("Counter", 0)
      .animate(
        {
          Counter: $(this).text(),
        },
        {
          duration: 6000,
          easing: "swing",
          step: function (now) {
            $(this).text(Math.ceil(now));
          },
        }
      );
  });




  $('.owl-carousel').owlCarousel({
    items:8,
    autoplay:true,
    
    loop:true,
    margin:10,
    dots:true,
    responsive:{
      400 :{
        items: 2
      },
      600:{
          items:4,
      },
      1200:{
        items:8,
    },
  }
});
$(document).ready(function(){
    "use strict";
  
  
    
});


const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');
  
  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
  }
  
  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));

var swiper = new Swiper(".mySwiper", {
  scrollbar: {
    el: ".swiper-scrollbar",
    hide: true,
  },
});

