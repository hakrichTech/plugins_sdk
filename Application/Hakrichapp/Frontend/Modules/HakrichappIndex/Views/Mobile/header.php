<header>
  <div class="header-menu">
    <div class="logo" id="logoHome">
      <div class="logo-space">
       <img src="<?=$url ?>img/favicon.png" alt="" id="menuHo">
      </div>
      <div class="logo-name">
       Apps Manager
      </div>
    </div>

    <div class="menu">
    <img src="<?=$url ?>img/svg/menu.svg" alt="" onclick="Phonecallthis('MenupopUp')">
    <?php require_once 'menu.php' ?>
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
