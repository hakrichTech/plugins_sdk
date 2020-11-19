<?php
namespace HTML;
/**
 *
 */
class Header
{
public static function GET_HEADER(array $x,$url)
{
  return <<<END
  <header>
  <div class="Logo" title="Sinecure logo">
  <img src="{$url}ic/logo-mob.png" alt="" style="object-fit:cover;width:100%;height:100%;" >
  </div>
  <table style="margin-left: 20.5%;">
    <tr >
      <td class="LogoH" name="refrech" data-url="home" style="background-image:url('{$url}ic/house.png'); "><nb>10</nb></td>
      <td class="HommePage" name="refrech" data-url="home" >Home</td>
      <td class="LogoH" name="headerActivity" data-eventt="click" data-activity="message" data-view="msgroom" title="Message(s)" style="background-image:url('{$url}ic/speech-bubble-3-512.png'); "><nb>{$x['msgNumber']}</nb></td>
      <td class="HommePage" name="headerActivity" data-eventt="click" data-activity="message" data-view="msgroom" title="Message(s)" >Message</td>
      <td class="LogoH" title="Notification(s)" onclick="Open('Notific'); Open('pointNotif')"  style="background-image:url('{$url}ic/appointment-reminders-512.png'); "> <nb></nb> </td>
      <td class="HommePage" title="Notification(s)" onclick="Open('Notific'); Open('pointNotif')" >Flash</td>
      <td class="LogoH" style="background-image:url('{$url}ic/coe.png'); "></td>
      <td class="HommePage">Coelios</td>

      <td class="LogoH" style="background-image:url(''); "></td>
      <td class="SearchH" onclick="Open('Searc');Open('pointSearch');" title="Search"> <input type="search" id="sear" name="search" value="" placeholder="Search..."  onkeyup="searchAll(this);"> </td>


    </tr>
  </table>
  <div class="h1234">


  <div class="homeAct" style="margin-left:21%; width:80px;">
  </div>



   <div class="messageActiv" style="">
    <div class="msgroom" id="msgroom" style="display:none;opacity:0;">
    <table class="tab12">
      <tr>
        <td>Personal Msg</td>
        <td>Groups Msg</td>
        <td>Clubs Msg</td>
      </tr>
    </table>
    <div class="msgoptions">
     <li>New message({$x['newMsg']})</li>
     <li>Unread message(s)</li>
     <li name="headerActivity" data-eventt="click" data-close="msgroom" data-module="message" data-action="messages" data-activity="list">Messages List</li>
     <div class="Create_n">
         <span>


          <table class="tab13">
            <tr>
              <td class="msgIcon" style="background-image: url('{$url}ic/talk-512.png');"></td>
              <td>Create</td>
            </tr>
          </table>

         </span>

     </div>
    </div>
    </div>

   </div>

  </div>
  </header>
END;
}

public static function CEO_HEADER($url)
{
  return <<<END
  <header>
  <div class="logo" style="background-image:url('{$url}ic/logo-mob.png');">

  </div>

  <div class="settings">
   <div class="set" style="background-image:url('{$url}ic/pages-4-512.png')">
     <div class="manger" onclick="sinecureApplication.$('manager').hideUnhide('block').styleArrow()">
       Ceo Manager

       <poinT id="poin2"></poinT>
     </div>
      <div class="managr-show" id="manager" data-arrow="poin2" style="display:none;opacity:0;">
        <li onclick="location.replace('{$url}sinecure/Users');">Users</li>
        <li>Clubs</li>
        <li>Houses</li>
       <li>More</li>
      </div>
   </div>

   <search>

  <input type="text" placeholder="Search..." name="" value="">

   </search>

   <div class="setRight" onclick="location.replace('{$url}logout');">
  LogOut
   </div>
  </div>
  </header>
  END;
}
}

 ?>
