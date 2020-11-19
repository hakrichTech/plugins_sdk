<?php
$v="";
if (isset($_POST['search'])) {
  $v=$_POST['search'];
}
 ?>
<div class="home-search">
  <form id="form4" action="<?=$url ?>searching?data=form" method="post">
    <div class="searchIng">
      <input type="search" name="search" autocomplete="off" value="<?=$v ?>" placeholder="Searching ..." >
    </div>

    <div class="IconSearch">
    <img src="<?=$url ?>img/svg/search.png" alt="" onclick="Searching('form4')">
    </div>
  </form>

</div>
<script type="text/javascript">
  function Searching(x) {
    getElement(x).submit();
  }

  function action(x) {
    getElement('form4').action=x;
    getElement('form4').submit();

  }
</script>
