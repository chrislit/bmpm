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

  $rulesCzech = array(
    array("ch","","","x"), 
    array("qu","","","(k|kv)"),    
    array("aue","","","aue"),
    array("ei","","","(ej|aj)"),
    array("i","[aou]","","j"),
    array("i","","[aeou]","j"),
   
    array("č","","","tS"),
    array("š","","","S"),
    array("ž","","","Z"),
    array("ň","","","n"),
    array("ť","","","(t|tj)"),
    array("ď","","","(d|dj)"),
    array("ř","","","(r|rZ)"),

    array("á","","","a"),
    array("é","","","e"),
    array("í","","","i"),
    array("ó","","","o"),
    array("ú","","","u"),
    array("ý","","","i"),
    array("ě","","","(e|je)"),
    array("ů","","","u"),
     
 // LATIN ALPHABET
    array("a","","","a"),
    array("b","","","b"),
    array("c","","","ts"),
    array("d","","","d"),
    array("e","","","E"),
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","(h|g)"),
    array("i","","","I"),
    array("j","","","j"),
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","o"),
    array("p","","","p"),
    array("q","","","(k|kv)"),    
    array("r","","","r"),
    array("s","","","s"),
    array("t","","","t"),
    array("u","","","u"),
    array("v","","","v"),
    array("w","","","v"),    
    array("x","","","ks"),    
    array("y","","","i"),
    array("z","","","z"), 

    array("czech")
  );

  $rules[LanguageIndex("czech", $languages)] = $rulesCzech;
?> 
