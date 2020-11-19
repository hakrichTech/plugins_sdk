<nav>
  <?php  require_once __DIR__.'/../../../Softwares/Views/'.ucfirst($deviceType).'/submit.php'; ?>
  <?php require_once  __DIR__.'/../../../HakrichappIndex/Views/'.ucfirst($deviceType).'/menu_left.php'; ?>
</nav>
<div class="home_and_so">
  <?php require_once  __DIR__.'/../../../HakrichappIndex/Views/'.ucfirst($deviceType).'/Search.php'; ?>

  <?php require_once __DIR__.'/DownloadPro.php'; ?>

  <div class="Apss-soFT">

   <div class="Ap-ps">
  <?php require_once  __DIR__.'/../../../Softwares/Views/'.ucfirst($deviceType).'/apps.php'; ?>
  </div>
  </div>
  <?php require_once  __DIR__.'/../../../Article/Views/'.ucfirst($deviceType).'/articles_suggest.php'; ?>

</div>
<script type="text/javascript">
getElement('da').onclick=function (event) {
 var data=getElement('da').dataset.url;
  if (data=="downloads") {
    location.replace('<?=$url ?>softwares');
  }else {
    location.replace('<?=$url ?>softwares/'+data);
  }

}

getElement('nw').onclick=function (event) {
 var data=getElement('nw').dataset.url;
  if (data=="downloads") {
    location.replace('<?=$url ?>softwares');
  }else {
    location.replace('<?=$url ?>softwares/'+data);
  }


}


getElement('appsLD').forEach((item, i) => {
var data=item.dataset.set;
item.onclick=function () {
 location.replace('<?=$url ?>softwares/?categ='+data);
}
});

getElement('games').forEach((item, i) => {
var data=item.dataset.set;
item.onclick=function () {
 location.replace('<?=$url ?>softwares/?game='+data);
}
});

</script>
