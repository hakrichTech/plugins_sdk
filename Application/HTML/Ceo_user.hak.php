<?php
namespace HTML;
/**
 *
 */
 use Library\Details as Det;

class Ceo_user
{
public static function USER(Det\UserDetails $x, $url=" ")
{
  return <<<END
  <tr>
    <td>{$x::ID_COLUMN()}</td>
    <td>{$x::CODE()}</td>
    <td>{$x::USERNAME()}</td>
    <td>{$x::MAIL()}</td>
    <td> <dlete onclick="location.replace('{$url}sinecure/user/?q={$x::USERNAME('u')}_{$x::CODE()}')">View</dlete> <dlete>Delete</dlete> </td>
  </tr>
  END;
}

public static function POST($x, $url=" ")
{
  $img="";
  switch ($x['nb']||$x['typ']) {
    case 'i':
      $img=$url."Pictures/Pietoiz/".$x['files'][0];
      break;
    case 'p':
      $img=$url."Pictures/Thumbnails/".$x['typ'];
      break;
    case 'a':
     $img=$url."Pictures/Thumbnails/".$x['typ'];
      break;
    case 'v':
      $img=$url."Pictures/Thumbnails/".$x['typ'];
      break;
    default:
    $img="";
      break;
  }

  return <<<END
  <div class="Post">
  <div class="contents" >
  <img src="{$img}" alt="">
  <div class="textContent">
  <p>{$x['plavia']}</p>
  </div></div>
  <div class="someInfo">
  <amt> Date: {$x['derh']}</amt>
  <amt> Report:</amt>
  </div>
  </div>

  END;
}

public static function Photos($x, $z, $y, $url=" ")
{
  $im="";
  switch ($z) {
    case 'post':
      switch ($x) {
        case 'audio':
        $im=$url."ic/audio.jpg";
          break;

          case 'video':
          $im=$url."ic/vid.png";
            break;

        default:
        $im=$url."Pictures/Pietoiz/".$x;
          break;
      }
      break;
    case 'club':
    switch ($x) {
      case 'audio':
      $im=$url."ic/audio.jpg";
        break;
        case 'video':
        $im=$url."ic/vid.png";
          break;

      default:
      $im=$url."Pictures/Pietoiz/".$x;
        break;
       }
      break;
    case 'house':
    switch ($x) {
      case 'audio':
      $im=$url."ic/audio.jpg";
        break;
        case 'video':
        $im=$url."ic/vid.png";
          break;

      default:
      $im=$url."Pictures/Pietoiz/".$x;
        break;
       }
       break;

      case 'profile':
        $im=$url."Pictures/Profiles/".$x;
        break;
        case 'cover':
          $im=$url."Pictures/Profiles/".$x;
          break;
  }
 $d=UCfirst($z)." Albums";
  return <<<END
  <div class="album">
    <div class="Profiles" onclick="location.replace('{$url}sinecure/{$z}albums/?q={$y}');">
     <img src="{$im}" alt="">
    </div>
    <div class="albumNAME">
      <span style="background-image:url('{$url}ic/folder-2-512.png')"></span>{$d}
    </div>
  </div>
  END;
}

public static function PHOTOS_($x, $url=" ")
{
  return <<<END
   <div class="picTure">
   <img src="{$url}Pictures/Pietoiz/{$x}" alt="">
   </div>
  END;
}

}
 ?>
