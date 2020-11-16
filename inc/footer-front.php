</div><!-- .container -->

<!-- <footer class="footer">
  <div class="wrap-footer">
    <div class="columns">
      <div class="column1">
        <img src="asset/img/logo_footer.png" alt="Vaccin'Line">
      </div>
      <div class="column2">
        <a href="#"><i class="fab fa-facebook-square"></i></a>
        <a href="#"><i class="fab fa-twitter-square"></i></a>
      </div>
      <div class="column3">
        <h3 class="column-title">Contactez-nous :  <a href="contact.php"> <i class="fas fa-envelope"></i></a></h3>
        <a href="#">route de paris, vaccin'corp, France</a>
        <a href="contact.php">vaccin.line@gmail.com</a>

      </div>
    </div>
  </div>
  <div class="bottom-bar">
    <div class="bottom-bar copyright">
      <p cass="copyright"> &copy; Copyright | Vaccin'Corp 2020 | all rights reserved.</p>
    </div>
    <div class="bottom-bar">
      <p class="mention"><a href="mention.php">Mentions légales</a> | <a href="propos.php">À propos</a></p>
    </div>
  </div>
</footer>
</body>
</html> -->
<section id="footer">
  <img src="asset/img/footer_img.png" class="footer-img" alt="">
  <div class="title-text">
    <p>CONTACT</p>
    <h1>Contactez Nous</h1>
  </div>
  <div class="footer-row">
    <div class="footer-left">
      <h1>Heures d'Ouvertures</h1>
      <p><i class="fa fa-clock-o"></i>Lundi à Vendredi - de 9h à 21h</p>
      <p><i class="fa fa-clock-o"></i>Samedi à Dimanche - de 8h à 23h</p>
    </div>
    <div class="footer-right">
      <h1>Entrer en Contact</h1>
      <p>30 Route de Paris, Rouen<i class="fa fa-map-marker"></i></p>
      <p>vaccin.line@gmail.com<i class="fa fa-paper-plane"></i></p>
      <p>+33 2 32 36 44 59<i class="fa fa-phone"></i></p>
    </div>
  </div>
  <div class="social-links">
    <i class="fa fa-facebook"></i>
    <i class="fa fa-instagram"></i>
    <i class="fa fa-twitter"></i>
    <i class="fa fa-youtube-play"></i>
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
