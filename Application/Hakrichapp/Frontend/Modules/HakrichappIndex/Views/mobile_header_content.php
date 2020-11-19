<div class="MenuIcon" data-elem="menuOption">
    <div class="baricon" >
      <div class="bar"></div>
      <div class="bar"></div>
      <div class="bar"></div>
    </div>


 <div class="menuOption" style="display:none;">
   <li><a href="<?=$url ?>"> <icon> <img src="<?=$url ?>img/house.png" style="object-fit:cover;width:35px;height:35px;" alt=""> </icon>Home </a></li>
   <li > <a href="<?=$url ?>games_Apk/"> <icon> <img src="<?=$url ?>img/games.png" style="object-fit:cover;width:35px;height:35px;" alt=""> </icon>Games </a></li>
   <li> <a href="<?=$url ?>android_Apk/"> <icon> <img src="<?=$url ?>img/apps.png" style="object-fit:cover;width:35px;height:35px;" alt=""> </icon> Apps </a></li>
   <?php if (isset($auth)): ?>
     <li> <span></span> <signBtn > <a href="<?=$url ?>login/">Account</a> </signBtn></li>
   <?php else: ?>
     <li> <span></span> <signBtn > <a href="<?=$url ?>login/">Sign In</a> </signBtn></li>

   <?php endif; ?>
 </div>

</div>

<script type="text/javascript">
function onOff(elem) {
  if (elem.style.display=="none") {
    elem.style.display="block";
  }else {
    elem.style.display="none";

  }
}

</script>
