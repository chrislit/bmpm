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

  set_time_limit(0);

  function Get($arg) { // to avoid index errors in jewishgen error log file
    $rv = "";
    if (array_key_exists($arg, $_GET)) {
      $rv = $_GET[$arg];
    }
    return $rv;
  }

   // 1 is language code for any
  function Phonetic($input, $rules, $finalRules1, $finalRules2, $languageArg="1", $concat=false) {

    // convert $input to utf8
    $input = utf8_encode($input); // takes care of things in the upper half of the ascii chart, e.g., u-umlaut
    if (strpos($input, "&") !== false) { // takes care of ampersand-notation encoding of unicode (&#...;)
      $input = html_entity_decode($input, ENT_NOQUOTES, "UTF-8");
    }
    return Phonetic_UTF8($input, $rules, $finalRules1, $finalRules2, $languageArg, $concat);
  }

  function RedoLanguage($input, $rules, $finalRules1, $finalRules2, $concat) {
    // we can do a better job of determining the language now that multiple names have been split
    global $languageRules;
    $languageArg = Language($input, $languageRules);
    return Phonetic_UTF8($input, $rules, $finalRules1, $finalRules2, $languageArg, $concat);
  }

  function Phonetic_UTF8($input, $rules, $finalRules1, $finalRules2, $languageArg="", $concat=false) {
    $debug = false; // for running on jewishgen server
$debug = Get('debug'); // for running on my server

if ($debug) echo "<hr>";
    $input = trim($input); // remove any leading or trailing white space
    $input = mb_strtolower($input, mb_detect_encoding($input));
//    $input = mb_strtolower($input, "UTF-8");

    $input = str_replace("-", " ", $input); // treat dash as if it were a space
    $input = trim($input); // remove any leading spaces introduced by above replacement of dashes to spaces

/*
echo "$input<br>";
echo "[";
for ($i=0; $i<strlen($input); $i++) {
  echo dechex(ord(substr($input, $i, 1)))." ";
}
echo "]<br>";
*/

    // determine type (ashkenazic, sephardic, generic

    $ash = false; // ashkenazic
    $sep = false; // sephardic
    $type = Get('type');
    if ($type == "ash") {
      $ash = true; // ashkenazic
    } else if ($type == "sep") {
      $sep = true; // sephardic
    }

    if (!$ash && !$sep) {
      // both discard and concatenate certain words if at the start of the name

      $list = array("da", "dal", "de", "del", "dela", "de la", "della", "des", "di", "do", "dos", "du", "van", "von");
      for ($j=0; $j<count($list); $j++) { // discard certain words at start of the name, including d'
        $prefix = $list[$j] . " ";
        $prefixLength = strlen($prefix);
        if (substr($input, 0, $prefixLength) == $prefix) { // check for words from list
          $remainder = substr($input, $prefixLength);
          $combined = $list[$j] . $remainder;
          $result =
            RedoLanguage($remainder, $rules, $finalRules1, $finalRules2, $concat) .
            "-" .
            RedoLanguage($combined, $rules, $finalRules1, $finalRules2, $concat);
          return $result;
        } else if (substr($input, 0, 2) == "d'") { // check for d'
          $remainder = substr($input, 2);
          $combined = "d" . $remainder;
          $result =
            RedoLanguage($remainder, $rules, $finalRules1, $finalRules2, $concat) .
            "-" .
            RedoLanguage($combined, $rules, $finalRules1, $finalRules2, $concat);
          return $result;
        }
      }
    }

    $words = explode(" ", $input); // create array of the individual words in the name
    $words2 = array();

    if ($sep) { // sephardic

      // for each word in the name, delete portions of word preceding apostrophe
      // ex: d'avila d'aguilar --> avila aguilar
      // also discard certain words in the name

      $list = array(
        "al", "el", "da", "dal", "de", "del", "dela", "de la",
        "della", "des", "di", "do", "dos", "du", "van", "von");

      // note that we can never get a match on "de la" because we are checking single words below
      // this is a bug, but I won't try to fix it now

      for ($i=0; $i<count($words); $i++) { // process each word in the name
        $parts = explode("'", $words[$i]); // create array of each part between apostrophes
        $word = $parts[count($parts)-1]; // take the last part only
        $inlist = false;
        for ($j=0; $j<count($list); $j++) { // discard certain words in the name
          if ($word == $list[$j]) {
            $inlist = true;
            break;
          }
        }
        if (!$inlist) {
          // discard certain words
          $words2[count($words2)] = $word;
        }
      }

    } else if ($ash) { // ashkenazic

      // discard certain words if at the start of the name

      $list = array("bar", "ben", "da", "de", "van", "von");

      for ($i=0; $i<count($words); $i++) { // process each word in the name
        $word = $words[$i];
        $inlist = false;
        if ($i==0 && count($words) > 1) { // at first word of a multi-word name
          for ($j=0; $j<count($list); $j++) { // discard certain words in the name
            if ($word == $list[$j]) {
              $inlist = true;
              break;
            }
          }
        }
        if (!$inlist) {
          $words2[count($words2)] = $word;
        }
      }

    } else { // general
      $words2 = $words;
    }

    if ($concat) { // concatenate the separate words of a multi-word name (normally used for exact matches)
      $input = implode(" ", $words2);
    } else if (count($words2) == 1) { // not a multi-word name
      $input = $words2[0];
    } else { // encode each word in a multi-word name separately (normally used for approx matches)
      $result = "";
      for ($i=0; $i<count($words2); $i++) {
        $word = $words2[$i];
        $result .= "-" . RedoLanguage($word, $rules, $finalRules1, $finalRules2, $concat);
      }
      return substr($result, 1); // strip off the leading dash
    }

//    $input = preg_replace("/[^a-z]/i", "", $input); // remove all but letters -- ng, will remove diacriticals

    $inputLength = strlen($input);

    // format of $rules array

    $patternPos = 0;
    $lcontextPos = 1;
    $rcontextPos = 2;
    $phoneticPos = 3;
    $languagePos = 4;
    $logicalPos = 5;

    // apply language rules to map to phonetic alphabet

    $fileName = ""; // will be used when debugging
    if (count($rules[count($rules)-1]) == 1) { // last item is name of the file
      $fileName = array_pop($rules);
      $fileName = $fileName[0];
    }

if ($debug) {
  echo "applying language rules from ($fileName) to <b>$input</b> using languages $languageArg<br><br>";
  echo "char codes =";
  for ($i=0; $i<strlen($input); $i++) {
    if (ord($input[$i]) < 128+64) { // 1-byte character
      echo " [#" .
           dechex(ord($input[$i])) .
           "]" . $input[$i];
    } else if (ord($input[$i]) < 128+64+32) { // 2-byte character
      echo " [#" .
           dechex(ord($input[$i])) . dechex(ord($input[$i+1])) .
           "]" . substr($input, $i, 2);
      $i++;
    } else if (ord($input[$i]) < 128+64+32+16) { // 3-byte character
      echo " [#" .
           dechex(ord($input[$i])) . dechex(ord($input[$i+1])) . dechex(ord($input[$i+2])) .
           "]" . substr($input, $i, 3);
      $i += 2;
    } else if (ord($input[$i]) < 128+64+32+16+8) { // 4-byte character
      echo " [#" .
           dechex(ord($input[$i])) . dechex(ord($input[$i+1])) . dechex(ord($input[$i+2])) . dechex(ord($input[$i+3])) .
           "]" . substr($input, $i, 4);
      $i += 3;
    } else if (ord($input[$i]) < 128+64+32+16+8) { // 5-byte character
      echo " [#" .
           dechex(ord($input[$i])) . dechex(ord($input[$i+1])) . dechex(ord($input[$i+2])) . dechex(ord($input[$i+3])) . dechex(ord($input[$i+4])) .
           "]" . substr($input, $i, 5);
      $i += 4;
    } else if (ord($input[$i]) < 128+64+32+16+8+4) { // 6-byte character
      echo " [#" .
           dechex(ord($input[$i])) . dechex(ord($input[$i+1])) . dechex(ord($input[$i+2])) . dechex(ord($input[$i+3])) . dechex(ord($input[$i+4])) . dechex(ord($input[$i+5])) .
           "]" . substr($input, $i, 5);
      $i += 5;
    }
  }
  echo "<br><br>";
}
    $phonetic = "";
    for ($i=0; $i<$inputLength;) {
      $found = false;
      for ($r=0; $r<count($rules); $r++) {
        $rule = $rules[$r];
        $pattern = $rule[$patternPos];
        $patternLength = strlen($pattern);
        $lcontext = $rule[$lcontextPos];
        $rcontext = $rule[$rcontextPos];

        // check to see if next sequence in input matches the string in the rule
        if ($patternLength > $inputLength-$i || substr($input, $i, $patternLength) != $pattern) { // no match
          continue;
        }

        $right = "/^$rcontext/";
        $left = "/$lcontext" . '$' . "/";

        // check that right context is satisfied
        if ($rcontext != "") {
          if (!preg_match($right, substr($input, $i+$patternLength))) {
            continue;
          }
        }

        // check that left context is satisfied
        if ($lcontext != "") {
          if (!preg_match($left, substr($input, 0, $i))) {
            continue;
          }
        }

        // check to see if languageArg is one of the allowable ones (used only with "any" rules)
        if (($languageArg != "1") && ($languagePos < count($rule))) {
          $language = $rule[$languagePos]; // the required language(s) for this rule to apply
          $logical = $rule[$logicalPos]; // do we require ALL or ANY of the required languages
          if ($logical == "ALL") {
            // check to see if languageArg contains all the required languages
            if (($languageArg & $language) != $language) {
              continue;
            }
          } else { // any
            // check to see if languageArg contains at least one required language
            if (($languageArg & $language) == 0) {
              continue;
            }
          }
        }

        // check for incompatible attributes

        $candidate = ApplyRuleIfCompatible($phonetic, $rule[$phoneticPos], $languageArg);
        if ($candidate === false) {
//if ($debug) echo "rejecting rule #$r because of incompatible attributes<br>";
if ($debug) echo "rejecting rule #$r because of incompatible attributes<br>" .
                 "&nbsp;&nbsp;&nbsp;pattern=$pattern<br>" .
                 "&nbsp;&nbsp;&nbsp;lcontext=$lcontext<br>".
                 "&nbsp;&nbsp;&nbsp;rcontext=$rcontext<br>".
                 "&nbsp;&nbsp;&nbsp;subst=".$rule[$phoneticPos]."<br>".
                 "&nbsp;&nbsp;&nbsp;result=$phonetic<br><br>";
          continue;
        }
        $phonetic = $candidate;
if ($debug) echo "applying rule #$r<br>" .
                 "&nbsp;&nbsp;&nbsp;pattern=$pattern<br>" .
                 "&nbsp;&nbsp;&nbsp;lcontext=$lcontext<br>".
                 "&nbsp;&nbsp;&nbsp;rcontext=$rcontext<br>".
                 "&nbsp;&nbsp;&nbsp;subst=".$rule[$phoneticPos]."<br>".
                 "&nbsp;&nbsp;&nbsp;result=$phonetic<br><br>";
        $found = true;
        break;
      }
      if (!$found) { // character in name that is not in table -- e.g., space
if ($debug) echo "<b>not found</b>: " . substr($input, $i, 1) . "<br><br>";
        $patternLength = 1;
      }
      $i += $patternLength;
    }
if ($debug) echo "after language rules: <b>$phonetic</b><br><br>";

    // apply final rules on phonetic-alphabet, doing a substitution of certain characters
    // finalRules1 are the common approx rules, finalRules2 are approx rules for specific language

    $phonetic = ApplyFinalRules($phonetic, $finalRules1, $languageArg, false, $debug); // apply common rules
    $phonetic = ApplyFinalRules($phonetic, $finalRules2, $languageArg, true, $debug); // apply lang specific rules

    return $phonetic;

  }

  function ApplyFinalRules($phonetic, $finalRules, $languageArg, $strip, $debug) {

    // optimization to save time

    if ($finalRules == "" || count($finalRules) == 0) {
      return $phonetic;
    }

    // format of $rules array

    $patternPos = 0;
    $lcontextPos = 1;
    $rcontextPos = 2;
    $phoneticPos = 3;
    $languagePos = 4;
    $logicalPos = 5;

    // expand the result

    $phonetic = Expand($phonetic);
    $phoneticArray = explode("|", $phonetic);

    $fileName = ""; // will be used when debugging
    if (count($finalRules[count($finalRules)-1]) == 1) { // last item is name of the file
      $fileName = array_pop($finalRules);
      $fileName = $fileName[0];
    }

    for ($k=0; $k<count($phoneticArray); $k++) {

      $phonetic = $phoneticArray[$k];
if ($debug) echo "<br>applying final rules from ($fileName) to $phonetic<br>";
      $phonetic2 = "";

/*
      $attribute = "";
      $attributeStart = strpos($phonetic, "[");
      if ($attributeStart !== false) {
        $attribute = substr($phonetic, $attributeStart);
      }
*/
      $phoneticx = NormalizeLanguageAttributes($phonetic, true);
      for ($i=0; $i<strlen($phonetic);) {
        $found = false;

        if (substr($phonetic, $i, 1) == "[") { // skip over language attribute
          $attribStart = $i;
          $i++;
          while (true) {
            if (substr($phonetic, $i++, 1) == "]") {
              $attribEnd = $i;
              $phonetic2 .= substr($phonetic, $attribStart, $attribEnd-$attribStart);
              break;
            }
          }
//          $attribute = ""; // no need for separate attribute now that we have combined it with phonetic2
          continue;
        }

        for ($r=0; $r<count($finalRules); $r++) {
          $rule = $finalRules[$r];
          $pattern = $rule[$patternPos];
          $patternLength = strlen($pattern);
          $lcontext = $rule[$lcontextPos];
          $rcontext = $rule[$rcontextPos];

          $right = "/^$rcontext/";
          $left = "/$lcontext" . '$' . "/";

          // check to see if next sequence in $phonetic matches the string in the rule
          if ($patternLength > strlen($phoneticx)-$i || substr($phoneticx, $i, $patternLength) != $pattern) { // no match
            continue;
          }

          // check that right context is satisfied
          if ($rcontext != "") {
            if (!preg_match($right, substr($phoneticx, $i+$patternLength))) {
              continue;
            }
          }

          // check that left context is satisfied
          if ($lcontext != "") {
            if (!preg_match($left, substr($phoneticx, 0, $i))) {
              continue;
            }
          }

          // check to see if rule applies to languageArg (used only with "any" rules)
          if (($languageArg != "1") && ($languagePos < count($rule))) {
            $language = $rule[$languagePos]; // the required language(s) for this rule to apply
            $logical = $rule[$logicalPos]; // do we require ALL or ANY of the required languages
            if ($logical == "ALL") {
              // check to see if languageArg contains all the required languages
              if (($languageArg & $language) != $language) {
                continue;
              }
            } else { // any
              // check to see if languageArg contains at least one required language
              if (($languageArg & $language) == 0) {
                continue;
              }
            }
          }

          // check for incompatible attributes

          $candidate = ApplyRuleIfCompatible($phonetic2, $rule[$phoneticPos], $languageArg);
//          $candidate = ApplyRuleIfCompatible($phonetic2.$attribute, $rule[$phoneticPos]);
          if ($candidate === false) {
if ($debug) echo "rejecting rule #$r because of incompatible attributes<br>";
            continue;
          }
          $phonetic2 = $candidate;

if ($debug) echo "after applying final rule #$r to phonetic item #$k at position $i: <b>$phonetic2</b> pattern=$pattern lcontext=$lcontext rcontext=$rcontext subst=".$rule[$phoneticPos]."<br>";
          $found = true;
          break;
        }

        if (!$found) { // character in name for which there is no subsitution in the table
          $phonetic2 .= substr($phonetic, $i, 1);
if ($debug) echo "no rules match for phonetic item $k at position $i: <b>$phonetic2</b><br>";
          $patternLength = 1;
        }
        $i += $patternLength;

      }
      $phoneticArray[$k] = Expand($phonetic2);
    }
    $phonetic = Implode("|", $phoneticArray);
    if ($strip) {
      $phonetic = NormalizeLanguageAttributes($phonetic, true);
    }
    if (strpos($phonetic, "|") !== false) {
      $phonetic = "(" . RemoveDuplicateAlternates($phonetic) . ")";
    }
    return $phonetic;
  }

  function Mod($x, $y) {
    // use this instead of % to avoid negative results
    $mod = $x % $y;
    if ($mod < 0) {
      $mod += $y;
    }
    return $mod;
  }

  function PhoneticNumber($phonetic, $hash=true) {
if (($bracket=strpos($phonetic, "[")) !== false) {
  return substr($phonetic, 0, $bracket);
}
return ($phonetic); // experimental !!!!
    $phoneticLetters = "!bdfghjklmnNprsSt68vwzZxAa4oe5iI9uUEyQY"; // true phonetic letters
    $phoneticLetters .= "1BCDEHJKLOTUVWX"; // metaphonetic letters
    // dummy first letter, otherwise b would be treated as 0 and have no effect on result
    $metaPhoneticLetters = ""; // added letters to be used in finalxxx.php rules
    $result = 0;

    for ($i=0; $i<strlen($phonetic); $i++) {
      if (substr($phonetic, $i, 1) == "#") { // it's a meta phonetic letter
        if ($i == (strlen($phonetic)-1)) {
          echo "fatal error: invalid metaphonetic letter at position " . ($i+1) . " in $phonetic<br>";
 exit;
          return -1;
        }
        $i++;
        $j = strpos($metaPhoneticLetters, substr($phonetic, $i, 1));
        if ($j !== false) {
          $j += strlen($phoneticLetters);
        }
      } else {
        $j = strpos($phoneticLetters, substr($phonetic, $i, 1));
      }
      if ($j === false) {
        echo "fatal error: invalid phonetic letter at position " . ($i+1) . " in $phonetic<br>";
 exit;
        return -1;
      }
      $result *= strlen($phoneticLetters) + strlen($metaPhoneticLetters);
      if ($hash) {
//$result = $result & 0xff;
$result = $result & 0x7fffffff;
//        $result = Mod($result, 999999999);
      }
      $result += $j;
    }
    return dechex($result);
  }

  function Expand($phonetic) {
    $altStart = strpos($phonetic, "(");
    if ($altStart === false) {
      return NormalizeLanguageAttributes($phonetic, false);
    }
    $prefix = substr($phonetic, 0, $altStart);
    $altStart++; // get past the (
    $altEnd = strpos($phonetic, ")", $altStart);
    $altString = substr($phonetic, $altStart, $altEnd-$altStart);
    $altEnd++; // get past the )
    $suffix = substr($phonetic, $altEnd);        
    $altArray = explode("|", $altString);
    $result = "";
    for ($i=0; $i<count($altArray); $i++) {
      $alt = $altArray[$i];
      $alternate = Expand("$prefix$alt$suffix");
      if ($alternate != "" && $alternate != "[0]") {
        if ($result != "") {
          $result .= "|";
        }
        $result .= $alternate;
      }
    }
    return $result;
  }

  function PhoneticNumbersWithLeadingSpace($phonetic) {
    $altStart = strpos($phonetic, "(");
    if ($altStart === false) {
      return " " . PhoneticNumber($phonetic);
    }
    $prefix = substr($phonetic, 0, $altStart);
    $altStart++; // get past the (
    $altEnd = strpos($phonetic, ")", $altStart);
    $altString = substr($phonetic, $altStart, $altEnd-$altStart);
    $altEnd++; // get past the )
    $suffix = substr($phonetic, $altEnd);        
    $altArray = explode("|", $altString);
    $result = "";
    for ($i=0; $i<count($altArray); $i++) {
      $alt = $altArray[$i];
      $result .= PhoneticNumbersWithLeadingSpace("$prefix$alt$suffix");
    }
    return $result;
  }

  function PhoneticNumbers($phonetic) {
//echo "phonetic=$phonetic<br>";
//???    $phonetic = RemoveDuplicateAlternates($phonetic);
    $phoneticArray = explode("-", $phonetic); // for names with spaces in them
    $result = "";
    for ($i=0; $i<count($phoneticArray); $i++) {
      if ($i != 0) {
        $result .= " ";
      }
      $result .= substr(PhoneticNumbersWithLeadingSpace($phoneticArray[$i]), 1);
    }
//echo "numbers=$result<br>";
    return $result;
  }

  function isPhoneticVowel($c) {
    return (strpos("Aa4oe5iI9uUE", $c) !== false);
  }

  function isAOTypeVowel($c) {
    return (strpos("a4o59", $c) !== false);
  }

  function isEITypeVowel($c) {
    return (strpos("eiIy", $c) !== false);
  }

  function isSZTypeConsonant($c) {
    return (strpos("sSzZ", $c) !== false);
  }

  function RemoveDuplicateAlternates($phonetic) {

    $altString = $phonetic;
    $altArray = explode("|", $altString);

    $result = "|";
    $altcount = 0;
    for ($i=0; $i<count($altArray); $i++) {
      $alt = $altArray[$i];
      if (strpos($result, "|$alt|") === false) {
        $result .= "$alt|";
        $altcount++;
      }
    }

    $result = substr($result, 1, strlen($result)-2); // remove leading and trailing |
    return $result;
  }

  function NormalizeLanguageAttributes($text, $strip) {
    // this is applied to a single alternative at a time -- not to a parenthisized list
    // it removes all embedded bracketed attributes, logically-ands them together, and places them at the end.

    // however if strip is true, this can indeed remove embedded bracketed attributes from a parenthesized list

    $uninitialized = -1; // all 1's
    $attrib = $uninitialized;
    while (($bracketStart=strpos($text, "[")) !== false) {
      $bracketEnd = strpos($text, "]", $bracketStart);
      if ($bracketEnd === false) {
        echo "fatal error: no closing square bracket: text=($text) strip=($strip)<br>";
        exit;
      }
      $attrib &= substr($text, $bracketStart+1, $bracketEnd-($bracketStart+1));
      $text = substr($text, 0, $bracketStart) . substr($text, $bracketEnd+1);
    }
    if ($attrib == $uninitialized || $strip) {
      return $text;
    } else if ($attrib == 0) {
      return "[0]"; // means that the attributes were incompatible and there is no alternative here
    } else {
      return $text. "[" . $attrib . "]";
    }
  }

  function ApplyRuleIfCompatible($phonetic, $target, $languageArg) {

    // tests for compatible language rules
    // to do so, apply the rule, expand the results, and detect alternatives with incompatible attributes
    // then drop each alternative that has incompatible attributes and keep those that are compatible
    // if there are no compatible alternatives left, return false
    // otherwise return the compatible alternatives

    // apply the rule

    $candidate = $phonetic . $target;
    if (strpos($candidate, "[") === false) { // no attributes so we need test no further
      return $candidate;
    }

    // expand the result, converting incompatible attributes to [0]

    $candidate = Expand($candidate);
    $candidateArray = explode("|", $candidate);

    // drop each alternative that has incompatible attributes

    $candidate = "";
    $found = false;

    for ($i=0; $i<count($candidateArray); $i++) {
      $thisCandidate = $candidateArray[$i];
      if ($languageArg != "1") {
        $thisCandidate = NormalizeLanguageAttributes($thisCandidate."[$languageArg]", false);
      }
      if ($thisCandidate != "[0]") {
//      if ($candidate != "[0]") {
        $found = true;
        if ($candidate != "") {
          $candidate .= "|";
        }
        $candidate .= $thisCandidate;      
      }
    }

    // return false if no compatible alternatives remain

    if (!$found) {
      return false;
    }

    // return the result of applying the rule

    if (strpos($candidate, "|") !== false) {
      $candidate = "($candidate)";
    }
    return $candidate;

  }

?> 
