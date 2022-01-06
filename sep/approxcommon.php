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

//Sephardic
include_once "exactapproxcommon.php"; 

$approxCommon = array(
    array ("mbr", "", "", "mr"), 
    array ("mpr", "", "", "mr"), 
    array ("bens", "^", "", "(binz|s)"), 
    array ("benS", "^", "", "(binz|s)"), 
    array ("ben", "^", "", "(bin|)"), 
    array ("bar", "^", "", "(bar|)"),
    array ("abens", "^", "", "(binz|s)"), 
    array ("abenS", "^", "", "(binz|s)"), 
    array ("aben", "^", "", "(bin|bun|)"),
    array ("abe", "^", "", "(bi|bu|)"),
    array ("abi", "^", "", "(bi|bu|)"),
    array ("abou", "^", "", "(bu|[$french])"),
    array ("abu", "^", "", "(bu|)"),
    array ("bou", "^", "", "(bu|[$french])"),
    array ("bu", "^", "", "(bu|)"),
    array ("ibn", "^", "", "(ibn|)"),
    
    array ("els", "^", "", "(ilz|lz|s)"), 
    array ("elS", "^", "", "(ilz|lz|s)"), 
    array ("el", "^", "", "(il|l|)"), 
    array ("als", "^", "", "(lz|s)"), 
    array ("alS", "^", "", "(lz|s)"), 
    array ("al", "^", "", "(l|)"), 
    
   //array ("dels", "^", "", "(dilz|s)"), 
   //array ("delS", "^", "", "(dilz|s)"), 
    array ("dal", "^", "", "(dal|[$italian])"), 
    array ("da", "^", "", "(da|a|)"), 
    array ("della", "^", "", "(dila|)"), 
    array ("dela", "^", "", "(dila|)"), 
    array ("del", "^", "", "(dil|)"),
    array ("des", "^", "", "(dis|)"), 
    array ("de", "^", "", "(di|i|)"), 
    array ("di", "^", "", "(di|i|[$italian])"), 
   //array ("dos", "^", "", "(das|dus|)"), 
    array ("do", "^", "", "(du|u)"), 
    array ("du", "^", "", "(du|u)"), 
    
    array("oa","","","(va|a)"),
    array("oe","","","(vi|i)"),
    array("ae","","","(a|i)"),
    
    /// array ("s", "", "$", "(s|)"), // Attia(s)
    /// array ("C", "", "", "s"),  // "c" could actually be "ç"
    
    array("n","","[bp]","m"),
     
    //array ("ha", "^", "", "(ha|a|fa|)"),  
    //array("h","","","(|h|f)"), // sound "h" (absent) can be expressed via /x/, Cojab in Spanish = Kohab ; Hakim = Fakim
    array ("ha", "^", "", "(ha|a|)"),  // ha-Levi
    array("h","","","(|h)"), // sound "h" (absent) can be expressed via /x/, Cojab in Spanish = Kohab 
    array("x","","","h"),
    array("k","","","(h|k)"),   // Arabic kh can be expressed via both 'h' and 'k'
        
// DIPHTHONGS ARE APPROXIMATELY equivalent
    array("aja","^","","(Da|ia)"),                         
    array("aje","^","","(Di|Da|i|ia)"),                         
    array("aji","^","","(Di|i)"),                         
    array("ajo","^","","(Du|Da|iu|ia)"),                         
    array("aju","^","","(Du|iu)"),                         
    
    array("aj","","","(D|i)"),                         
    array("ej","","","(D|i)"),                         
    array("oj","","","D"),                         
    array("uj","","","D"),                         
    array("au","","","u"),                         
    array("eu","","","(iu|i|u)"),                         
    array("ou","","","u"),                         
        
    array ("a", "^", "", ""),  // Arabic
    
    array("ja","^","","ia"),                         
    array("je","^","","i"),                         
    array("jo","^","","(iu|ia)"),                         
    array("ju","^","","iu"),                         
            
    array("ja","","","(a|ia)"),                         
    array("je","","","i"),                         
    array("ji","","","i"),                         
    array("jo","","","(u|iu)"),                         
    array("ju","","","u"),                         
                            
    array("j","","","i"),   
    
    array("i","","$","(i|)"), // often in Arabic
    array("o", "", "$", "(a|u|i)"), // Italian Bono = Boni
    array("o", "", "", "u"),                      
    array("a", "", "$", "(a|i)"), // Italian Bona = Boni

// CONSONANTS {z & Z & dZ; s & S} are approximately interchangeable
    array ("se", "", "[rmnl]", "(z|si)"),
    array ("s", "", "[rmnl]", "z"),
    array ("Se", "", "[rmnl]", "(z|si)"),
    array ("S", "", "[rmnl]", "z"),
    array ("s", "[rmnl]", "", "z"),
    array ("S", "[rmnl]", "", "z"), 
    
    array ("dS", "", "$", "S"),
    array ("dZ", "", "$", "S"),
    array ("Z", "", "$", "S"),
    array ("S", "", "$", "(S|s)"),
    array ("z", "", "$", "(S|s)"),
    
    array ("S", "", "", "s"),
    array ("dZ", "", "", "z"),
    array ("Z", "", "", "z"),

// Bisseror = Bisror, Abitbol = Abitebol
    array("be","","[fktSs]","(p|bi)"),
    array("pe","","[vgdZz]","(b|pi)"),
    array("ve","","[pktSs]","(f|vi)"),
    array("fe","","[vbgdZz]","(v|fi)"),
    array("ge","","[pftSs]","(k|gi)"),
    array("ke","","[vbdZz]","(g|ki)"),
    array("de","","[pfkSs]","(t|di)"),
    array("te","","[vbgZz]","(d|ti)"),
    array("ze","","[pfkSt]","(s|zi)"),
    array("e", "", "", "(i|)"), 

// special character to deal correctly in Hebrew match
    array("B","","","b"), 
    array("V","","","v"), 

 // Arabic
    array ("p", "^", "", "b"),
    
    array("exactapproxcommon plus approxcommon")
   );
   $approxCommon = array_merge($exactApproxCommon, $approxCommon);
  
?> 
