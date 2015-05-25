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

// GENERIC

  // make the sum of all languages be visible in the function

   $all = $english+$german+$polish+$romanian+$russian+$hungarian+$spanish+$french+$cyrillic+$hebrew+$portuguese+$italian+$dutch+$czech+$turkish+$greek+$greeklatin+$arabic;
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
    array('/^o’/', $english, true),
    array("/^o'/", $english, true),
    array('/^mc/', $english, true),
    array('/^fitz/', $english, true),
    array('/ceau/', $french+$romanian, true),
    array('/eau/', $romanian, true),
    array('/ault$/', $french, true),
    array('/oult$/', $french, true),
    array('/eux$/', $french, true),
    array('/eix$/', $french, true),
    array('/glou$/', $greeklatin, true),
    array('/uu/', $dutch, true),
    array('/tx/', $spanish, true),
    array('/witz/', $german, true),
    array('/tz$/', $german+$russian+$english, true),
    array('/^tz/', $russian+$english, true),
    array('/poulos$/', $greeklatin, true),
    array('/pulos$/', $greeklatin, true),
    array('/iou/', $greeklatin, true),
    array('/sj$/', $dutch, true),
    array('/^sj/', $dutch, true),
    array('/güe/', $spanish, true),
    array('/güi/', $spanish, true),
    array('/ghe/', $romanian + $greeklatin, true),
    array('/ghi/', $romanian + $greeklatin, true),
    array('/escu$/', $romanian, true),
    array('/esco$/', $romanian, true),
    array('/vici$/', $romanian, true),
    array('/schi$/', $romanian, true),
    array('/ii$/', $russian, true),
    array('/iy$/', $russian, true),
    array('/yy$/', $russian, true),
    array('/yi$/', $russian, true),
    array('/^rz/', $polish, true),
    array('/rz$/', $polish+$german, true),
    array("/[bcdfgklmnpstwz]rz/", $polish, true),
    array('/rz[bcdfghklmnpstw]/', $polish, true),
    array('/cki$/', $polish, true),
    array('/ska$/', $polish, true),
    array('/cka$/', $polish, true),
    array('/ae/', $german+$russian+$english, true),
    array('/oe/', $german+$french+$russian+$english+$dutch, true),
    array('/th$/', $german+$english, true),
    array('/^th/', $german+$english+$greeklatin, true),
    array('/mann/', $german, true),
    array('/cz/', $polish, true),
    array('/cy/', $polish+$greeklatin, true),
    array('/niew/', $polish, true),
    array('/etti$/', $italian, true),
    array('/eti$/', $italian, true),
    array('/ati$/', $italian, true),
    array('/ato$/', $italian, true),
    array('/[aoei]no$/', $italian, true),
    array('/[aoei]ni$/', $italian, true),
    array('/esi$/', $italian, true),
    array('/oli$/', $italian, true),
    array('/field$/', $english, true),
    array('/stein/', $german, true),
    array('/heim$/', $german, true),
    array('/heimer$/', $german, true),
    array('/thal/', $german, true),
    array('/zweig/', $german, true),
    array("/[aeou]h/", $german, true),
    array("/äh/", $german, true),
    array("/öh/", $german, true),
    array("/üh/", $german, true),
    array("/[ln]h[ao]$/", $portuguese, true),
    array("/[ln]h[aou]/", $portuguese+$french+$german+$dutch+$czech+$spanish+$turkish, true),
    array('/chsch/', $german, true),
    array('/tsch/', $german, true),
    array('/sch$/', $german+$russian, true),
    array('/^sch/', $german+$russian, true),
    array('/ck$/', $german + $english, true),
    array('/c$/', $polish + $romanian + $hungarian + $czech + $turkish, true),
    array('/sz/', $polish + $hungarian, true),
    array('/cs$/', $hungarian, true),
    array('/^cs/', $hungarian, true),
    array('/dzs/', $hungarian, true),
    array('/zs$/', $hungarian, true),
    array('/^zs/', $hungarian, true),
    array("/^wl/", $polish, true),
    array("/^wr/", $polish+$english+$german+$dutch, true),

    array("/gy$/", $hungarian, true),
    array("/gy[aeou]/", $hungarian, true),
    array("/gy/", $hungarian + $russian + $french+$greeklatin, true),
    array("/guy/", $french, true),
    array('/gu[ei]/', $spanish + $french + $portuguese, true),
    array('/gu[ao]/', $spanish + $portuguese, true),
    array('/gi[aou]/', $italian + $greeklatin, true),
        
    array("/ly/", $hungarian + $russian + $polish + $greeklatin, true),
    array("/ny/", $hungarian + $russian + $polish + $spanish + $greeklatin, true),
    array("/ty/", $hungarian + $russian + $polish + $greeklatin, true), 

// 1.2 special characters    
    array('/ć/', $polish, true),
    array('/ç/', $french + $spanish + $portuguese + $turkish, true),
    array('/č/', $czech, true),
    array('/ď/', $czech, true),
    array('/ğ/', $turkish, true),
    array('/ł/', $polish, true),
    array('/ń/', $polish, true),
    array('/ñ/', $spanish, true),
    array('/ň/', $czech, true),
    array('/ř/', $czech, true),
    array('/ś/', $polish, true),
    array('/ş/', $romanian + $turkish, true),
    array('/š/', $czech, true),
    array('/ţ/', $romanian, true),
    array('/ť/', $czech, true),
    array('/ź/', $polish, true),
    array('/ż/', $polish, true),
        
    array('/ß/', $german, true),

    array('/ä/', $german, true),
    array('/á/', $hungarian + $spanish + $portuguese + $czech + $greeklatin, true),
    array('/â/', $romanian + $french +$portuguese, true),
    array('/ă/', $romanian, true),
    array('/ą/', $polish, true),
    array('/à/', $portuguese, true),
    array('/ã/', $portuguese, true),
    array('/ę/', $polish, true),
    array('/é/', $french + $hungarian + $czech + $greeklatin, true),
    array('/è/', $french + $spanish + $italian, true),
    array('/ê/', $french, true),
    array('/ě/', $czech, true),
    array('/ê/', $french + $portuguese, true),
    array('/í/', $hungarian + $spanish + $portuguese + $czech + $greeklatin, true),
    array('/î/', $romanian + $french, true),
    array('/ı/', $turkish, true),
    array('/ó/', $polish + $hungarian + $spanish + $italian + $portuguese +$czech + $greeklatin, true),
    array('/ö/', $german + $hungarian + $turkish, true),
    array('/ô/', $french + $portuguese, true),
    array('/õ/', $portuguese + $hungarian, true),
    array('/ò/', $italian + $spanish, true),
    array('/ű/', $hungarian, true),
    array('/ú/', $hungarian + $spanish + $portuguese + $czech + $greeklatin, true),
    array('/ü/', $german + $hungarian + $spanish + $portuguese + $turkish, true),
    array('/ù/', $french, true),
    array('/ů/', $czech, true),
    array('/ý/', $czech + $greeklatin, true),
   
// Every Cyrillic word has at least one Cyrillic vowel (аёеоиуыэюя) 
    array("/а/", $cyrillic, true), 
    array("/ё/", $cyrillic, true), 
    array("/о/", $cyrillic, true), 
    array("/е/", $cyrillic, true), 
    array("/и/", $cyrillic, true), 
    array("/у/", $cyrillic, true), 
    array("/ы/", $cyrillic, true), 
    array("/э/", $cyrillic, true), 
    array("/ю/", $cyrillic, true), 
    array("/я/", $cyrillic, true), 
 
 // Every Greek word has at least one Greek vowel
    array("/α/", $greek, true), 
    array("/ε/", $greek, true), 
    array("/η/", $greek, true), 
    array("/ι/", $greek, true), 
    array("/ο/", $greek, true), 
    array("/υ/", $greek, true), 
    array("/ω/", $greek, true), 

  // Arabic (only initial)
    array("/ا/", $arabic, true), // alif (isol + init)   
    array("/ب/", $arabic, true), // ba' 
    array("/ت/", $arabic, true), // ta' 
    array("/ث/", $arabic, true), // tha'
    array("/ج/", $arabic, true), // jim
    array("/ح/", $arabic, true), // h.a' 
    array("/خ'/", $arabic, true), // kha' 
    array("/د/", $arabic, true), // dal (isol + init)
    array("/ذ/", $arabic, true), // dhal (isol + init)
    array("/ر/", $arabic, true), // ra' (isol + init)
    array("/ز/", $arabic, true), // za' (isol + init)
    array("/س/", $arabic, true), // sin 
    array("/ش/", $arabic, true), // shin 
    array("/ص/", $arabic, true), // s.ad 
    array("/ض/", $arabic, true), // d.ad 
    array("/ط/", $arabic, true), // t.a' 
    array("/ظ/", $arabic, true), // z.a' 
    array("/ع/", $arabic, true), // 'ayn
    array("/غ/", $arabic, true), // ghayn 
    array("/ف/", $arabic, true), // fa' 
    array("/ق/", $arabic, true), // qaf 
    array("/ك/", $arabic, true), // kaf  
    array("/ل/", $arabic, true), // lam 
    array("/م/", $arabic, true), // mim 
    array("/ن/", $arabic, true), // nun 
    array("/ه/", $arabic, true), // ha' 
    array("/و/", $arabic, true), // waw (isol + init)
    array("/ي/", $arabic, true), // ya' 
    
    array("/آ/", $arabic, true), // alif madda  
    array("/إ/", $arabic, true), // alif + diacritic  
    array("/أ/", $arabic, true), // alif + hamza
    array("/ؤ/", $arabic, true), //  waw + hamza
    array("/ئ/", $arabic, true), //  ya' + hamza
//    array("/لا/‎", $arabic, true), // ligature l+a
                
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
    array("/a/", $cyrillic + $hebrew + $greek + $arabic, false), 
    array("/o/", $cyrillic + $hebrew + $greek + $arabic, false), 
    array("/e/", $cyrillic + $hebrew + $greek + $arabic, false), 
    array("/i/", $cyrillic + $hebrew + $greek + $arabic, false), 
    array("/y/", $cyrillic + $hebrew + $greek  + $arabic + $romanian + $dutch, false), 
    array("/u/", $cyrillic + $hebrew + $greek + $arabic, false), 
  
    array("/j/", $italian, false),
    array("/j[^aoeiuy]/", $french+$spanish+$portuguese+$greeklatin, false), 
    array("/g/", $czech, false),
    array("/k/", $romanian + $spanish + $portuguese + $french + $italian, false),
    array("/q/", $hungarian + $polish + $russian + $romanian + $czech + $dutch + $turkish + $greeklatin, false),
    array("/v/", $polish, false),
    array("/w/", $french + $romanian + $spanish + $hungarian + $russian + $czech + $turkish + $greeklatin, false),
    array("/x/", $czech + $hungarian + $dutch + $turkish, false), // polish excluded from the list
    
    array("/dj/", $spanish + $turkish, false),
    array("/v[^aoeiu]/", $german, false), // in german, "v" can be found before a vowel only
    array("/y[^aoeiu]/", $german, false),  // in german, "y" usually appears only in the last position; sometimes before a vowel
    array("/c[^aohk]/", $german, false),
    array("/dzi/", $german + $english + $french + $turkish, false),
    array("/ou/", $german, false),
    array("/a[eiou]/", $turkish, false), // no diphthongs in Turkish
    array("/ö[eaiou]/", $turkish, false), 
    array("/ü[eaiou]/", $turkish, false), 
    array("/e[aiou]/", $turkish, false), 
    array("/i[aeou]/", $turkish, false), 
    array("/o[aieu]/", $turkish, false), 
    array("/u[aieo]/", $turkish, false), 
    array("/aj/", $german + $english + $french + $dutch, false),
    array("/ej/", $german + $english + $french + $dutch, false),
    array("/oj/", $german + $english + $french + $dutch, false),
    array("/uj/", $german + $english + $french + $dutch, false),
    array("/eu/", $russian + $polish, false),
    array("/ky/", $polish, false),
    array("/kie/", $french + $spanish + $greeklatin, false),
    array("/gie/", $portuguese + $romanian + $spanish + $greeklatin, false),
    array("/ch[aou]/", $italian, false),
    array("/ch/", $turkish, false),
    array("/son$/", $german, false),
    array('/sc[ei]/', $french, false),
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
//echo "testing name=$name letters=$letters languages=$languages accept=$accept<br>";
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
