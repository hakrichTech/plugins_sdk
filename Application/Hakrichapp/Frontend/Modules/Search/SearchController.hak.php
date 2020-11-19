<?php
namespace Hakrichapp\Frontend\Modules\Search;
/**
 *
 */
 use Library\Application as app;
 use Library\BackController as component;
 use Library\HTTP\HTTPRequest as Request;
 use HTML;

class SearchController extends component
{
  protected static $Index;

  function __construct(app $app, $module, $action){
    parent::__construct($app, $module, $action);
    self::$Index=$this;
  }



  public static function EXECUTE__404()
  {
    self::$app::HTTP_RESPONSE()::REDIRECT_404();
  }




protected static function Hm()
{
  self::HEADER();
  self::HOME_NEWS();
  self::TOP_APPLICTION();
  self::HOME_APPLICATION();
  self::$page::ADD_VAR('title','Searching');
  self::$page::ADD_VAR('page','resultAll');
}


public static function EXECUTE_SEARCHMOBILE(Request $request)
{
  $device=strtoupper(self::$app::$device::TYPE());
  if (!is_callable(array(self::$Index, $device))) {
    throw new \RuntimeException('unknown device"'.$device.'"n\'est pas définie sur ce module');
  }else {
    self::$device();
  }
  if (!self::$app::USER()::HAS_FLASH() && !self::$app::USER()::IS_AUTH()) {
// CODE...
  }else {

  }
  $searchArticle=$device.'_ARTICLE';
  $searchSoftware=$device.'_APP';
  $url=self::$app::$url;

  if ($request::POST_EXISTS("search")) {
    $queri=htmlspecialchars($request::POST_DATA("search"));
    if ($queri!="null") {
      $dat=self::$search_Manager::SEARCHING($queri)::APK()::ARTICLE()::OUTPUT();
      $html=<<<END
      <div class="Searching">
        <div class="categ-list">

          <table>
            <tr>
              <td onclick="action('{$url}searching?data=form')" style="background:grey;color:white;border-radius:3px;">All</td>
              <td onclick="action('{$url}searching?data=form&app')">Applications</td>
              <td onclick="action('{$url}searching?data=form&new')">Articles</td>
            </tr>
          </table>

        </div>


        <div class="resultApk">
      END;
      if (isset($dat['id'])) {
        $number=count($dat['id']);
      }else {
        $number=0;
      }
      if ($number) {
        asort($dat['id']);

        foreach ($dat['id'] as $id) {
          if ($dat['result'][$id]['searchCode']==2) {
            $html.=HTML\Search::$searchArticle(self::NEWS_DETAIL($dat['result'][$id]));
          }else {
            $html.=HTML\Search::$searchSoftware(self::SOFT_DETAIL($dat['result'][$id]));

          }
        }

      }else {
        $html.="Not Found in our database!";
      }
      $html.="</div></div>";

      self::$page::ADD_VAR('searchResult',$html);


    }
  }

  if ($request::GET_EXISTS("app")) {
   $queri=htmlspecialchars($request::POST_DATA("search"));
    if ($queri!="null") {
      $dat=self::$search_Manager::SEARCHING($queri)::APK()::OUTPUT();
      $html=<<<END
      <div class="Searching">
        <div class="categ-list">

          <table>
            <tr>
              <td onclick="action('{$url}searching?data=form')">All</td>
              <td style="background:grey;color:white;border-radius:3px;" onclick="action('{$url}searching?data=form&app')">Applications</td>
              <td onclick="action('{$url}searching?data=form&new')">Articles</td>
            </tr>
          </table>

        </div>


        <div class="resultApk">

      END;
      if (isset($dat['id'])) {
        $number=count($dat['id']);
      }else {
        $number=0;
      }
      if ($number) {
      asort($dat['id']);

      foreach ($dat['id'] as $id) {
          $html.=HTML\Search::$searchSoftware(self::SOFT_DETAIL($dat['result'][$id]));
      }

    }else {
      $html.="Not Found in our database!";
    }

      $html.="</div></div>";
      self::$page::ADD_VAR('searchResult',$html);

    }
  }

  if ($request::GET_EXISTS("new")) {
   $queri=htmlspecialchars($request::POST_DATA("search"));
    if ($queri!="null") {
      $dat=self::$search_Manager::SEARCHING($queri)::ARTICLE()::OUTPUT();
      $html=<<<END
      <div class="Searching">
        <div class="categ-list">

          <table>
            <tr>
              <td onclick="action('{$url}searching?data=form')">All</td>
              <td onclick="action('{$url}searching?data=form&app')">Applications</td>
              <td style="background:grey;color:white;border-radius:3px;" onclick="action('{$url}searching?data=form&new')">Articles</td>
            </tr>
          </table>

        </div>


        <div class="resultApk">
      END;
      if (isset($dat['id'])) {
        $number=count($dat['id']);
      }else {
        $number=0;
      }
      if ($number) {

      asort($dat['id']);

      foreach ($dat['id'] as $id) {
        $html.=HTML\Search::$searchArticle(self::NEWS_DETAIL($dat['result'][$id]));
      }
    }else {
          $html.="Not Found in our database!";
        }
      $html.="</div></div>";
      self::$page::ADD_VAR('searchResult',$html);

    }
  }





  self::Hm();

}

private static function COMPUTER()
{
  self::EXECUTE__404();
}
private static function MOBILE()
{
  self::$page::ADD_VAR('deviceType','mobile');
  self::$page::ADD_VAR('display','none');

}
private static function TEBLET()
{
  self::$page::ADD_VAR('deviceType','tablet');
}
public static function EXECUTE()
{
  self::RUN_DEVICE(self::$Index);

}

}

 ?>
