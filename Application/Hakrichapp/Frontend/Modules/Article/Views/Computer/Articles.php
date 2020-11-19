<nav>
  <div class="article_set">
   <div class="someTip">
     <span>Create an Article</span>
   </div>
  </div>
  <?php require_once  __DIR__.'/../../../HakrichappIndex/Views/'.ucfirst($deviceType).'/menu_left.php'; ?>
</nav>
<div class="home_and_so">
  <?php require_once  __DIR__.'/../../../HakrichappIndex/Views/'.ucfirst($deviceType).'/Search.php'; ?>
  <?php require_once __DIR__.'/articles_suggest.php'; ?>
  <?php require_once  __DIR__.'/../../../Softwares/Views/'.ucfirst($deviceType).'/apps_suggest.php'; ?>

</div>
