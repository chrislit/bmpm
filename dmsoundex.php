<?php

  /*
   *
   * Copyright Stephen P. Morse, 2005
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

  include "diacritical_mapping.php";

  function soundx_name($MyStrArg) {

    $MyStrArg = html_entity_decode($MyStrArg);
    $MyStrArg = Map($MyStrArg); // remove diacritics
    $GROUPSEPARATOR = " ";

    // replace certain text in strings with a slash
    $re = "/ v | v\. | vel | aka | f | f. | r | r. | false | recte | on zhe /i";
    $MyStr = preg_replace($re, "/", $MyStrArg);

    // append soundex of each individual word
    $result = "";
    $MyStrArray = preg_split("/[ |,]+/", $MyStr); // use space or comma as token delimiter
    for ($i=0; $i<count($MyStrArray); $i++) {
      if (strlen($MyStrArray[$i]) > 0) { // ignore null at ends of array (due to leading or trailing space)
        if ($i != 0) {
          $result .= $GROUPSEPARATOR;
        }
        $result .= dmsoundex2($MyStrArray[$i]);
      }
    }
    return $result;
  }

  function soundx_place($MyStrArg) {

    $MyStrArg = Map($MyStrArg); // remove diacritics
    $GROUPSEPARATOR = " ";

    // append soundex of each individual word
    $MyStr = preg_replace("[,]", "/", $MyStrArg);
    $result = "";
    $MyStrArray = preg_split("/[,]+/", $MyStr); // use comma as token delimiter
    for ($i=0; $i<count($MyStrArray); $i++) {
      if (strlen($MyStrArray[$i]) > 0) { // ignore null at ends of array (due to leading or trailing space)
        if ($i != 0) {
          $result .= $GROUPSEPARATOR;
        }
        $result .= dmsoundex2($MyStrArray[$i]);
      }
    }
    return $result;
  }

  function dmsoundex2($MyStrArg) {

    include "dmlat.php";
    $SEPARATOR = " ";
    $DMDEBUG = FALSE;
    $MyStr = strtolower($MyStrArg);
    $MyStr3 = $MyStr;

    // MyStr = original, MyStr2 = the current string being split off, MyStr3 = what's left to process
    $dm3 = "";
    while (strlen($MyStr3) > 0) {
      $MyStr2 = "";
      $LenMyStr3 = strlen($MyStr3);

      for ($i=0; $i < strlen($MyStr3); $i++) {
        if (($MyStr3[$i] >= $firstLetter && $MyStr3[$i] <= $lastLetter) || $MyStr3[$i] == '/' || $MyStr3[$i] == ' ') {
        // if (($MyStr3[$i] >= $firstLetter && $MyStr3[$i] <= $lastLetter) || $MyStr3[$i] == '/') {
          if ($MyStr3[$i] == '/') {
            $MyStr3 = substr($MyStr3, $i + 1);
            break;
          } else {
            if ($MyStr3[$i] != ' ') {
              $MyStr2 .= $MyStr3[$i];
            }
          }
        } else {
          // if ($MyStr[$i] == "(" || $MyStr[$i] == $SEPARATOR) {
          // if ($MyStr3[$i] == "(" || $MyStr3[$i] == $SEPARATOR) {
          // Ostend, Belgium (Morristown, Pa., U.S.)
          if ($MyStr3[$i] == "(") {
            $MyStr3 = substr($MyStr3, $i + 1); // Gary added
            break;
          }
        }
      }
  if($DMDEBUG) printf ("pt1 MyStr='%s', MyStr2='%s', MyStr3='%s'\n", $MyStr, $MyStr2, $MyStr3);
      if ($i == $LenMyStr3) {
        $MyStr3 = ""; // finished
      }
      $MyStr = $MyStr2;
      $dm = "";
      $allblank = true;
      for ($k=0; $k<strlen($MyStr); $k++) {
        if ($MyStr[$k] != ' ') {
          $allblank = false;
          break;
        }
      }
      if (!$allblank) {
  if($DMDEBUG) printf ("pt2 MyStr='%s', MyStr2='%s', MyStr3='%s'\n", $MyStr, $MyStr2, $MyStr3);
        $dim_dm2 = 1;
        $dm2 = array();
        $dm2[0] = "";

        $first = 1;
        $lastdm = array();
        $lastdm[0] = "";

        while (strlen($MyStr) > 0) {

          for ($rule=0; $rule<count($newrules); $rule++) { // loop through the rules
            if (substr($MyStr, 0, strlen($newrules[$rule][0])) == $newrules[$rule][0]) { // match found
              //check for $xnewrules branch
              $xr = "!" . $newrules[$rule][0] . "!";
              if (strpos($xnewruleslist, $xr) !== false) {
                $xr = strpos($xnewruleslist, $xr) / 3;
                for ($dmm = $dim_dm2; $dmm < 2 * $dim_dm2; $dmm++) {
                  $dm2[$dmm] = $dm2[$dmm - $dim_dm2];
                  $lastdm[$dmm] = $lastdm[$dmm - $dim_dm2];
                }
                $dim_dm2 = 2 * $dim_dm2;
              } else {
                $xr = -1;
              }
   
              $dm = $dm . "_" . $newrules[$rule][0];
              if (strlen($MyStr) > strlen($newrules[$rule][0])) {
                $MyStr = substr($MyStr, strlen($newrules[$rule][0]));
              } else {
                $MyStr = "";
              }

              // If first rule hit
              if ($first == 1) {
                $dm2[0] = $newrules[$rule][1];
                $first = 0;
                $lastdm[0] = $newrules[$rule][1];

                if ($xr >= 0) {
                  $dm2[1] = $xnewrules[$xr][1];
                  $lastdm[1] = $xnewrules[$xr][1];
                }
              // If after first rule hit
              } else {
                $dmnumber = 1;
                if ($dim_dm2 > 1) {
                  $dmnumber = $dim_dm2 / 2;
                }
                // if 1st position is a vowel
                if (strlen($MyStr) > 0 && strpos($vowels, $MyStr[0]) !== false) {
  if($DMDEBUG) printf ("pt2b vowel: '%s'\n", $MyStr[0]);
                  for ($ii=0; $ii<$dmnumber; $ii++) {
                    if ($newrules[$rule][2] != "999" && $newrules[$rule][2] != $lastdm[$ii]) {
                      $lastdm[$ii] = $newrules[$rule][2];
                      $dm2[$ii] .= $newrules[$rule][2];
                    } else if ($newrules[$rule][3] == 999) {
                      // reset $lastdm if vowel is encountered but not if adjacent consonants
                      $lastdm[$ii] = "";
                    }
                  }

                  if ($dim_dm2 > 1) {
                    for ($ii=$dmnumber; $ii<$dim_dm2; $ii++) {
                      if ($xr >= 0 && $xnewrules[$xr][2] != "999" && $xnewrules[$xr][2] != $lastdm[$ii]) {
                        $lastdm[$ii] = $xnewrules[$xr][2];
                        $dm2[$ii] .= $xnewrules[$xr][2];
                      } else {
                        if ($xr < 0 && $newrules[$rule][2] != "999" && $newrules[$rule][2] != $lastdm[$ii]) {
                          $lastdm[$ii] = $newrules[$rule][2];
                          $dm2[$ii] .= $newrules[$rule][2];
                        } else if ($newrules[$rule][3] == 999) {
                          // reset $lastdm if vowel is encountered but not if adjacent consonants
                          $lastdm[$ii] = "";
                        }
                      }
                    }
                  }
  if($DMDEBUG) printf ("pt2c vowel: '%s'  done\n", $MyStr[0]);
      
                // 1st position not a vowel
                } else {
                  for ($ii=0; $ii<$dmnumber; $ii++) {
  if($DMDEBUG) echo "pt2d lastdm:\n"; 
  if($DMDEBUG) print_r($lastdm);
                    if ($newrules[$rule][3] != "999" && $newrules[$rule][3] != $lastdm[$ii]) {
                      $lastdm[$ii] = $newrules[$rule][3];
                      $dm2[$ii] .= $newrules[$rule][3];
                    } else if ($newrules[$rule][3] == 999) {
                      // reset $lastdm if vowel is encountered but not if adjacent consonants
                      $lastdm[$ii] = "";
                    }
                  }
                  if ($dim_dm2 > 1) {
                    for ($ii=$dmnumber; $ii<$dim_dm2; $ii++) {
  if($DMDEBUG) echo "pt2e checking xrules\n";
                      if ($xr >= 0 && $xnewrules[$xr][3] != "999" && $xnewrules[$xr][3] != $lastdm[$ii]) {
                        $lastdm[$ii] = $xnewrules[$xr][3];
                        $dm2[$ii] .= $xnewrules[$xr][3];
                      } else {
                        if ($xr < 0 && $newrules[$rule][3] != "999" && $newrules[$rule][3] != $lastdm[$ii]) {
                          $lastdm[$ii] = $newrules[$rule][3];
                          $dm2[$ii] .= $newrules[$rule][3];
                        } else if ($newrules[$rule][3] == 999) {
                          // reset $lastdm if vowel is encountered but not if adjacent consonants
                          $lastdm[$ii] = "";
                        }
                      }
                    }
                  } // end of dim_dm2 > 1
                } // end of not a vowel
              }

              break; // stop looping through rules
            } // end of match found

  if($DMDEBUG) echo "end of pt2a\n";
          } // end of looping through the rules
        } // end of while (strlen($MyStr)) > 0)

  if($DMDEBUG) echo "pt4 dm2:"; 
  if($DMDEBUG) print_r($dm2);
        $dm = "";
        for ($ii=0; $ii<$dim_dm2; $ii++) {
          $dm2[$ii] = substr($dm2[$ii] . "000000",0, 6);
          if ($ii == 0 && strpos($dm, $dm2[$ii]) === false && strpos($dm3,$dm2[$ii]) === false) {
            $dm = $dm2[$ii];
          } else {
            if (strpos($dm, $dm2[$ii]) === false && strpos($dm3, $dm2[$ii]) === false) {
              if (strlen($dm) > 0) {
                $dm = $dm . $SEPARATOR . $dm2[$ii];
              } else {
                $dm = $dm2[$ii];

              }
            }
          }
        }

  if($DMDEBUG) echo "pt3 - dm3 '" . $dm3 . "' dm '" . $dm . "'\n";
        if (strlen($dm3) > 0 && strlen($dm) > 0 && strpos($dm3, $dm) === false) {
          $dm3 = $dm3 . $SEPARATOR . $dm;
        } else {
          if (strlen($dm) > 0) {
            $dm3 = $dm;
          }
        }

      }

    } // end of while

    $dm = $dm3;
    return $dm;
  }
?>
