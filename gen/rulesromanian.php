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

// GENERAL
  $rulesRomanian = array(
    array("ce","","","tSe"),
    array("ci","","","(tSi|tS)"),
    array("ch","","[ei]","k"),
    array("ch","","","x"), // foreign
   
    array("gi","","","(dZi|dZ)"),
    array("g","","[ei]","dZ"),
    array("gh","","","g"),
  
    array("i","[aeou]","","j"),
    array("i","","[aeou]","j"),
    array("ţ","","","ts"),
    array("ş","","","S"),
    array("qu","","","k"),    
      
    array("î","","","i"),
    array("ea","","","ja"),
    array("ă","","","(e|a)"),
    array("aue","","","aue"),
  
  // LATIN ALPHABET
    array("a","","","a"),
    array("b","","","b"),
    array("c","","","k"),
    array("d","","","d"),
    array("e","","","E"),
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","(x|h)"),
    array("i","","","I"),
    array("j","","","Z"),
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","o"),
    array("p","","","p"),
    array("q","","","k"),    
    array("r","","","r"),
    array("s","","","s"),
    array("t","","","t"),
    array("u","","","u"),
    array("v","","","v"),
    array("w","","","v"),    
    array("x","","","ks"),    
    array("y","","","i"),    
    array("z","","","z"),
    
    array("rulesromanian")
  );

  $rules[LanguageIndex("romanian", $languages)] = $rulesRomanian;
?> 
