<?php
/*
 * Copyright Alexander Beider and Stephen P. Morse, 2008, 2017
 * Copyright Olegs Capligins, 2013-2016
 *
 * This is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * It is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
 * or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public
 * License for more details.
 *
 * You should have received a copy of the GNU General Public License.
 * If not, see <http://www.gnu.org/licenses/>.
 *
 */

  // GENERAL 
  $rulesLatvian = array(

    // CONSONANTS
    array("č", "", "", "tS"),
    array("ģ", "", "", "(d|dj)"),
      //array("ķ","","","(t|ti)"),
    array("ķ","","","(t|tj)"),
      //array("ļ","","","lj"),
    array("ļ","","","l"),
    array("š", "", "", "S"),
    array("ņ","","","(n|nj)"),
    array("ž", "", "", "Z"),

    // SPECIAL VOWELS
    array("ā", "", "", "a"),
    array("ē", "", "", "e"),
    array("ī", "", "", "i"),
    array("ū", "", "", "u"),

    // DIPHTONGS
      //array("ai","","","(D|ai)"),
    array("ai","","","aj"),
      //array("ei","","","(D|ei)"),
    array("ei","","","ej"),
    array("io","","","jo"),
      // array("iu","","","(D|iu)"),
    array("iu","","","ju"),
      //array("ie","","","(D|ie)"),
    array("ie","","","je"),
    //array("o","","","(D|uo)"),
    array("o","","","o"),
    //array("ui","","","(D|ui)"),
    array("ui","","","uj"),
    
    // LATIN ALPHABET
    array("a","","","a"),
    array("b","","","b"),
    array("c","","","ts"),
    array("d","","","d"),
    array("e","","","E"),
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","h"),
    array("i","","","I"),
    array("j","","","j"),
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("p","","","p"),
    array("r","","","r"),
    array("s","","","s"),
    array("t","","","t"),
    array("u","","","u"),
    array("v","","","v"),
    array("z","","","z"),

    array("ruleslatvian")

  );

  $rules[LanguageIndex("latvian", $languages)] = $rulesLatvian;
?>