<?php
namespace HTML;

/**
 *
 */
class Search
{


 public static function MOBILE_ARTICLE($data)
 {
   $html=<<<END

   <div class="article">
    <div class="article-image">
    <img src="{$data::url()}News/data/{$data::IMAGE_HEADER()}" width="126" height="105" alt=""/>

     </div>
     <div class="article-content">
     <div class="article-header">
     {$data::TITLE(17)}
      </div>
      <div class="article-content-text">
      {$data::CONTENT(60)}

      </div>
      <div class="content-by">
      By {$data::IDUSER()::USERNAME()}

      </div>
   </div>

   </div>

   <hr>
   END;
   return $html;
 }

 public static function ARTICLE($data)
 {
   $html=<<<END

   <div class="appl">


     <div class="article-image">
     <img src="{$data::url()}News/data/{$data::IMAGE_HEADER()}" width="150" height="150" alt="">
     </div>

     <div class="content-article">
       <h2>{$data::TITLE(21)}</h2>
       <div class="cont">
       {$data::CONTENT(164)}

       </div>

       <div class="bry">
         By: {$data::IDUSER()::USERNAME(10)}
       </div>

     </div>


   </div>

   END;

   return $html;
 }

public static function MOBILE_APP($data)
{
  $name=str_replace(' ', '', $data::NAME());

  $html=<<<END

  <div class="androidApk">
    <div class="downloadAndSize">
       <div class="downloadButton" onclick="downloadButton('{$name}','{$data::UNIQ()}')">
        <img src="{$data::url()}img/bigt-down-arrow.png" alt="">
       </div>
       <div class="sizeApk">
         34.0Mb
       </div>
    </div>
    <div class="infoApk">
       <div class="nameAndVersion" onclick="downloadButton('{$name}','{$data::UNIQ()}')">
        <div class="name">
          {$data::NAME()}
        </div>
        <div class="Version">
         {$data::VERSION()}
        </div>
       </div>

       <div class="iconApk" onclick="downloadButton('{$name}','{$data::UNIQ()}')">
           <img src="{$data::AVATAR()}" alt="">
       </div>
    </div>

  </div>
  <hr>

  END;

  return $html;
}

  public static function APP($data)
  {
    $name=str_replace(' ', '', $data::NAME());

    $html=<<<END
    <div class="appl">

      <div class="app-log" onclick="downloadButton('{$name}','{$data::UNIQ()}')">
       <img src="{$data::AVATAR()}" width="50" height="50" alt="">
      </div>

      <div class="app-Info">
      <div class="name-App" onclick="downloadButton('{$name}','{$data::UNIQ()}')">
        {$data::NAME()} <br>
        <span>{$data::VERSION()}</span>
      </div>
       <div class="downloadHere" onclick="downloadButton('{$name}','{$data::UNIQ()}')">
        <img src="{$data::url()}img/svg/download.svg" alt="">
        <span></span>
       </div>
      </div>


    </div>
    END;

    return $html;
  }
}

 ?>
