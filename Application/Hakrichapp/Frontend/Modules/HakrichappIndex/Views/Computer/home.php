<nav>
  <?php include 'menu_left.php'; ?>
</nav>

<article class="home_and_so">
  <?php include 'Search.php'; ?>
  <?php include  __DIR__.'/../../../Softwares/Views/'.ucfirst($deviceType).'/topup.php'; ?>
  <?php include  __DIR__.'/../../../Article/Views/'.ucfirst($deviceType).'/home_articles.php'; ?>
  <?php include  __DIR__.'/../../../Softwares/Views/'.ucfirst($deviceType).'/apps_suggest.php'; ?>
  <?php include  __DIR__.'/../../../Article/Views/'.ucfirst($deviceType).'/articles_suggest.php'; ?>



</article>
