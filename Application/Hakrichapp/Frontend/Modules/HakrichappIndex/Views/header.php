<!-- <header style="background-image:url('<?=$url ?>img/559128.png');"> -->
<header>

<div class="SIgnUpLogION">
<div class="leftOpt">
  HAKRICH App
</div>
 <?php require $deviceType."_header_content.php"; ?>


</div>

<div class="Headding">
  <?php if (isset($headerPost)): ?>
    <ptit><?=$headerPost ?></ptit>

<?php else: ?>
  <ptit>HakrichApp suitable place for Programming, Help others to move on by what you know.</ptit>

  <?php endif; ?>
</div>
<div class="tablFol">
  <table>
  <tr>
    <td  class="profIm"></td>
    <td>
      <span>Created by</span>
       <nCr>Hakrich Team</nCr>
    </td>
    <td class="spa"></td>
    <td  class="profIm"></td>
    <td>
    <span>Follow us on Facebook</span>
     <nCr>Hakrich Team</nCr>
    </td>
  </tr>
  </table>
</div>



</header>
<section>
<div class="search">
<div class="searchInput">
  <form class="searchForm" action="index.html" method="post">
    <input type="search" name="" placeholder="Search..." value="">
     <div class="searchIcon" style="background-image:url('<?=$url ?>img/search-9-512.png');">

     </div>
  </form>
</div>
</div>

<?php require __DIR__.'/../../Android/Views/popularApps.php'; ?>
