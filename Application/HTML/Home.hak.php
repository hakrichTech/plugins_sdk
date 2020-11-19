<?php
namespace HTML;

/**
 *
 */
class Home
{

 public static function COMPUTER_ARTICLES_SUGGEST($data)
 {


   $html=<<<END

       <div class="home-article">
         <h2>  <span class="tip">tip: </span> <span class="ti">{$data::TITLE()}</span></h2>
       <div class="article">
         <div class="article-image">
           <img src="{$data::url()}News/data/{$data::IMAGE_HEADER()}" alt=""/>
         </div>
         <div class="article-text-content">
            {$data::CONTENT()}
           <span>More...</span>
         </div>
         <hr>
         <div class="article-by-time-comment">
           <div  class="name-date">
            <span class="icon"></span>
            By {$data::IDUSER()::USERNAME()},<br>
            {$data::TIME_UPLOADED()}
           </div>

           <div class="Comments">
             <span class="icon"></span>
       f
           </div>
         </div>

       </div>


       </div>

   END;

   return $html;
 }

 public static function MOBILE_ARTICLES_SUGGEST($data)
 {
   $html=<<<END
   <div class="home-article">
     <h2>  <span class="ti">{$data::TITLE(30)}</span> </h2>
   <div class="article">
     <div class="article-image">
     <img src="{$data::url()}News/data/{$data::IMAGE_HEADER()}" alt=""/>

     </div>
     <div class="article-text-content">
       <div class="headerAR">{$data::TITLE()}</div>
       {$data::CONTENT(430)}

       <span>More...</span>
     </div>
     <div class="article-hr"></div>
     <div class="article-by-time-comment">
       <div class="name-date">
        <span class="icon"></span>
        By {$data::IDUSER()::USERNAME()},<br>
        {$data::TIME_UPLOADED()}
       </div>

       <div class="Comments">
         <span class="icon"></span>
   f
       </div>
     </div>

   </div>


   </div>
   END;

   return $html;
 }

 public static function MOBILE_ARTICLES_TOP($data){
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
   END;

   return $html;
 }


 public static function COMPUTER_ARTICLES_TOP($data)
 {

   $html=<<<END
   <div class="article">
     <div class="article-image">
      <img src="{$data::url()}News/data/{$data::IMAGE_HEADER()}" alt=""/>
     </div>
     <div class="article-content">
       <div class="article-header">
         {$data::TITLE()}
       </div>
       <div class="article-content-text">
         {$data::CONTENT(224)}
       </div>
       <div class="content-by">
       By {$data::IDUSER()::USERNAME()}
       </div>
     </div>

   </div>

   END;

  return $html;
 }

 public static function MOBILE_TOP_APP($data){
   $name=str_replace(' ', '', $data::NAME());
   $html=<<<END

      <div class="app"  onclick="downloadButton('{$name}','{$data::UNIQ()}')">

      <img src="{$data::AVATAR()}" alt="" />

      </div>

   END;

   return $html;
 }
 public static function COMPUTER_TOP_APP($data)
 {
   $name=str_replace(' ', '', $data::NAME());
   $html=<<<END

      <div class="app" name="app-download" data-name="{$name}" data-id="{$data::UNIQ()}">

      <img src="{$data::AVATAR()}" alt="" />

      </div>

   END;

   return $html;
 }

 public static function COMPUTER_HOME_APP($data)
 {
   $name=str_replace(' ', '', $data::NAME());

   $html=<<<END
      <div class="app" name="app-download" data-name="{$name}" data-id="{$data::UNIQ()}" >
      <img src="{$data::AVATAR()}" alt="" />

      </div>

   END;

   return $html;
 }

 public static function MOBILE_HOME_APP($data)
 {
   $name=str_replace(' ', '', $data::NAME());

   $html=<<<END
      <img src="{$data::AVATAR()}"  onclick="downloadButton('{$name}','{$data::UNIQ()}')"alt="" />


   END;

   return $html;
 }


 public static function COMPUTER_APP($data)
 {
   $name=str_replace(' ', '', $data::NAME());
   $html=<<<END
   <div class="apps">
        <div class="image-ap">
       <img src="{$data::AVATAR()}" alt="" />
        </div>
        <div class="apname">
         {$data::NAME()}
        </div>
        <div class="size-version">
          40MB <br>
          version: 4.0.4
        </div>

        <div class="downloadHere"  name="app-download" data-name="{$name}" data-id="{$data::UNIQ()}">
         Download
        </div>
      </div>
   END;

   return $html;
 }


 public static function MOBILE_APP($data)
 {
   $name=str_replace(' ', '', $data::NAME());

   $html=<<<END

   <div class="applicationLog" onclick="downloadButton('{$name}','{$data::UNIQ()}')">
     <div class="applicationImageLogo">
      <img src="{$data::AVATAR()}" alt="" />
     </div>
     <div class="appliction-name-version">
       <div class="application-name">
       {$data::NAME(17)}

       </div>
       <div class="application-vesion">
        version: 4.0.4
       </div>
       <div class="application-size">
         40MB
       </div>
     </div>
   </div>


   END;
   return $html;
 }







}



 ?>
