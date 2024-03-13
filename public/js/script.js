

$('.product-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 1
    },
    1000: {
      items: 1
    }
  }
})

$('.brand-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  center: true,
  slideTransition: 'linear',
  autoplay: true,
  autoplayTimeout: 3000,
  autoplaySpeed: 3000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 7
    },
    1000: {
      items: 8
    }
  }
})

$('.brand-carousel2').owlCarousel({
  loop: true,
  margin: 10,
  nav: false,
  dots: false,
  center: true,
  rtl: true,
  slideTransition: 'linear',
  autoplay: true,
  autoplayTimeout: 3000,
  autoplaySpeed: 3000,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 7
    },
    1000: {
      items: 8
    }
  }
})

$('.mega-menu-on').hover(function () {
  var isHovered = $(this).is(':hover')
  if (isHovered) {
    $(this).children('.main-mega-menu').stop().slideDown(100)
  } else {
    $(this).children('.main-mega-menu').stop().slideUp(100)
  }
})





$(document).ready(function () {
  $('.category-mian-li').click(
    function () {
    $(this).find(".category-hover").slideToggle('fast')
    },
  )
})



function showHtmlDiv(elementId) {
  var htmlShow = document.getElementById(elementId);
  if (htmlShow.style.display === "none") {
       htmlShow.style.display = "block";
  } else {
       htmlShow.style.display = "none";
  }
}



function modalspan() {
  var htmlShow = document.getElementById("modal_span");
  if (htmlShow.style.display === "none") {
       htmlShow.style.display = "block";
  } else {
       htmlShow.style.display = "none";
  }
}

var closebtns = document.getElementsByClassName("close");
var i;

for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    this.parentElement.style.display = 'none';
  });
}


function opentabs(evt , cityName) {

  let s , changetabs , clicktabs;
  changetabs = document.getElementsByClassName("changetabs");
  for(p = 0; p < changetabs.length; p ++) {
    changetabs[p].style.display = "none";
  }
  clicktabs = document.getElementsByClassName("clicktabs");
  for(p = 0; p < clicktabs.length; p ++) {
    clicktabs[p].className = clicktabs[p].className.replace("active" , "")
  }
  document.getElementById(cityName).style.display= "block";
  evt.currentTarget.className += " active";

}

if (document.getElementById("showonly")) {
    document.getElementById("showonly").click();
}





