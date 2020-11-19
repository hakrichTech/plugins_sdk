<div class="Apss-soFT">

 <div class="Ap-ps">

   <h1>APPLICATION'S CATEGORIES</h1>

  <div class="applica">

      <div class="">
        <table>
          <tr>
            <td>Sort by:</td>
            <td class="et da" data-url="downloads">Downloads</td>
            <td class="et nw" data-url="new">New Apps</td>
            <!-- <td>Download</td> -->
          </tr>
        </table>
      </div>


<div class="apk-file">
  <?=$appss?>

</div>

  </div>




<?php require __DIR__.'/apps.php'; ?>










 </div>
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
