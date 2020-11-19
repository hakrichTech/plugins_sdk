<?php
namespace HTML;
/**
 *
 */
 use Library\Details as Det;

class ceo_club
{
  public static function Club10($x, $url=" ", $user=" ")
  {
    $th="Joinned";
    if ($x['iduser']==$user) {
      $th="Settings";
    }
   return <<<END
   <div class="clus_">

     <div class="proImage_S">
      <img src="{$url}Pictures/Club/Avatar/{$x['avatar']}" style="width:150px; height:150px; border-radius:5px;">
     </div>
     <div class="nameClub_-">
     {$x['clubnaira']}
     </div>
     <div class="CClub_-">
      {$x['categories']}
     </div>
     <div class="CClub_-">
     {$x['members']} members
     </div>
     <div class="join-_">
      {$th}
     </div>


   </div>
END;
  }
}

 ?>
