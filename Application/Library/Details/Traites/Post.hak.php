<?php
namespace Library\Details\Traites;
/**
 *
 */
 use Library\Details as Detail;
 use DataClass\Manager\FunctionsHere as FUNT;
trait Post
{
  protected static $iduser;
  // protected static $id=0;
  protected static $articleId=0;
  protected static $content=0;
  protected static $url=0;
  protected static $time=0;
  protected static $image=0;
  protected static $title=0;
  protected static $category=0;
  protected static $approved=0;
  protected static $visited=0;
  protected static $Subcategory=0;

  public static function typePost()
  {
    return self::$tp;
  }
  public static function ID()
  {return self::$id;}

  public static function IDUSER()
  {return self::$iduser;}

  public static function IDPOST()
  {return self::$articleId;}

  public static function CONTENT($x=null)
  {
    if (is_int($x)) {
      return self::stringCut($x);
    }else{
      return self::$content;
    }


  }

  public static function CATEGORY()
  {return self::$category;}

  public static function IMAGE_HEADER()
  {return self::$image;}

  public static function TITLE($n="null")
  {
    if ($n!="null") {
      return self::stringCutT((int) $n);
    }else {
      return self::$title;
      
    }


  }
  private static function stringCutT($n)
 {
 $a=strlen(self::$title);
 $string=array();
 if ($a>$n) {
   $b=$n-3;
 for ($i=0; $i < $b; $i++) {
   $string[]=self::$title[$i];
 }
 $string[]="...";
 }else {
   $string[]=self::$title;
 }
 return join($string);
 }

  public static function URL()
  {return self::$url;}

  public static function TIME_UPLOADED()
  {return self::$time;}



  public static function APPROVED_BY():string
  {return self::$approved;}

  public static function VISITED()
  {return self::$visited;}

  public static function SUB_CATEGORY():string
  {return self::$Subcategory;}


  public static function SET_ID($x)
  {
      self::$id=$x;
  }


  protected static function SET_USERID($x)
  {
    // if (self::$iduser==0) {
      $data=self::$managers['user']::UNIQ_($x);
      if ($data) {
        $obj=new Detail\UserDetails($data, self::$managers);
        self::$iduser=$obj;
      }
    // }
  }
  protected static function SET_ARTICLEUNICID($x)
  {
      self::$articleId=$x;
  }

  protected static function SET_ARTICLECATEGORY($x)
  {
      self::$category=$x;
  }

  protected static function SET_ARTICLESUBCATEGORY($x)
  {
      self::$Subcategory=$x;

  }

  protected static function SET_ARTICLEURL($x)
  {
      self::$url=$x;

  }

  protected static function SET_UPDATEDDATE($x)
  {
      self::$time=$x;
  }

  protected static function SET_APPROVEDBY($x)
  {
      self::$approved=$x;

  }
  protected static function SET_VISITED($x)
  {
      self::$visited=$x;
  }
  private static function stringCut($n)
 {
 $a=strlen(self::$content);
 $string=array();
 if ($a>$n) {
   $b=$n-3;
 for ($i=0; $i < $b; $i++) {
   $string[]=self::$content[$i];
 }
 $string[]="...";
 }else {
   $string[]=self::$content;
 }
 return join($string);
 }


  protected static function SET_ARTICLENAME($x)
  {
      self::$title=$x;
  }

  protected static function SET_IMAGEHEADER($x)
  {
      self::$image=$x;
  }

  protected static function SET_CONTENT($x)
  {
      self::$content=$x;
  }

  public static function SET_0($x){self::$id=$x;}
    public static function SET_1($x){self::$articleId=$x;}
      public static function SET_2($x){
        $data=self::$managers['user']::UNIQ_($x);
        if ($data) {
          $obj=new Detail\UserDetails($data, self::$managers);
          self::$iduser=$obj;
        }
      }
        public static function SET_3($x){self::$title=$x;}
          public static function SET_4($x){self::$category=$x;}
            public static function SET_5($x){self::$Subcategory=$x;}
              public static function SET_6($x){self::$url=$x;}
                public static function SET_7($x){self::$content=$x;}
                  public static function SET_8($x){self::$image=$x;}
                    public static function SET_9($x){self::$time=$x;}
                      public static function SET_10($x){self::$approved=$x;}
  public static function SET_11($x){self::$visited=$x;}

}
 ?>
