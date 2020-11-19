<?php include __DIR__.'/../../../HakrichappIndex/Views/'.ucfirst($deviceType).'/search.php'; ?>
<section>

<?=$searchResult; ?>

<?php include  __DIR__.'/../../../Softwares/Views/'.ucfirst($deviceType).'/apps_suggest.php'; ?>
<?php include  __DIR__.'/../../../Article/Views/'.ucfirst($deviceType).'/articles_suggest.php'; ?>
