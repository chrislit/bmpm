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

// ASHKENAZIC

// A, E, I, O, P, U should create variants, but a, e, i, o, u should not create any new variant
// Q = ü ; Y = ä = ö
// H = initial "H" in German/English
$approxAny = array(

// CONSONANTS
    array("b","","","(b|v[$spanish])"),
    array ("J", "", "", "z"), // Argentina Spanish: "ll" = /Z/, but approximately /Z/ = /z/
    
// VOWELS
    // "ALL" DIPHTHONGS are interchangeable BETWEEN THEM and with monophthongs of which they are composed ("D" means "diphthong")
    //  {a,o} are totally interchangeable if non-stressed; in German "a/o" can actually be from "ä/ö" (that are equivalent to "e")
    //  {i,e} are interchangeable if non-stressed, while in German "u" can actually be from "ü" (that is equivalent to "i")
    
    array("aiB","","[bp]","(D|Dm)"),
    array("AiB","","[bp]","(D|Dm)"),
    array("oiB","","[bp]","(D|Dm)"), 
    array("OiB","","[bp]","(D|Dm)"),
    array("uiB","","[bp]","(D|Dm)"), 
    array("UiB","","[bp]","(D|Dm)"), 
    array("eiB","","[bp]","(D|Dm)"),
    array("EiB","","[bp]","(D|Dm)"),
    array("iiB","","[bp]","(D|Dm)"),
    array("IiB","","[bp]","(D|Dm)"),
    
    array("aiB","","[dgkstvz]","(D|Dn)"),
    array("AiB","","[dgkstvz]","(D|Dn)"),
    array("oiB","","[dgkstvz]","(D|Dn)"), 
    array("OiB","","[dgkstvz]","(D|Dn)"),
    array("uiB","","[dgkstvz]","(D|Dn)"), 
    array("UiB","","[dgkstvz]","(D|Dn)"), 
    array("eiB","","[dgkstvz]","(D|Dn)"),
    array("EiB","","[dgkstvz]","(D|Dn)"),
    array("iiB","","[dgkstvz]","(D|Dn)"),
    array("IiB","","[dgkstvz]","(D|Dn)"),
      
    array("B","","[bp]","(o|om[$polish]|im[$polish])"), 
    array("B","","[dgkstvz]","(a|o|on[$polish]|in[$polish])"), 
    array ("B", "", "", "(a|o)"),
    
    array("aiF","","[bp]","(D|Dm)"),
    array("AiF","","[bp]","(D|Dm)"),
    array("oiF","","[bp]","(D|Dm)"), 
    array("OiF","","[bp]","(D|Dm)"),
    array("uiF","","[bp]","(D|Dm)"), 
    array("UiF","","[bp]","(D|Dm)"), 
    array("eiF","","[bp]","(D|Dm)"),
    array("EiF","","[bp]","(D|Dm)"),
    array("iiF","","[bp]","(D|Dm)"),
    array("IiF","","[bp]","(D|Dm)"),
        
    array("aiF","","[dgkstvz]","(D|Dn)"),
    array("AiF","","[dgkstvz]","(D|Dn)"),
    array("oiF","","[dgkstvz]","(D|Dn)"), 
    array("OiF","","[dgkstvz]","(D|Dn)"),
    array("uiF","","[dgkstvz]","(D|Dn)"), 
    array("UiF","","[dgkstvz]","(D|Dn)"), 
    array("eiF","","[dgkstvz]","(D|Dn)"),
    array("EiF","","[dgkstvz]","(D|Dn)"),
    array("iiF","","[dgkstvz]","(D|Dn)"),
    array("IiF","","[dgkstvz]","(D|Dn)"),
            
    array("F","","[bp]","(i|im[$polish]|om[$polish])"),
    array("F","","[dgkstvz]","(i|in[$polish]|on[$polish])"),
    array ("F", "", "", "i"), 
        
    array ("P", "", "", "(o|u)"), 
        
    array ("I", "[aeiouAEIBFOUQY]", "", "i"),
    array("I","","[^aeiouAEBFIOU]e","(Q[$german]|i|D[$english])"),  // "line"
    array ("I", "", "$", "i"),
    array ("I", "", "[^k]$", "i"),
    array ("Ik", "[lr]", "$", "(ik|Qk[$german])"),
    array ("Ik", "", "$", "ik"),
    array ("sIts", "", "$", "(sits|sQts[$german])"),
    array ("Its", "", "$", "its"),
    array ("I", "", "", "(Q[$german]|i)"),
   
    array("lE","[bdfgkmnprsStvzZ]","$","(li|il[$english])"),  // Apple < Appel
    array("lE","[bdfgkmnprsStvzZ]","","(li|il[$english]|lY[$german])"),  // Applebaum < Appelbaum
    
    array("au","","","(D|a|u)"),
    array("ou","","","(D|o|u)"),
    
    array("ai","","","(D|a|i)"),
    array("Ai","","","(D|a|i)"),
    array("oi","","","(D|o|i)"),
    array("Oi","","","(D|o|i)"),
    array("ui","","","(D|u|i)"),
    array("Ui","","","(D|u|i)"),
    array("ei","","","(D|i)"),
    array("Ei","","","(D|i)"),
    
    array("iA","","$","(ia|io)"), 
    array("iA","","","(ia|io|iY[$german])"), 
    array("A","","[^aeiouAEBFIOU]e","(a|o|Y[$german]|D[$english])"), // "plane"
        
    array("E","i[^aeiouAEIOU]","","(i|Y[$german]|[$english])"), // Wineberg (vineberg/vajneberg) --> vajnberg
    array("E","a[^aeiouAEIOU]","","(i|Y[$german]|[$english])"), //  Shaneberg (shaneberg/shejneberg) --> shejnberg
        
    array ("e", "", "[fklmnprstv]$", "i"),
    array ("e", "", "ts$", "i"),
    array ("e", "", "$", "i"),
    array ("e", "[DaoiuAOIUQY]", "", "i"),
    array ("e", "", "[aoAOQY]", "i"),
    array ("e", "", "", "(i|Y[$german])"),
    
    array ("E", "", "[fklmnprst]$", "i"),
    array ("E", "", "ts$", "i"),
    array ("E", "", "$", "i"),
    array ("E", "[DaoiuAOIUQY]", "", "i"),
    array ("E", "", "[aoAOQY]", "i"),
    array ("E", "", "", "(i|Y[$german])"),
        
    array ("a", "", "", "(a|o)"),
    
    array ("O", "", "[fklmnprstv]$", "o"),
    array ("O", "", "ts$", "o"),
    array ("O", "", "$", "o"),
    array ("O", "[oeiuQY]", "", "o"),
    array ("O", "", "", "(o|Y[$german])"),
    
    array ("A", "", "[fklmnprst]$", "(a|o)"),
    array ("A", "", "ts$", "(a|o)"),
    array ("A", "", "$", "(a|o)"),
    array ("A", "[oeiuQY]", "", "(a|o)"),
    array ("A", "", "", "(a|o|Y[$german])"),

    array ("U", "", "$", "u"),
    array ("U", "[DoiuQY]", "", "u"),
    array ("U", "", "[^k]$", "u"),
    array ("Uk", "[lr]", "$", "(uk|Qk[$german])"),
    array ("Uk", "", "$", "uk"),
  
    array ("sUts", "", "$", "(suts|sQts[$german])"),
    array ("Uts", "", "$", "uts"),
    array ("U", "", "", "(u|Q[$german])"), 
  
    array("approxany")
    
  );

  $approx[LanguageIndex("any", $languages)] = $approxAny;

?> 
