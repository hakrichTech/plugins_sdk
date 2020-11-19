<header>
  <div class="header-menu">
    <div class="logo" id="logoHome" style="cursor:pointer;">
      <div class="logo-space">
       <img src="<?=$url ?>img/favicon.png" alt="" id="menuHo">
      </div>
      <div class="logo-name">
       Apps Manager
      </div>
    </div>

    <div class="menu">
    <?php require_once 'menu.php'; ?>
    </div>
  </div>


<div class="header-motor">
 <li><?=$Description; ?></li>
</div>

</header>

<script type="text/javascript">
getElement('logoHome').onclick=function () {
location.replace('<?=$url ?>');
}


</script>
<section>
