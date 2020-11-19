<div class="rightOpt">






  <div class="table" id="rtable">

  <table id="tab2">
    <tr>
      <td class="img" style="background-image:url('<?=$url ?>img/house.png');" ></td>
      <td class="names" onclick="Open('home')" >Home</td>
      <td class="img" style="background-image:url('<?=$url ?>img/conference-512.png');" ></td>
      <td class="names" onclick="Open('show_asks','pag1');">Ask</td>
      <!-- <td class="img" style="background-image:url('img/edit-2-512.png');" ></td>
      <td class="names">Group</td> -->
      <td class="img" style="background-image:url('<?=$url ?>img/pages-4-512.png');" ></td>
      <td  class="names" onclick="Open('arti')">Articles</td>
      <td class="img" style="background-image:url('<?=$url ?>img/edit-2-512.png');" ></td>
      <td  class="names" onclick="Open('smt')">How to</td>
      <td>
        <style media="screen">
        .SearchER input{
          width: 90px;
          background-color: rgba(0, 0, 0, 0.5);

        }
        </style>
       <div class="SearchER">
         <table>
           <tr>
             <td><input type="text" style="background-color: rgba(0, 0, 0, 0.5);color:white;padding:3px;margin:0;" name="" class="sch" value="" placeholder="Search..." ></td>
             <td class="searLog" style="background-image:url('<?=$url ?>img/search-9-512.png');"></td>
           </tr>
         </table>
       </div>
      </td>
      <!-- <input type="text" name="" value="" placeholder="Search anything" >  -->

    </tr>
  </table>

  </div>










  <div class="contro">
  <table>
  <tr>
    <td class="full">For Full control</td>
    <td class="logIN_" > <a onclick="$(this).on();" data-elem="LoginCALLbACK">Sign in</a> </td>
    <td class="logIN_" > <a onclick="$(this).href();" data-location="login">Log in</a> </td>
  </tr>
  </table>


  <div class="LoginCALLbACK" style="display:none; opacity:0;">
  <div class="thC">
  <span onclick="$(this).on();" data-elem="LoginCALLbACK">X</span>
  </div>
  <h1>Welcome Back in HakrichApp</h1>
  <div class="temp">
  Sign in to create articles, answer questions, and Receive great articles in your inbox.
  </div>
  <div class="SigninWITs" >
  Sign in with Google
  </div>
  <div class="SigninWIT">
  Sign in
  </div>
  <div class="__h">
  No account? <a href="<?=$dirIs; ?>?signup">Create one</a>
  </div>
  <div class="log_">
  To make HakrichApp work we log user data and share it with service providers click
  "Sign in" above to accept HakrichApp's <a href="#">terms of service </a> & <a href="#">conditions</a>
  </div>

  </div>

  </div>




</div>
