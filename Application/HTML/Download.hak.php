<?php
namespace HTML;

/**
 *
 */
class Download
{

public static function MOBILE_APP_DETAIL($data,$soft){
  $name=str_replace(' ', '', $data::NAME());

  $html=<<<END
  <div class="applicationLog">
    <div class="applicationImageLogo">
    <img src="{$data::AVATAR()}" alt="" />

    </div>
    <div class="appliction-name-version">
      <div class="application-name">
       {$data::NAME()}
      </div>
      <div class="application-vesion">
       {$data::$soft()::VERSION()}
      </div>
      <div class="application-size">
        40mb
      </div>
    </div>
  </div>
  <div class="Description">
  {$data::DESCRIPTION()}


   {$data::FEATURE()}

   <div class="develloped_by">

      <table>
        <tr>
          <td>Applicatioon:</td>
          <td>{$data::NAME()}</td>
        </tr>
        <tr>
          <td>Operating system:</td>
          <td>Android</td>
        </tr>

        <tr>
          <td>Requirement system Version:</td>
          <td>{$data::$soft()::REQUIEMENT()}</td>
        </tr>

        <tr>
          <td>Applicatioon Version:</td>
          <td>{$data::$soft()::VERSION()}</td>
        </tr>
        <tr>
          <td>Developed By:</td>
          <td>{$data::$soft()::UPLOADED_BY()::USERNAME()}</td>
        </tr>

        <tr>
          <td>Contact:</td>
          <td>{$data::$soft()::CONTACT()}</td>
        </tr>

        <tr>
          <td>Report:</td>
          <td>hakimushamvu@gmail.com</td>
        </tr>
      </table>


   </div>

  </div>

  <div class="application-download-developed-by" style="border:0;">

    <div class="Download-button" onclick="Redirect('{$data::$soft()::URL()}')">
       Download
    </div>
  </div>


  END;

   return $html;
  }
 public static function COMPUTER_APP_DETAIL($data,$soft)
 {
   $name=str_replace(' ', '', $data::NAME());

  return  <<<END

  <div class="Download_app">
    <h2>{$data::NAME()}</h2>

    <div class="app_logo_staph">

      <div class="app_logo">
      <img src="{$data::AVATAR()}" alt="" />

      </div>

      <div class="platform">
        <table>
          <tr>
            <td name="app-download" data-name="{$name}" data-id="{$data::UNIQ()}">Android</td>
            <td name="app-download" data-name="{$name}" data-id="{$data::UNIQ()}" data-opt="apple">i0S</td>
            <td name="app-download" data-name="{$name}" data-id="{$data::UNIQ()}" data-opt="win" >Windows Phone</td>
            <td name="app-download" data-name="{$name}" data-id="{$data::UNIQ()}" data-opt="black">Blackbery</td>

          </tr>
        </table>
      </div>

      <div class="Short-screen">
        <h4>Screenshot</h4>

         <div class="screenshort">

         </div>
         <div class="screenshort">

         </div>
         <div class="screenshort">

         </div>
         <div class="screenshort">

         </div>
         <div class="screenshort">

         </div>

      </div>

      <div class="description">
      {$data::DESCRIPTION()}
      </div>

      {$data::FEATURE()}


      <div class="develloped_by">

         <table>
           <tr>
             <td>Applicatioon:</td>
             <td>{$data::NAME()}</td>
           </tr>
           <tr>
             <td>Operating system:</td>
             <td>Android</td>
           </tr>

           <tr>
             <td>Requirement system Version:</td>
             <td>{$data::$soft()::REQUIEMENT()}</td>
           </tr>

           <tr>
             <td>Applicatioon Version:</td>
             <td>{$data::$soft()::VERSION()}</td>
           </tr>
           <tr>
             <td>Developed By:</td>
             <td>{$data::$soft()::UPLOADED_BY()::USERNAME()}</td>
           </tr>

           <tr>
             <td>Contact:</td>
             <td>{$data::$soft()::CONTACT()}</td>
           </tr>

           <tr>
             <td>Report:</td>
             <td>hakimushamvu@gmail.com</td>
           </tr>
         </table>


      </div>


      <div class="Dow" onclick="Redirect('{$data::$soft()::URL()}')">
        Download Link
      </div>

    </div>
  </div>

  END;


 }



}



?>
