

// increment decrement js

$(document).ready(function () {
  $('.minus-1').click(function (e) {
    e.preventDefault()
    let input = $(this).next()
    if (parseInt(input.val()) > 0) {
      if (parseInt(input.val()) - 0 == 0) {
        input.val(parseInt(2))
      }else {
        input.val(parseInt(input.val()) - 1)
      }
    }
  })
  $('.plus-1').click(function (e) {
    e.preventDefault()
    let input = $(this).prev()
    input.val(parseInt(input.val()) + 1)
  })
})








// Wrap every letter in a span
var textWrapper = document.querySelector('.ml2');
if (textWrapper != null) {
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
}

anime.timeline({loop: true})
  .add({
    targets: '.ml2 .letter',
    scale: [4,1],
    opacity: [0,1],
    translateZ: 0,
    easing: "easeOutExpo",
    duration: 950,
    delay: (el, i) => 70*i
  }).add({
    targets: '.ml2',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });


  // Wrap every letter in a span
var textWrapper = document.querySelector('.ml3');

if (textWrapper != null) {
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
}

anime.timeline({loop: true})
  .add({
    targets: '.ml3 .letter',
    opacity: [0,1],
    easing: "easeInOutQuad",
    duration: 2250,
    delay: (el, i) => 150 * (i+1)
  }).add({
    targets: '.ml3',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });
