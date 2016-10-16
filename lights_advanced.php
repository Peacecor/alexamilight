<?php
//to keep it simple using require
$whichlight=$_GET["bulb"];
$onoff=$_GET["onoff"];
$colour=$_GET["colour"];
$brightness=$_GET["brightness"];

require 'Milight.php';
$milight = new Milight('<Your MiLight IP Address>'); /* This is the internal IP address for your MILight */


switch ($whichlight) {
  case "all" : {
    switch ($onoff) {
      case "1" : $milight->rgbwAllOn(); break;
      case "0" : $milight->rgbwAllOff(); break;
    }
  }
  case "1": {
    switch ($onoff) {
      case "1": {
        $milight->rgbwGroup1On(); $action=$action . "1 on,";
        $milight->setRgbwActiveGroup(1);
        if ($colour=="red") { $milight->rgbwSetColorToRed(); }
        if ($colour=="violet") { $milight->rgbwSetColorToViolet(); }
        if ($colour=="blue") { $milight->rgbwSetColorToRoyalBlue(); }
        if ($colour=="babyblue") { $milight->rgbwSetColorToBabyBlue();  }
        if ($colour=="aqua") { $milight->rgbwSetColorToAqua();  }
        if ($colour=="royalmint") { $milight->rgbwSetColorToRoyalMint(); }
        if ($colour=="seafoamgreen") { $milight->rgbwSetColorToSeafoamGreen(); }
        if ($colour=="green") { $milight->rgbwSetColorToGreen();  }
        if ($colour=="limegreen") { $milight->rgbwSetColorToLimeGreen();  }
        if ($colour=="yellow") { $milight->rgbwSetColorToYellow();  }
        if ($colour=="yelloworange") { $milight->rgbwSetColorToYellowOrange();  }
        if ($colour=="orange") { $milight->rgbwSetColorToOrange(); }
        if ($colour=="pink") { $milight->rgbwSetColorToPink();  }
        if ($colour=="fusia") { $milight->rgbwSetColorToFusia(); }
        if ($colour=="lilac") { $milight->rgbwSetColorToLilac();  }
        if ($colour=="lavendar") { $milight->rgbwSetColorToLavendar(); }
        if ($colour=="white") { $milight->rgbwGroup1SetToWhite(); }
        if (isset($_GET["brightness"])) { $milight->rgbwBrightnessPercent((int)$brightness);}
        break;
        }
      
    case "0": { $milight->rgbwGroup1Off(); $action=$action . "1 off,"; break; }
    } 
  }
   
  case "2": {
    switch ($onoff) {
      case "1": {
        $milight->rgbwGroup2On(); $action=$action . "Living Room on,";
        $milight->setRgbwActiveGroup(2);
        if ($colour=="red") { $milight->rgbwSetColorToRed(); }
        if ($colour=="violet") { $milight->rgbwSetColorToViolet(); }
        if ($colour=="blue") { $milight->rgbwSetColorToRoyalBlue(); }
        if ($colour=="babyblue") { $milight->rgbwSetColorToBabyBlue();  }
        if ($colour=="aqua") { $milight->rgbwSetColorToAqua();  }
        if ($colour=="royalmint") { $milight->rgbwSetColorToRoyalMint(); }
        if ($colour=="seafoamgreen") { $milight->rgbwSetColorToSeafoamGreen(); }
        if ($colour=="green") { $milight->rgbwSetColorToGreen();  }
        if ($colour=="limegreen") { $milight->rgbwSetColorToLimeGreen();  }
        if ($colour=="yellow") { $milight->rgbwSetColorToYellow();  }
        if ($colour=="yelloworange") { $milight->rgbwSetColorToYellowOrange();  }
        if ($colour=="orange") { $milight->rgbwSetColorToOrange(); }
        if ($colour=="pink") { $milight->rgbwSetColorToPink();  }
        if ($colour=="fusia") { $milight->rgbwSetColorToFusia(); }
        if ($colour=="lilac") { $milight->rgbwSetColorToLilac();  }
        if ($colour=="lavendar") { $milight->rgbwSetColorToLavendar(); }
        if ($colour=="white") { $milight->rgbwGroup2SetToWhite(); }
        if (isset($_GET["brightness"])) { $milight->rgbwBrightnessPercent((int)$brightness);}
        break;
      }
    case "0": { $milight->rgbwGroup2Off(); $action=$action . "Living Room off,"; break; }
    } 
  } 
  $action = $action . " " . $colour . " " . $brightness;
}
 

echo $action;
//$milight->rgbwAllOn();
