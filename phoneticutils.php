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

  function MyGet($arg) { // to avoid index errors in jewishgen error log file
    $rv = "";
    if (array_key_exists($arg, $_GET)) {
      $rv = $_GET[$arg];
    }
    return $rv;
  }

  $type = MyGet('type'); // ash, sep, or gen
  if ($type == "") {
    $type = "gen"; // generic
  }
  include ("$type/languagenames.php");
/*
  $languages = array
    ("any", "cyrillic", "english", "french", "german", "germandjsg", "hebrew",
     "hungarian", "polish", "polishdjskp", "romanian", "russian", "russiandjsre", "spanish");
*/
  for ($i=0; $i<count($languages); $i++) {
    $language = $languages[$i];
    $command = "$" . "$language = LanguageCode('$language', " . "$" . "languages);";
    eval ($command);
    // generate things like
    //  $cyrillic = LanguageCode('cyrillic', $languages);
  }

/*
  $cyrillic = LanguageCode("cyrillic", $languages);
  $english = LanguageCode("english", $languages);
  $french = LanguageCode("french", $languages);
  $german = LanguageCode("german", $languages);
  $hebrew = LanguageCode("hebrew", $languages);
  $hungarian = LanguageCode("hungarian", $languages);
  $polish = LanguageCode("polish", $languages);
  $romanian = LanguageCode("romanian", $languages);
  $russian = LanguageCode("russian", $languages);
  $spanish = LanguageCode("spanish", $languages);
*/

  $rules = array();
  $approx = array();
  $exact = array();

  function LanguageIndex($langName, $languages) {
    for ($i=0; $i<count($languages); $i++) {
      if ($languages[$i] == $langName) {
        return $i;
      }
    }
    return 0; // name not found
  }

  function LanguageName($index, $languages) {
    if ($index < 0 || $index > count($languages)) {
      return "any"; // index out of range
    }
    return $languages[$index];
  }

  function LanguageCode($langName, $languages) {
    return pow(2, LanguageIndex($langName, $languages));
  }

  function LanguageIndexFromCode($code, $languages) {
    if ($code < 0 || $code > pow(2, count($languages)-1)) { // code out of range
      return 0;
    }
    $log = log($code, 2);
    $result = floor($log);
    if ($result != $log) { // choice was more than one language, so use "any"
      $result = LanguageIndex("any", $languages);
    }
    return $result;
  }
?>
