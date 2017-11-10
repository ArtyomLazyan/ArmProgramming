<div class="col-lg-4 col-md-4">
  <div class="content_bottom_right">
    <div class="single_bottom_rightbar">
      <h2>Recent Post</h2>
      <ul class="small_catg popular_catg wow fadeInDown">
          <?php foreach($latestArticles as $latest) : ?>
            <li>
              <div class="media wow fadeInDown"> <a href="/article/<?=$latest["id"]; ?>" class="media-left">
                  <img alt="<?=$latest["title"]; ?>" title="<?=$latest["title"]; ?>" src="<?php echo Article::getImage($latest["id"]); ?>"> </a>
                <div class="media-body">
                  <h4 class="media-heading"><a href="/article/<?=$latest["id"]; ?>"><?=$latest["title"]; ?></a></h4>
                  <p><?php echo substr($latest["text"], 0, 100); ?></p>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
      </ul>
    </div>
    <div class="single_bottom_rightbar">
      <ul role="tablist" class="nav nav-tabs custom-tabs">
        <li class="active" role="presentation"><a data-toggle="tab" role="tab" href="#mostPopular">Most Popular</a></li>
        <li role="presentation"><a data-toggle="tab" role="tab"  href="#recentComent">Recent Comment</a></li>
      </ul>
      <div class="tab-content">
        <div id="mostPopular" class="tab-pane fade in active" role="tabpanel">
          <ul class="small_catg popular_catg wow fadeInDown">
              <?php foreach($topReadableArticles as $topArticles) : ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="/article/<?=$topArticles["id"]; ?>" class="media-left">
                      <img alt="<?=$topArticles["title"]; ?>" title="<?=$topArticles["title"]; ?>" src="<?php echo Article::getImage($topArticles["id"]); ?>"> </a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="/article/<?=$topArticles["id"]; ?>"><?=$topArticles["title"]; ?></a></h4>
                      <p><?php echo substr($topArticles["text"], 0, 100); ?></p>
                    </div>
                  </div>
                </li>
              <?php endforeach; ?>
          </ul>
        </div>
        <div id="recentComent" class="tab-pane fade" role="tabpanel">
          <ul class="small_catg popular_catg">
              <?php foreach($comments as $comment) : ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="/article/<?=$comment["articles_id"]; ?>" class="media-left">
                      <img alt="<?=$comment["name"]; ?>" title="<?=$comment["name"]; ?>" src=""> </a>
                    <div class="media-body">
                      <h4 class="media-heading"><a href="/article/<?=$comment["articles_id"]; ?>"><?=$comment["name"]; ?></a></h4>
                      <p><?php echo substr($comment["text"], 0, 100); ?></p>
                    </div>
                  </div>
                </li>
              <?php endforeach; ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="single_bottom_rightbar wow fadeInDown">
      <h2>Popular Lnks</h2>
      <ul class="nav-modal">
        <li><a href="/">Home</a></li>
        <li><a href="/about">About us</a></li>
        <li><a href="/contact">Contact us</a></li>
        <?php if (User::isGuest()): ?>
            <li><a class="cd-signin" href="#0">SignIn</a></li>
            <li><a class="cd-signup" href="#0">Register</a></li>
        <?php else: ?>
            <li><a href="/cabinet/">Accaunt</a></li>
            <li><a href="/user/logout/">SignOut</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</div>
