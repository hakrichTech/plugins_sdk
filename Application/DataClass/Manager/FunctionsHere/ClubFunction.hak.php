<?php
namespace DataClass\Manager\FunctionsHere;
/**
 *
 */
 use DataClass\AddInObject\Object_ as classAddIn;

class ClubFunction extends classAddIn
{

 public static function CLUB_PREFIX(string $id)
 {
   $string=array();
  for ($i=0; $i <=2; $i++) {
    $string[]=$id[$i];
  }
  return join($string);

 }

}

 ?>
