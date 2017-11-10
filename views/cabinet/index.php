<?php require ROOT . "/views/layouts/header.php"; ?>
<section id="mainContent">
<div class="content_bottom">
  <div class="col-lg-8 col-md-8">
    <div class="content_bottom_left">
        <div class="card">
          <div class="cabinet_logo">
              <i class="fa fa-graduation-cap"></i>
          </div>
          <div class="card_wrapper">
            <h1><?=$user["name"]; ?></h1>
            <p class="title"><?=$user["email"]; ?></p>
            <p>ArmProgramming</p>
            <p><a href="/"><button>Սկսել</button></a></p>
          </div>
      </div>
        <div class="col-lg-6 col-md-6">
            <h2>Welcome dear <?=$user["name"]; ?></h2>
            <br>
            <p>lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor</p>
            <p>lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor</p>
            <p>lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor lorem ipsum dolor</p>
        </div>
    </div>
  </div>
  <?php include ROOT . "/views/layouts/sidebar.php"; ?>
</div>
</section>
</div>
<?php require ROOT . "/views/layouts/footer.php"; ?>
