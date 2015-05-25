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

 $approxGermandjsg = array(

    array ("I", "", "$", "i"),
    array ("I", "[AEIOUaeiouQY]", "", "i"),
    array ("I", "", "[^k]$", "i"),
    array ("Ik", "[lr]", "$", "(ik|Qk)"),
    array ("Ik", "", "$", "ik"),
    array ("sIts", "", "$", "(sits|sQts)"),
    array ("Its", "", "$", "its"),
    array ("I", "", "", "(Q|i)"), 
    
    array("AU","","","(D|a|u)"),
    array("aU","","","(D|a|u)"),
    array("Au","","","(D|a|u)"),
    array("au","","","(D|a|u)"),
    array("ou","","","(D|o|u)"),
    array("OU","","","(D|o|u)"),
    array("oU","","","(D|o|u)"),
    array("Ou","","","(D|o|u)"),
    array("ai","","","(D|a|i)"),
    array("Ai","","","(D|a|i)"),
    array("oi","","","(D|o|i)"),
    array("Oi","","","(D|o|i)"),
    array("ui","","","(D|u|i)"),
    array("Ui","","","(D|u|i)"),
        
    array ("e", "", "", "i"), 
    array ("E", "", "[fklmnprsStv]$", "i"),
    array ("E", "", "ts$", "i"),
    array ("E", "[DaoAOUiuQY]", "", "i"),
    array ("E", "", "[aoAOQY]", "i"),
    array ("E", "", "", "(Y|i)"), 
   
    array ("a", "", "", "(a|o)"), 
    array ("A", "", "", "(a|o)"), 
    array ("O", "", "", "o"), 
    array ("U", "", "", "u"), 
            
  );

  $approx[LanguageIndex("germandjsg", $languages)] = $approxGermandjsg;
?> 
