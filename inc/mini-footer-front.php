</div><!-- .container -->

<section id="minifooter">
  <img src="asset/img/minilogo.png" class="minifooter-img" alt="">
  <div class="footer-row">
    <div class="footer-left">
      <h1>Nous envoyer un e-mail :</h1>
      <p><a href="contact.php"><i class="fa fa-envelope"></i> Page contact</a></p>
    </div>
    <div class="footer-right">
      <h1>Entrer en Contact :</h1>
      <p>17 Route de Paris, Rouen<i class="fa fa-map-marker"></i></p>
      <p>vaccin.line@gmail.com<i class="fa fa-paper-plane"></i></p>
      <p>+33 1 23 45 67 89<i class="fa fa-phone"></i></p>
    </div>
  </div>
  <div class="social-links">
  <a href="https://www.facebook.com/VaccinL/" target="_blank"><i class="fa fa-facebook"></i></a>
    <a href="https://twitter.com/VaccinL" target="_blank"><i class="fa fa-twitter"></i></a>

    <p>Copyright Vaccin'Line</p>
    <p class="mention"><a href="mention.php">Mentions légales</a> | <a href="propos.php">À propos</a></p>
  </div>
</section>

<script>
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
</script>
</body>
</html
