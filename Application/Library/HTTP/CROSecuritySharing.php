 <?php
 namespace Library\HTTP;


 /**
  *
  */
 class CROSecuritySharing
 {

   public static function ALLOW_ACCESS()
   {
     $allowedOrigin=array('(https://)?(www\.)?hakrichapp.tech','(https://)?(www\.)?hakrichtips.tech','(https://)?(www\.)?hakrichnews.com');

     if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] != '') {
       foreach ($allowedOrigin as $alowed) {
         if (preg_match('#'.$allowed.'#', $_SERVER['HTTP_ORIGIN'])) {
           header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
           header('Access-Control-Allow-Methods: GET, POST');
           header('Access-Control-Max-Age: 1000');
           header('Access-Control-Allow-Headers: Content-Type');
           break;
         }
       }
     }

   }
 }




  ?>
