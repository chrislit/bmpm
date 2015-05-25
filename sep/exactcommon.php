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

// Sephardic  
include_once "exactapproxcommon.php";

$exactCommon = array(
    array("h","","",""),
  //array("C","","","k"),  // c that can actually be ç
 
 // VOICED - UNVOICED CONSONANTS
    array("s","[^t]","[bgZd]","z"),
    array("Z","","[pfkst]","S"),
    array("Z","","$","S"),
    array("S","","[bgzd]","Z"),
    array("z","","$","s"),

  //special character to deal correctly in Hebrew match
    array("B","","","b"),
    array("V","","","v"),
    
    array("exactapproxcommon plus exactcommon") 
 );

$exactCommon = array_merge($exactApproxCommon, $exactCommon);

?> 
