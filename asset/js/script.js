
var menuBtn = document.getElementById("menuBtn")
var sideNav = document.getElementById("sideNav")
var menu = document.getElementById("menu")

sideNav.style.right = "-250px";

menuBtn.onclick = function(){
  if (sideNav.style.right == "-250px") {
    sideNav.style.right = "0";
    menu.src = "asset/img/close.png";
  }
  else {
    sideNav.style.right = "-250px";
    menu.src = "asset/img/menu.png";
  }
}

var scroll = new SmoothScroll('a[href*="#"]', {
  speed: 1500,
  speedAsDuration: true
});
// a key map of allowed keys
var allowedKeys = {
  37: 'left',
  38: 'up',
  39: 'right',
  40: 'down',
  65: 'a',
  66: 'b'
};

var konamiCode = ['up', 'up', 'down', 'down', 'left', 'right', 'left', 'right', 'b', 'a'];

var konamiCodePosition = 0;

document.addEventListener('keydown', function(e) {

  var key = allowedKeys[e.keyCode];

  var requiredKey = konamiCode[konamiCodePosition];

  if (key == requiredKey) {

    konamiCodePosition++;

    if (konamiCodePosition == konamiCode.length) {
      activateCheats();
      konamiCodePosition = 0;
    }
  } else {
    konamiCodePosition = 0;
  }
});

function activateCheats() {
  document.getElementById("konamicode").style.display = "block";
}