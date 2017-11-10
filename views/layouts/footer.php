<footer id="footer">
  <div class="footer_top">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInLeft">
            <h2>Flicker Images</h2>
            <ul class="flicker_nav">
              <li><a href="#"><img src="/upload/post_images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="/upload/post_images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="/upload/post_images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="/upload/post_images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="/upload/post_images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="/upload/post_images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="/upload/post_images/75x75.jpg" alt=""></a></li>
              <li><a href="#"><img src="/upload/post_images/75x75.jpg" alt=""></a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInDown">
            <h2>Labels</h2>
            <ul class="labels_nav">
                <?php foreach($categoryList as $category) : ?>
                    <li><a href="/articles/<?=$category["id"]; ?>"><?=$category["title"]; ?></a></li>
                <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single_footer_top wow fadeInRight">
            <h2>About Us</h2>
            <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed nec laoreet orci, eget ullamcorper quam. Phasellus lorem neque, </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer_bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_left">
            <p>Copyright &copy; 2017 <a href="/">ArmProgramming</a></p>
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="footer_bottom_right">
            <p>Developed BY Tyom</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<script
        src="https://code.jquery.com/jquery-1.11.1.min.js"
        integrity="sha256-VAvG3sHdS5LqTT+5A/aeq/bZGa/Uj04xKxY8KM/w9EE="
        crossorigin="anonymous" defer></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/jquery.slick/1.3.15/slick.min.js" defer></script>
<script src="/includes/js/custom.js" defer></script>
<script src="https://www.google.com/recaptcha/api.js" async></script>
<script id="dsq-count-scr" src="//armprogramming-1.disqus.com/count.js" async></script>
</body>
</html>
