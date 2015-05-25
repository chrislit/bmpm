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

//GENERAL
include_once "exactapproxcommon.php";

$hebrewCommon = array(
    array("ts","","","C"), // for not confusion Gutes [=guts] and Guts [=guc]
    array("tS","","","C"), // same reason
    array("S","","","s"),
    array("p","","","f"),   
    array("b","^","","b"),    
    array("b","","","(b|v)"),    
    array("B","","","(b|v)"),    // Spanish "b"
    array("V","","","v"),    // Spanish "v"
    array("EE","","","(1|)"), // final "e" (english & french)
       
    array("ja","","","i"),
    array("jA","","","i"),  
    array("je","","","i"),
    array("jE","","","i"),
    array("aj","","","i"),
    array("Aj","","","i"),
    array("I","","","i"),
    array("j","","","i"),
    
    array("a","^","","1"),
    array("A","^","","1"),
    array("e","^","","1"),
    array("E","^","","1"),
    array("Y","^","","1"),
    
    array("a","","$","1"),
    array("A","","$","1"),
    array("e","","$","1"),
    array("E","","$","1"),
    array("Y","","$","1"),
    
    array("a","","",""),
    array("A","","",""),
    array("e","","",""),
    array("E","","",""),
    array("Y","","",""),
    
    array("oj","^","","(u|vi)"),
    array("Oj","^","","(u|vi)"),
    array("uj","^","","(u|vi)"),
    array("Uj","^","","(u|vi)"), 
    
    array("oj","","","u"),
    array("Oj","","","u"),
    array("uj","","","u"),
    array("Uj","","","u"), 
    
    array("ou","^","","(u|v|1)"),
    array("o","^","","(u|v|1)"),
    array("O","^","","(u|v|1)"),
    array("P","^","","(u|v|1)"),
    array("U","^","","(u|v|1)"),
    array("u","^","","(u|v|1)"),
    
    array("o","","$","(u|1)"),
    array("O","","$","(u|1)"),
    array("P","","$","(u|1)"),
    array("u","","$","(u|1)"),
    array("U","","$","(u|1)"),
    
    array("ou","","","u"),
    array("o","","","u"),
    array("O","","","u"),
    array("P","","","u"),
    array("U","","","u"),
        
    array("VV","","","u"), // alef/ayin + vov from ruleshebrew
    array("V","","","v"), // tsvey-vov from ruleshebrew;; only Ashkenazic
    array("L","^","","1"), // alef/ayin from  ruleshebrew
    array("L","","$","1"), // alef/ayin from  ruleshebrew
    array("L","","",""), // alef/ayin from  ruleshebrew
    array("WW","^","","(vi|u)"), // vav-yod from  ruleshebrew
    array("WW","","","u"), // vav-yod from  ruleshebrew
    array("W","^","","(u|v)"), // vav from  ruleshebrew
    array("W","","","u"), // vav from  ruleshebrew
    
    // array("g","","","(g|Z)"),
    // array("z","","","(z|Z)"),
    // array("d","","","(d|dZ)"),
   
    array("TB","^","","t"), // tav from ruleshebrew
    array("TB","","","(t|s)"), // tav from ruleshebrew; s is only Ashkenazic    
    array("T","","","t"),   // tet from  ruleshebrew
    
   // array("k","","","(k|x)"),
   // array("x","","","(k|x)"),
    array("K","","","k"), // kof and initial kaf from ruleshebrew
    array("X","","","x"), // khet and final kaf from ruleshebrew
    
    array("H","^","","(x|1)"),
    array("H","","$","(x|1)"),
    array("H","","","(x|)"),
    array("h","^","","1"),
    array("h","","",""),
    
    array("exactapproxcommon plus hebrewcommon")    
  );
      
$hebrewCommon = array_merge($exactApproxCommon, $hebrewCommon);
    
?> 
