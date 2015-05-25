<?php

  /*
   *
   * Copyright Alexander Beider and Stephen P. Morse, 2011
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

 $approxArabic = array(

    array ("1a", "", "", "(D|a)"), 
    array ("1i", "", "", "(D|i|e)"), 
    array ("1u", "", "", "(D|u|o)"), 
    array ("j1", "", "", "(ja|je|jo|ju|j)"), 
    array ("1", "", "", "(a|e|i|o|u|)"), 
    array ("u", "", "", "(o|u)"), 
    array ("i", "", "", "(i|e)"), 
    array ("p", "", "$", "p"), 
    array ("p", "", "", "(p|b)"), 

    array("approxarabic")

  );

  $approx[LanguageIndex("arabic", $languages)] = $approxArabic;
?> 
