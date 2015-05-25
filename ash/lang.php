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

// ASHKENAZIC
  // make the sum of all languages be visible in the function

   $all = $english+$german+$polish+$romanian+$russian+$hungarian+$spanish+$french+$cyrillic+$hebrew;
   $_GET['all'] = $all;

  // format of entries in $languageRules table is
  //    (pattern, language, acceptance)
  // where
  //    pattern is a regular expression
  //      e.g., ^ means start of word, $ means end of word, [^ei] means anything but e or i, etc.
  //    language is one or more of the languages defined above separated by + signs
  //    acceptance is true or false
  // meaning is:
  //    if "pattern" matches and acceptance is true, name is in one of the languages indicated and no others
  //    if "pattern" matches and acceptance is false, name is not in any of the languages indicated

  $languageRules = array(

// 1. following are rules to accept the language
// 1.1 Special letter combinations
    array('/zh/', $polish+$russian+$german+$english, true),
    array('/eau/', $french, true),
    array('/[aoeiuäöü]h/', $german, true),
    array('/^vogel/', $german, true),
    array('/vogel$/', $german, true),
    array('/witz/', $german, true),
    array('/tz$/', $german+$russian+$english, true),
    array('/^tz/', $russian+$english, true),
    array('/güe/', $spanish, true),
    array('/güi/', $spanish, true),
    array('/ghe/', $romanian, true),
    array('/ghi/', $romanian, true),
    array('/vici$/', $romanian, true),
    array('/schi$/', $romanian, true),
    array('/chsch/', $german, true),
    array('/tsch/', $german, true),
    array('/ssch/', $german, true),
    array('/sch$/', $german+$russian, true),
    array('/^sch/', $german+$russian, true),
    array('/^rz/', $polish, true),
    array('/rz$/', $polish+$german, true),
    array('/[^aoeiuäöü]rz/', $polish, true),
    array('/rz[^aoeiuäöü]/', $polish, true),
    array('/cki$/', $polish, true),
    array('/ska$/', $polish, true),
    array('/cka$/', $polish, true),
    array('/ue/', $german+$russian, true),
    array('/ae/', $german+$russian+$english, true),
    array('/oe/', $german+$french+$russian+$english, true),
    array('/th$/', $german, true),
    array('/^th/', $german, true),
    array('/th[^aoeiu]/', $german, true),
    array('/mann/', $german, true),
    array('/cz/', $polish, true),
    array('/cy/', $polish, true),
    array('/niew/', $polish, true),
    array('/stein/', $german, true),
    array('/heim$/', $german, true),
    array('/heimer$/', $german, true),
    array('/ii$/', $russian, true),
    array('/iy$/', $russian, true),
    array('/yy$/', $russian, true),
    array('/yi$/', $russian, true),
    array('/yj$/', $russian, true),
    array('/ij$/', $russian, true),
    array('/gaus$/', $russian, true),
    array('/gauz$/', $russian, true),
    array('/gauz$/', $russian, true),
    array('/goltz$/', $russian, true),
    array("/gol'tz$/", $russian, true), 
    array('/golts$/', $russian, true), 
    array("/gol'ts$/", $russian, true), 
    array('/^goltz/', $russian, true),
    array("/^gol'tz/", $russian, true), 
    array('/^golts/', $russian, true), 
    array("/^gol'ts/", $russian, true), 
    array('/gendler$/', $russian, true), 
    array('/gejmer$/', $russian, true), 
    array('/gejm$/', $russian, true), 
    array('/geimer$/', $russian, true), 
    array('/geim$/', $russian, true), 
    array('/geymer/', $russian, true), 
    array('/geym$/', $russian, true), 
    array('/gof$/', $russian, true), 
    array('/thal/', $german, true),
    array('/zweig/', $german, true),
    array('/ck$/', $german + $english, true),
    array('/c$/', $polish + $romanian + $hungarian, true),
    array('/sz/', $polish + $hungarian, true),
    array('/gue/', $spanish + $french, true),
    array('/gui/', $spanish + $french, true),
    array('/guy/', $french, true),
    array('/cs$/', $hungarian, true),
    array('/^cs/', $hungarian, true),
    array('/dzs/', $hungarian, true),
    array('/zs$/', $hungarian, true),
    array('/^zs/', $hungarian, true),
    array('/^wl/', $polish, true),
    array('/^wr/', $polish+$english+$german, true),

    array('/gy$/', $hungarian, true),
    array("/gy[aeou]/", $hungarian, true),
    array("/gy/", $hungarian + $russian, true),
    array("/ly/", $hungarian + $russian + $polish, true),
    array("/ny/", $hungarian + $russian + $polish, true),
    array("/ty/", $hungarian + $russian + $polish, true), 

// 1.2 special characters    
    array('/â/', $romanian + $french, true),
    array('/ă/', $romanian, true),
    array('/à/', $french, true),
    array('/ä/', $german, true),
    array('/á/', $hungarian + $spanish, true),
    array('/ą/', $polish, true),
    array('/ć/', $polish, true),
    array('/ç/', $french, true),
    array('/ę/', $polish, true),
    array('/é/', $french + $hungarian + $spanish, true),
    array('/è/', $french, true),
    array('/ê/', $french, true),
    array('/í/', $hungarian + $spanish, true),
    array('/î/', $romanian + $french, true),
    array('/ł/', $polish, true),
    array('/ń/', $polish, true),
    array('/ñ/', $spanish, true),
    array('/ó/', $polish + $hungarian + $spanish, true),
    array('/ö/', $german + $hungarian, true),
    array('/õ/', $hungarian, true),
    array('/ş/', $romanian, true),
    array('/ś/', $polish, true),
    array('/ţ/', $romanian, true),
    array('/ü/', $german + $hungarian, true),
    array('/ù/', $french, true),
    array('/ű/', $hungarian, true),
    array('/ú/', $hungarian + $spanish, true),
    array('/ź/', $polish, true),
    array('/ż/', $polish, true),
    
    array('/ß/', $german, true),

// Every Cyrillic word has at least one Cyrillic vowel (аёеоиуыэюя) 
    array('/а/', $cyrillic, true), 
    array('/ё/', $cyrillic, true), 
    array('/о/', $cyrillic, true), 
    array('/е/', $cyrillic, true), 
    array('/и/', $cyrillic, true), 
    array('/у/', $cyrillic, true), 
    array('/ы/', $cyrillic, true), 
    array('/э/', $cyrillic, true), 
    array('/ю/', $cyrillic, true), 
    array('/я/', $cyrillic, true), 
    
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
    array("/a/", $cyrillic + $hebrew, false), 
    array("/o/", $cyrillic + $hebrew, false), 
    array("/e/", $cyrillic + $hebrew, false), 
    array("/i/", $cyrillic + $hebrew, false), 
    array("/y/", $cyrillic + $hebrew + $romanian, false), 
    array("/u/", $cyrillic + $hebrew, false), 
  
    array("/v[^aoeiuäüö]/", $german, false), // in german, "v" can be found before a vowel only
    array("/y[^aoeiu]/", $german, false),  // in german, "y" usually appears only in the last position; sometimes before a vowel
    array("/c[^aohk]/", $german, false),
    array("/dzi/", $german+$english+$french, false),
    array("/ou/", $german, false),
    array("/aj/", $german + $english+$french, false),
    array("/ej/", $german + $english+$french, false),
    array("/oj/", $german + $english+$french, false),
    array("/uj/", $german + $english+$french, false),
    array("/k/", $romanian, false),
    array("/v/", $polish, false),
    array("/ky/", $polish, false),
    array("/eu/", $russian + $polish, false),
    array("/w/", $french + $romanian + $spanish + $hungarian + $russian, false),
    array("/kie/", $french + $spanish, false),
    array("/gie/", $french + $romanian + $spanish, false),
    array("/q/", $hungarian + $polish + $russian + $romanian, false),
    array('/sch/', $hungarian + $polish + $french + $spanish, false),
    array('/^h/', $russian, false)
    
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
