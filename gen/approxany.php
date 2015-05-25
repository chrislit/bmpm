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

// GENERIC
// A, E, I, O, P, U should create variants, but a, e, i, o, u should not create any new variant
// Q = ü ; Y = ä = ö
// EE = final "e" (english or french)

$approxAny = array(
// VOWELS
    // "ALL" DIPHTHONGS are interchangeable BETWEEN THEM and with monophthongs of which they are composed ("D" means "diphthong")
    //  {a,o} are totally interchangeable if non-stressed; in German "a/o" can actually be from "ä/ö" (that are equivalent to "e")
    //  {i,e} are interchangeable if non-stressed, while in German "u" can actually be from "ü" (that is equivalent to "i")

    array("mb","","","(mb|b[$greeklatin])"),
    array("mp","","","(mp|b[$greeklatin])"),
    array("ng","","","(ng|g[$greeklatin])"),

    array("B","","[fktSs]","(p|f[$spanish])"),
    array("B","","p",""),
    array("B","","$","(p|f[$spanish])"),
    array("V","","[pktSs]","(f|p[$spanish])"),
    array("V","","f",""),
    array("V","","$","(f|p[$spanish])"),
    
    array("B","","","(b|v[$spanish])"),
    array("V","","","(v|b[$spanish])"),
    
    // French word-final and word-part-final letters
    array("t","","$","(t|[$french])"),
    array("g","n","$","(g|[$french])"),
    array("k","n","$","(k|[$french])"),
    array("p","","$","(p|[$french])"), 
    array("r","[Ee]","$","(r|[$french])"), 
    array("s","","$","(s|[$french])"), 
    array("t","[aeiouAEIOU]","[^aeiouAEIOU]","(t|[$french])"), // Petitjean
    array("s","[aeiouAEIOU]","[^aeiouAEIOU]","(s|[$french])"), // Groslot, Grosleau
    //array("p","[aeiouAEIOU]","[^aeiouAEIOU]","(p|[$french])"), 
    
    array ("I", "[aeiouAEIBFOUQY]", "", "i"),
    array("I","","[^aeiouAEBFIOU]e","(Q[$german]|i|D[$english])"),  // "line"
    array ("I", "", "$", "i"),
    array ("I", "", "[^k]$", "i"),
    array ("Ik", "[lr]", "$", "(ik|Qk[$german])"),
    array ("Ik", "", "$", "ik"),
    array ("sIts", "", "$", "(sits|sQts[$german])"),
    array ("Its", "", "$", "its"),
    array ("I", "", "", "(Q[$german]|i)"),
   
    array("lEE","[bdfgkmnprsStvzZ]","","(li|il[$english])"),  // Apple = Appel
    array("rEE","[bdfgkmnprsStvzZ]","","(ri|ir[$english])"),  
    array("lE","[bdfgkmnprsStvzZ]","","(li|il[$english]|lY[$german])"),  // Applebaum < Appelbaum
    array("rE","[bdfgkmnprsStvzZ]","","(ri|ir[$english]|rY[$german])"),  
    
    array("EE","","","(i|)"), 
    
    array("ea","","","(D|a|i)"),
    
    array("au","","","(D|a|u)"),
    array("ou","","","(D|o|u)"),
    array("eu","","","(D|e|u)"),
    
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
    
    array ("E", "", "[fklmnprst]$", "i"),
    array ("E", "", "ts$", "i"),
    array ("E", "", "$", "i"),
    array ("E", "[DaoiuAOIUQY]", "", "i"),
    array ("E", "", "[aoAOQY]", "i"),
    array ("E", "", "", "(i|Y[$german])"),
        
    array ("P", "", "", "(o|u)"), 
    
    array ("O", "", "[fklmnprstv]$", "o"),
    array ("O", "", "ts$", "o"),
    array ("O", "", "$", "o"),
    array ("O", "[oeiuQY]", "", "o"),
    array ("O", "", "", "(o|Y[$german])"),
    array ("O", "", "", "o"),
    
    array ("A", "", "[fklmnprst]$", "(a|o)"),
    array ("A", "", "ts$", "(a|o)"),
    array ("A", "", "$", "(a|o)"),
    array ("A", "[oeiuQY]", "", "(a|o)"),
    array ("A", "", "", "(a|o|Y[$german])"),
    array ("A", "", "", "(a|o)"),

    array ("U", "", "$", "u"),
    array ("U", "[DoiuQY]", "", "u"),
    array ("U", "", "[^k]$", "u"),
    array ("Uk", "[lr]", "$", "(uk|Qk[$german])"),
    array ("Uk", "", "$", "uk"),
    array ("sUts", "", "$", "(suts|sQts[$german])"),
    array ("Uts", "", "$", "uts"),
    array ("U", "", "", "(u|Q[$german])"), 
    array ("U", "", "", "u"),

    array ("e", "", "[fklmnprstv]$", "i"),
    array ("e", "", "ts$", "i"),
    array ("e", "", "$", "i"),
    array ("e", "[DaoiuAOIUQY]", "", "i"),
    array ("e", "", "[aoAOQY]", "i"),
    array ("e", "", "", "(i|Y[$german])"),
        
    array ("a", "", "", "(a|o)"),
   
    array("approxany")
    
  );

  $approx[LanguageIndex("any", $languages)] = $approxAny;

?> 
