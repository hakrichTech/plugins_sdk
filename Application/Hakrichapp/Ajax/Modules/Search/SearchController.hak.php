<?php
namespace Hakrichapp\Ajax\Modules\Search;
/**
 *
 */
 use Library\Application as app;
 use Library\BackControllerAjax as component;
 use Library\HTTP\HTTPRequest as Request;
 use HTML;
class SearchController extends component
{
  protected static $Index;

  function __construct(app $app, $module, $action){
    parent::__construct($app, $module, $action);
    self::$Index=$this;
  }



  public static function EXECUTE__404(Request $request)
  {
    self::$app::HTTP_RESPONSE()::REDIRECT_401();
  }

  public static function EXECUTE_SEARCHING(Request $request)
  {
    if ($request::GET_EXISTS("q")) {
      $queri=htmlspecialchars($request::GET_DATA("q"));
      if ($queri!="null") {
        $dat=self::$search_Manager::SEARCHING($queri)::APK()::ARTICLE()::OUTPUT();
        $html=<<<END
        <div class="svclose">
          <span onclick="xclose('resultSearch')">X</span>
        </div>
        <div class="header">
          <table>

            <tr>
              <td onclick="serchinall('searchInput');" style="background:grey;color:white;border-radius:3px;">All</td>
              <td onclick="serchingapp('searchInput');">Applications</td>
              <td onclick="serchingnew('searchInput');">Article</td>
            </tr>
          </table>

        </div>


        <div class="resu">
        END;
        if (count($dat)) {
          asort($dat['id']);

          foreach ($dat['id'] as $id) {
            if ($dat['result'][$id]['searchCode']==2) {
              $html.=HTML\Search::ARTICLE(self::NEWS_DETAIL($dat['result'][$id]));
            }else {
              $html.=HTML\Search::APP(self::SOFT_DETAIL($dat['result'][$id]));

            }
          }

        }else {
          $html.="Not Found in our database!";
        }
        $html.="</div>";

        self::$app::OUTPUT_0()::SET_QUERI(array('data'=>$html));
      }
    }

   if ($request::GET_EXISTS("app")) {
     $queri=htmlspecialchars($request::GET_DATA("app"));
      if ($queri!="null") {
        $dat=self::$search_Manager::SEARCHING($queri)::APK()::OUTPUT();
        $html=<<<END
        <div class="svclose">
          <span onclick="xclose('resultSearch')">X</span>
        </div>
        <div class="header">
          <table>
            <tr>
              <td onclick="serchinall('searchInput');">All</td>
              <td onclick="serchingapp('searchInput');" style="background:grey;color:white;border-radius:3px;">Applications</td>
              <td onclick="serchingnew('searchInput');">Article</td>
            </tr>
          </table>

        </div>


        <div class="resu">
        END;
        if (count($dat)) {
        asort($dat['id']);

        foreach ($dat['id'] as $id) {
            $html.=HTML\Search::APP(self::SOFT_DETAIL($dat['result'][$id]));
        }

      }else {
        $html.="Not Found in our database!";
      }

        $html.="</div>";
        self::$app::OUTPUT_0()::SET_QUERI(array('data'=>$html));
      }
   }

   if ($request::GET_EXISTS("new")) {
     $queri=htmlspecialchars($request::GET_DATA("new"));
      if ($queri!="null") {
        $dat=self::$search_Manager::SEARCHING($queri)::ARTICLE()::OUTPUT();
        $html=<<<END
        <div class="svclose">
          <span onclick="xclose('resultSearch')">X</span>
        </div>
        <div class="header">
          <table>
            <tr>
              <td onclick="serchinall('searchInput');">All</td>
              <td onclick="serchingapp('searchInput');">Applications</td>
              <td onclick="serchingnew('searchInput');" style="background:grey;color:white;border-radius:3px;">Article</td>
            </tr>
          </table>

        </div>


        <div class="resu">
        END;
        if (count($dat)) {

        asort($dat['id']);

        foreach ($dat['id'] as $id) {
          $html.=HTML\Search::ARTICLE(self::NEWS_DETAIL($dat['result'][$id]));
        }
      }else {
            $html.="Not Found in our database!";
          }
        $html.="</div>";
        self::$app::OUTPUT_0()::SET_QUERI(array('data'=>$html));
      }
   }

    self::$out=self::$app::OUTPUT_0()::DATA_RESP('json');

  }


  public static function OUT_PUT()
  {
    return self::$out;
  }





public static function EXECUTE()
{

  $method = 'EXECUTE_'.strtoupper(self::$action);
    if (!is_callable(array(self::$Index, $method))){
      throw new \RuntimeException('Action "'.self::$action.'"n\'est pas définie sur ce module');
    }else {

      self::$method(self::$app::HTTP_REQUEST());
    }
}

}

 ?>
