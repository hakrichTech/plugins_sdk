<?php require __DIR__."/../../HakrichappIndex/Views/header.php"; ?>
<div class="Apps">
<h4>Android Applications (APK)</h4>
</div>
<?php if (isset($categSelected)): ?>
  <div class="categSelected">
   <h4>Categ: <?=$categSelected ?></h4>
  </div>
<div class="apkLisT">
  <?php require_once 'apkList.php'; ?>

</div>
<?php endif; ?>
<div class="LISTapk">
  <a href="<?=$url ?>categApk/?ct=dev">Travel Apps</a>
  <a href="#">Gaming apps</a>
  <a href="#">Business Apps</a>
  <a href="#">Educational Apps</a>
  <a href="#">Lifestyle Apps</a>
  <a href="#">Entertainment apps</a>
  <a href="#">Utility Apps</a>
  <a href="#">Travel Apps</a>
  <a href="#">Develloper</a>
  <a href="#">Develloper</a>
  <a href="#">Develloper</a>
  <a href="#">Develloper</a>
  <a href="#">Develloper</a>
  <a href="#">Develloper</a>
  <a href="#">Develloper</a>
  <a href="#">Develloper</a>
  <a href="#">Develloper</a>
  <a href="#">Develloper</a>
  <a href="#">Develloper</a>
  <a href="#">Develloper</a>
<a href="#">Develloper</a>
</div>

</section>
