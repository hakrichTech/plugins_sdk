<?php
namespace HTML;
/**
 *
 */
class Message
{
public static function Citerion($x, $url= "")
{
  return <<<END
  <div class="ChtM" onclick="sinecureApplication.$(this).cliqss()" data-view="messageGround" data-user="{$x[1]::ID()}">
    <div class="ProTML">
    <img src="{$url}Pictures/Profiles/{$x[1]::PROFILE()}" alt="">

    </div>
    <span class="orthMSname">
   <div class="UsrNAMe">
     {$x[1]::USERNAME()}
   </div>
   <div class="SOMEmsg">
     {$x[0]}
   </div>
    </span>

  </div>
END;
}

public function msgRight(array $x)
{
  $img="";
  if ($x['typ']=="i") {
   $img=<<<END
   <div class="iIIII"><img src="Pictures/SMS/Min/{$x['files']}"></div>
END;
  }
  return <<<END
          <div class="MSGEst1">

              <div class="msG2">
                <div class="Pnt1"></div>
              {$img}
              <msgr>
                {$x['finement']}
                </msgr></div>
          </div>
END;
}

public static function msgLeft($x)
{
  $img="";
  if ($x['typ']=="i") {
   $img=<<<END
   <div class="iIIII"><img src="Pictures/SMS/Min/{$x['files']}"></div>
END;
  }
  return <<<END
  <div class="MSGEst">
    <div class="msG1">
      <div class="Pnt"></div>
      <mssage>
      {$img}
      {$x['finement']}
    </mssage>

    </div>
  </div>


END;
}



}
 ?>
