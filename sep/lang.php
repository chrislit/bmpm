<?php

  /*
   *
   * Copyright Alexander Beider and Stephen P. Morse, 2008
   *
   * This file is part of the Beider-Morse Phonetic Matching (BMPM) System. 

   * BMPM is free software: you can redistribute it and/or modify
   * it under the terms of the GNU General Public License as published by
   * the Free Software Foundation, either version 3 of the License, or
   * (at your option) any later version.
   *
   * BMPM is distributed in the hope that it will be useful,
   * but WITHOUT ANY WARRANTY; without even the implied warranty of
   * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   * GNU General Public License for more details.
   *
   * You should have received a copy of the GNU General Public License
   * along with BMPM.  If not, see <http://www.gnu.org/licenses/>.
   *
   */

// SEPHARDIC
  // make the sum of all languages be visible in the function

   $all = $italian+$spanish+$french+$portuguese+$hebrew;
   $_GET['all'] = $all;

   $languageRules = array(

// 1. following are rules to accept the language
// 1.1 Special letter combinations
    array('/eau/', $french, true),
    array('/ou/', $french, true),
    array('/gni/', $italian+$french, true),
    array('/tx/', $spanish, true),
    array('/tj/', $spanish, true),
    array('/gy/', $french, true),
    array('/guy/', $french, true),

    array("/sh/", $spanish+$portuguese, true), // English, but no sign for /sh/ in these languages

    array('/lh/', $portuguese, true),
    array('/nh/', $portuguese, true),
    array('/ny/', $spanish, true),

    array('/gue/', $spanish + $french, true),
    array('/gui/', $spanish + $french, true),
    array('/gia/', $italian, true),
    array('/gie/', $italian, true),
    array('/gio/', $italian, true),
    array('/giu/', $italian, true),
            
// 1.2 special characters    
    array('/ñ/', $spanish, true),
    array('/â/', $portuguese + $french, true),
    array('/á/', $portuguese + $spanish, true),
    array('/à/', $portuguese, true),
    array('/ã/', $portuguese, true),
    array('/ê/', $french + $portuguese, true),
    array('/í/', $portuguese + $spanish, true),
    array('/î/', $french, true),
    array('/ô/', $french + $portuguese, true),
    array('/õ/', $portuguese, true),
    array('/ò/', $italian + $spanish, true),
    array('/ú/', $portuguese + $spanish, true),
    array('/ù/', $french, true),
    array('/ü/', $portuguese + $spanish, true),
      
  // Hebrew 
    array("/א/", $hebrew, true),
    array("/ב/", $hebrew, true),
    array("/ג/", $hebrew, true),
    array("/ד/", $hebrew, true),
    array("/ה/", $hebrew, true),
    array("/ו/", $hebrew, true),
    array("/ז/", $hebrew, true),
    array("/ח/", $hebrew, true),
    array("/ט/", $hebrew, true),
    array("/י/", $hebrew, true),
    array("/כ/", $hebrew, true),
    array("/ל/", $hebrew, true),
    array("/מ/", $hebrew, true),
    array("/נ/", $hebrew, true),
    array("/ס/", $hebrew, true),
    array("/ע/", $hebrew, true),
    array("/פ/", $hebrew, true),
    array("/צ/", $hebrew, true), 
    array("/ק/", $hebrew, true),
    array("/ר/", $hebrew, true),
    array("/ש/", $hebrew, true),
    array("/ת/", $hebrew, true),
        
    // 2. following are rules to reject the language
    
    // Every Latin character word has at least one Latin vowel  
    array("/a/", $hebrew, false), 
    array("/o/", $hebrew, false), 
    array("/e/", $hebrew, false), 
    array("/i/",  $hebrew, false), 
    array("/y/", $hebrew, false), 
    array("/u/", $hebrew, false), 
      
    array("/kh/", $spanish, false),
    array("/gua/", $italian, false),
    array("/guo/", $italian, false),
    array("/ç/", $italian, false),
    array("/cha/", $italian, false),
    array("/cho/", $italian, false),
    array("/chu/", $italian, false),
    array("/j/", $italian, false),
    array("/dj/", $spanish, false),
    array('/sce/', $french, false),
    array('/sci/', $french, false),
    array('/ó/', $french, false),
    array('/è/', $portuguese, false)
        
            );

  function Language($name, $rules) {
    // convert $name to utf8
    $name = utf8_encode($name); // takes care of things in the upper half of the ascii chart, e.g., u-umlaut
    if (strpos($name, "&") !== false) { // takes care of ampersand-notation encoding of unicode (&#...;)
      $name = html_entity_decode($name, ENT_NOQUOTES, "UTF-8");
    }
    return Language_UTF8($name, $rules);
  }

  function Language_UTF8($name, $rules) {
//    $name = mb_strtolower($name, mb_detect_encoding($name));
    $name = mb_strtolower($name, "UTF-8");
    $all = $_GET['all'];
    $choicesRemaining = $all;
    for ($i=0; $i<count($rules); $i++) {
      list($letters, $languages, $accept) = $rules[$i];
//echo "testing letters=$letters languages=$languages accept=$accept<br>";
      if (preg_match($letters, $name)) {
        if ($accept) {
          $choicesRemaining &= $languages;
        } else { // reject
          $choicesRemaining &= (~$languages) % ($all+1);
        }
      }
    }
    if ($choicesRemaining == 0) {
      $choicesRemaining = 1;
    }
    return $choicesRemaining;
  }

?> 
