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
   // A, E, I, O, P, U should create variants, 
   // EE = final "e" (english & french)
   // V, B from Spanish
   // but a, e, i, o, u should not create any new variant
  $exactAny = array(
    array ("EE", "", "$", "e"),
    
    array ("A", "", "", "a"),
    array ("E", "", "", "e"),
    array ("I", "", "", "i"),
    array ("O", "", "", "o"),
    array ("P", "", "", "o"),
    array ("U", "", "", "u"),
    
    array("B","","[fktSs]","p"),
    array("B","","p",""),
    array("B","","$","p"),
    array("V","","[pktSs]","f"),
    array("V","","f",""),
    array("V","","$","f"),
    
    array ("B", "", "", "b"),
    array ("V", "", "", "v"),

        
    array("exactany")
      
  );

  $exact[LanguageIndex("any", $languages)] = $exactAny;

?> 
