<?php
namespace Library\Config;
/**
 *
 */
 use \Library\ApplicationComponents as appComponet;
 use \Library\Details as CONFG;

class Config extends appComponet
{

  protected static $vars = array();
  protected static $status=1;
  protected static $data;
  protected static $ap;
  protected static $nXML;
  protected static $userApp = array();

  public function __construct($apps)
  {
   parent::__construct($apps);
   self::$ap=$this;
   self::$nXML=__DIR__.'/../../ApplicationConfig/Config/app.xml';

  }
  public static function GET_($var)
  {
  if (!self::$vars){
    $xml = new \DOMDocument;
      $xml->load(__DIR__.'/../../'.self::$app::NAME().'/Config/app.xml');
      $elements = $xml->getElementsByTagName('define');
      foreach ($elements as $element)
           {
              self::$vars[$element->getAttribute('var')] = $element->getAttribute('value');
           }
     }

     if (isset(self::$vars[$var])) {
       return self::$vars[$var];
     }else {
       return null;
     }

  }

  public static function APPLICATION_CONFIG()
  {

    if (is_file(self::$nXML)) {
      $dom = new \DomDocument();
      $dom->load(self::$nXML);
      $messages=$dom->getElementsByTagName('messages');
      for ($i=0; $i <count($messages) ; $i++) {
        $msg=$messages[$i];
        $id=$msg->getAttribute('id');
        if ($id==$_SESSION['poiuytrewq']) {

          if ($msg->hasChildNodes()) {

            foreach ($msg->childNodes as $node) {
              self::$userApp[$node->nodeName]=$node->firstChild->nodeValue;
            }
          }
          break;
        }

      }
      if (count(self::$userApp)>0) {
      return new CONFG\ConfigApp(self::$userApp);

       }else {
         return new CONFG\ConfigApp;
       }
    }



  }
  public static function ADD_1()
  {
   fopen(self::$nXML,"a+");

    $xml = new \XMLWriter();

     if (self::$status==1) {
       $xml->openMemory();
       $xml->startDocument();
         $xml->startElement("messages");
         $xml->writeAttribute("id", $_SESSION['poiuytrewq']);
            $xml->writeElement("headerNumber",self::$data::HEADER_NEW());
            $xml->writeElement("newNumber",self::$data::NEW_MSG());


            $xml->writeElement("unreadNumber",self::$data::UNREAD_MSG());

            $xml->writeElement("newMsgGroup",self::$data::NEW_MSG_GROUP());

            $xml->writeElement("newMsgClub",self::$data::NEW_MSG_CLUB());

        $xml->endElement();
$xmlAdd=$xml->outputMemory();
file_put_contents(self::$nXML,$xmlAdd);

     }



  }

  public static function APPLICATION_CONFIG_APP(CONFG\ConfigApp $data)
  {
   if (is_file(self::$nXML)) {
     $parent = new \DomDocument;
     $parent_node = $parent->createElement('messages');
     $attribute = $parent->createAttribute("id");
     $attribute->value = $_SESSION['poiuytrewq'];
     $parent_node->appendChild($attribute);

     $parent_node->appendChild($parent->createElement("newNumber",$data::NEW_MSG()));
     $parent_node->appendChild($parent->createElement("headerNumber",$data::HEADER_NEW()));
     $parent_node->appendChild($parent->createElement("newMsgClub",$data::NEW_MSG_CLUB()));
     $parent_node->appendChild($parent->createElement("newMsgGroup",$data::NEW_MSG_GROUP()));
     $parent_node->appendChild($parent->createElement("unreadNumber",$data::UNREAD_MSG()));
     $parent->appendChild($parent_node);

     $dom = new \DomDocument;
     $dom->load(self::$nXML);

     $xpath = new \DOMXpath($dom);
     $nodelist = $xpath->query("/messages[@id={$_SESSION['poiuytrewq']}]");
     $oldnode = $nodelist->item(0);

    if ($oldnode!='undefined' && $oldnode!=false && $oldnode!=null) {

      $newnode = $dom->importNode($parent->documentElement, true);

      $oldnode->parentNode->replaceChild($newnode, $oldnode);
      $editedDocumment=$dom->saveXML();
      file_put_contents(self::$nXML,$editedDocumment);


           self::$status=0;
           return self::$ap;
     }else {
       self::$data=$data;
       return self::$ap;
     }
   }else {
     self::$status=0;
     return self::$ap;
   }

      // $element= $xml->getElementById($_SESSION['poiuytrewq']);
      //
      //      if ($element) {
      //                     $alnew=$xml->createAttribute('headerNewMsgs');
      //                     $new=$xml->createAttribute('newMsg');
      //                     $unrp=$xml->createAttribute('unreadPersonalMsgs');
      //                     $newg=$xml->createAttribute('newGroupMsgs');
      //                     $newc=$xml->createAttribute('newClubMsgs');
      //                     $newkey=$xml->createAttribute('key');
      //                     $alnew->value=$data::HEADER_NEW();
      //                     $new->value=$data::NEW_MSG();
      //                     $unrp->value=$data::UNREAD_MSG();
      //                     $newg->value=$data::NEW_MSG_GROUP();
      //                     $newc->value=$data::NEW_MSG_CLUB();
      //                     $newkey->value=$data::KEY();
      //                     $element->appendChild($alnew);
      //                     $element->appendChild($new);
      //                     $element->appendChild($unrp);
      //                     $element->appendChild($newg);
      //                     $element->appendChild($newc);
      //                     $element->appendChild($newkey);
      //                     $element->setIDAttribute('id',true);
      //
      //                     $xml->save(__DIR__.'/../../ApplicationConfig/Config/app.xml');
      //
      //                      self::$status=0;
      //                      return self::$ap;
      //
      //      }else {
      //        self::$data=$data;
      //        return self::$ap;
      //      }


}



}

 ?>
