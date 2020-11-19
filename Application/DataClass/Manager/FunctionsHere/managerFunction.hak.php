<?php
namespace DataClass\Manager\FunctionsHere;
/**
 *
 */
 use DataClass\AddInObject\Object_ as classAddIn;
 use DataClass\PostDatas\Temp as DATA;

class managerFunction extends classAddIn
{

  /**
   *
   */

public static function RESEARCH_TEXT(string $x):array
{
  $ar=array();
  for ($i=0; $i < strlen($x) ; $i++) {
    $ar[]=$x[$i];
  }
  return $ar;
}
   public static function stringCut($x,$n)
  {
  $a=strlen($x);
  $string=array();
  if ($a>$n) {
    $b=$n-3;
  for ($i=0; $i < $b; $i++) {
    $string[]=$x[$i];
  }
  $string[]="...";
  }else {
    $string[]=$x;
  }
  return join($string);
  }

   public static function UPDATE_DATA(array $x,array $y)
   {
     for ($i=0; $i <count($y) ; $i++) {
       if (isset($x[$y[$i]]) && $x[$y[$i]]!="" && strlen($x[$y[$i]])>1) {
         // code...
       }else {
         $x[$y[$i]]="null";
       }
     }
     return $x;

   }


 public static function IMAGE_EDITOR($imagePost,$fileSave)
 {
   if (isset($imagePost['name']) && !empty($imagePost['name'])) {
     if ($imagePost['size']>0) {
     $ext=strtolower(pathinfo($imagePost['name'], PATHINFO_EXTENSION));
     $filename='Cl'.uniqid().'uBActive.'.$ext;
     move_uploaded_file($imagePost['tmp_name'],__DIR__."/../../../../Web/".$fileSave.$filename);
     return $filename;
   }
 }else {
   return "null";
 }

 }

  public static function IMAGE_JPEG($x, $y)
  {
    $image =base64_decode(str_replace(' ', '+', str_replace('data:image/jpeg;base64,', '', $x)));
    $imageName="Sin".uniqid()."Cure.jpeg";
    $file=$y.$imageName;
    $true=file_put_contents(__DIR__."/../../../../Web/".$file, $image);
    if ($true && $image!=NULL) {
       return $imageName;
    }
    else {
      return "ERROR Create your image!";
    }
  }


public static function checkT_ago($x)
{
    $milisecond=time()-$x;
    $minutes=round($milisecond/60);
    $rest=$milisecond%60;
    $hours=round($minutes/60);
    $restMinutes=$minutes%60;
    $days=round($hours/24);
    $restday=$hours%24;
    $weeks=round($days/7);
    $restmoth=$days%7;

  if ($weeks==0) {
    if ($days==0) {
      if ($hours==0) {
        if ($minutes==0) {
          return $milisecond." seconds";
        }else {
          return $minutes." minutes";
        }
      }else {
        return $hours." hours";
      }
    }else {
      return $days." days";
    }
  }else {
    return $weeks." weeks";
  }

}



  public static function IMAGE_PNG($x, $y)
  {  $image =base64_decode(str_replace(' ', '+', str_replace('data:image/png;base64,', '', $x)));
    $imageName="Sin".uniqid()."Cure.png";
    $file=$y.$imageName;
    $true=file_put_contents(__DIR__."/../../../../Web/".$file, $image);
    if ($true && $image!=NULL) {
       return $imageName;
    }
    else {
      return "ERROR Create your image!";
    }
  }




  public static function AUDIO_UP($x, $t)
  {
    $y ="LaSin".uniqid()."Cure";
    $upload_dir = $t.$y;
    $f=move_uploaded_file($x, __DIR__."/../../../../Web/".$upload_dir);
    if ($f) {
      return $y;
    }else {
      return false;
    }
  }




  public static function VIDEO_UP($x, $t)
  {
    $y ="LaSin".uniqid()."Cure";
    $upload_dir = $t.$y;
    $f=move_uploaded_file($x, __DIR__."/../../../../Web/".$upload_dir);
    if ($f) {
      return $y;
    }else {
      return false;
    }
  }





  public static function PDF_UP($x, $t)
  {
    $y ="LaSin".uniqid()."Cure.pdf";
    $upload_dir = $t.$y;
    $f=move_uploaded_file($x, __DIR__."/../../../../Web/".$upload_dir);
    if ($f) {
      return $y;
    }else {
      return false;
    }
  }






  public static function sizeWH($x,$z,$t=" ")
  {
    if ($t!=" ") {
      $ex = strtolower(substr(strrchr($x, '.'), 1));
      if ($ex!="") {
        if ($ex=="jpg"||$ex=="jpeg") {
          $source = imagecreatefromjpeg(__DIR__."/../../../../Web/".$z.$x);
        }else {
        $source = imagecreatefrompng(__DIR__."/../../../../Web/".$z.$x);
       }

        $w = imagesx($source);
        $h = imagesy($source);
     return $h;
      }
    }else {

    $ex = strtolower(substr(strrchr($x, '.'), 1));
    if ($ex!="") {
      if ($ex=="jpg"||$ex=="jpeg") {
        $source = imagecreatefromjpeg(__DIR__."/../../../../Web/".$z.$x);
      }else {
      $source = imagecreatefrompng(__DIR__."/../../../../Web/".$z.$x);
     }

      $w = imagesx($source);
      $h = imagesy($source);
      if ($w>$h) {
        return "w";
      }else {
        return "h";
      }
    }
  }

  }












  public static function UserMinu($inputfile, $fetchLink, $saveLink)
  {
  $ext = strtolower(substr(strrchr($inputfile, '.'), 1));
  if ($ext == "jpeg" || $ext == "jpg") {
  $source = imagecreatefromjpeg(__DIR__."/../../../../Web/".$fetchLink.$inputfile);
  $destin = imagecreatetruecolor(200, 250);
  $destin2 = imagecreatetruecolor(300, 230);
  $destin3 = imagecreatetruecolor(200, 200);

  $large_source = imagesx($source);
  $haute_source = imagesy($source);

  $large_destin = imagesx($destin);
  $haute_destin = imagesy($destin);

  $large_destin2 = imagesx($destin2);
  $haute_destin2 = imagesy($destin2);

  $large_destin3 = imagesx($destin3);
  $haute_destin3 = imagesy($destin3);

  if ($haute_source >= $large_source) { // si le height est grand le width
    imagecopyresampled($destin, $source, 0,0,0,0, $large_destin, $haute_destin, $large_source, $haute_source);
  $p = "h";
    imagejpeg($destin, __DIR__."/../../../../Web/".$saveLink.$inputfile);
  }
  else if ($haute_source == $large_source) { // si il est carre
    imagecopyresampled($destin3, $source, 0,0,0,0, $large_destin3, $haute_destin3, $large_source, $haute_source);
  $p = "c";
    imagejpeg($destin3, __DIR__."/../../../../Web/".$saveLink.$inputfile);
  }
  else { // si le width est plus grand que le height
    imagecopyresampled($destin2, $source, 0,0,0,0, $large_destin2, $haute_destin2, $large_source, $haute_source);
  $p = "w";
    imagejpeg($destin2, __DIR__."/../../../../Web/".$saveLink.$inputfile);
  }
  }
  elseif($ext==""){ // donc cest un png

   $source = imagecreatefrompng(__DIR__."/../../../../Web/".$fetchLink.$inputfile);
   $destin = imagecreatetruecolor(200, 250);
   $destin2 = imagecreatetruecolor(300, 150);
   $destin3 = imagecreatetruecolor(200, 200);

   $large_source = imagesx($source);
   $haute_source = imagesy($source);

   $large_destin = imagesx($destin);
   $haute_destin = imagesy($destin);

   $large_destin2 = imagesx($destin2);
   $haute_destin2 = imagesy($destin2);

   $large_destin3 = imagesx($destin3);
   $haute_destin3 = imagesy($destin3);

   if ($haute_source >= $large_source) { // si le height est grand le width
     imagecopyresampled($destin, $source, 0,0,0,0, $large_destin, $haute_destin, $large_source, $haute_source);
  $p = "h";
     imagejpeg($destin, __DIR__."/../../../../Web/".$saveLink.$inputfile.".jpeg");
   }
   else if ($haute_source == $large_source) { // si il est carre
     imagecopyresampled($destin3, $source, 0,0,0,0, $large_destin3, $haute_destin3, $large_source, $haute_source);
  $p = "c";
     imagejpeg($destin3, __DIR__."/../../../../Web/".$saveLink.$inputfile.".jpeg");
   }

   else { // si le width est plus grand que le height
     imagecopyresampled($destin2, $source, 0,0,0,0, $large_destin2, $haute_destin2, $large_source, $haute_source);
  $p = "w";
     imagejpeg($destin2, __DIR__."/../../../../Web/".$saveLink.$inputfile);
   }
  }
  return $p;
  }


  public static function ARRANGEMENTPOST(array $x, $POST)
  {
    $number=0;
    $v=" ";
    $data=array();
    if (isset($x['image'])) {
      $d=count($x['image']);
      $poid=array();
      $number=$d+$number;
      for ($i=0; $i < $d ; $i++) {
      if ($i==0) {
        $t=self::UserMinu($x['image'][$i],"Pictures/Pietoiz/","Pictures/Miniatures/");
        $v=$t;
      }else {
        $t=self::UserMinu($x['image'][$i],"Pictures/Pietoiz/","Pictures/Miniatures/");
      }
      $poid[]=array($x['image'][$i],$t);
       }
       $data[]=$poid;

    }
    if (isset($x['audio'])) {
      $d=count($x['audio']);
      $data[]=$x['audio'];
      $number=$d+$number;
    }
    if (isset($x['video'])) {
      $d=count($x['video']);
      $data[]=$x['video'];
      $number=$d+$number;
    }
    if ($number<=4&&$number!=2) {
      $number=$number.$v;
    }
    $ry=DATA\datas::IMGTYPE();
    return array('content' =>$POST['content']??"",
                  'files'=>$data,
                  'artist'=>"" ,
                  'title'=> "",
                  'type'=> $ry[0],
                  'poid'=> " ",
                  'number'=>$number);
  }


}

 ?>
