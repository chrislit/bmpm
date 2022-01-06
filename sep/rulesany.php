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

// SEPHARDIC: INCORPORATES Portuguese + Italian + Spanish(+Catalan) + French
  $rulesAny = array(
// CONSONANTS
    array("ph","","","f"), // foreign
    array("sh","","","S"), // foreign
    array("kh","","","x"), // foreign
    
    array("gli","","","(gli|l[$italian])"), 
    array("gni","","","(gni|ni[".($italian+$french)."])"),
    array("gn","","[aeou]","(n[".($italian+$french)."]|nj[".($italian+$french)."]|gn)"), 
    array("gh","","","(g|gh)"), // It + translit. from Arabic
    array("dh","","","(d|dh)"), // translit. from Arabic
    array("bh","","","(b|bh)"), // translit. from Arabic
    array("th","","","(t|th)"), // translit. from Arabic
    array("lh","","","(l[$portuguese]|lh)"), 
    array("nh","","","(n[$portuguese]|nh)"), 
          
    array("ig","[aeiou]","","(ig|tS[$spanish])"),
    array("ix","[aeiou]","","S"), // Sp
    array("tx","","","tS"), // Sp
    array("tj","","$","tS"), // Sp
    array("tj","","","dZ"), // Sp
    array("tg","","","(tg|dZ[$spanish])"),
               
    array("gi","","[aeou]","dZ"), // italian
    array("g","","y","Z"), // french
    array("gg","","[ei]","(gZ[".($portuguese+$french)."]|dZ[".($italian+$spanish)."]|x[$spanish])"), 
    array("g","","[ei]","(Z[".($portuguese+$french)."]|dZ[".($italian+$spanish)."]|x[$spanish])"), 
         
    array("guy","","","gi"),     
    array("gue","","$","(k[$french]|ge)"),
    array("gu","","[ei]","(g|gv)"),     // not It
    array("gu","","[ao]","gv"),  // not It  
   
    array("ñ","","","(n|nj)"), 
    array("ny","","","nj"), 
    
    array("sc","","[ei]","(s|S[$italian])"), 
    array("sç","","[aeiou]","s"), // not It
    array("ss","","","s"),
    array("ç","","","s"),   // not It
        
    array("ch","","[ei]","(k[$italian]|S[".($portuguese+$french)."]|tS[$spanish]|dZ[$spanish])"), 
    array("ch","","","(S|tS[$spanish]|dZ[$spanish])"), 
    
    array("ci","","[aeou]","(tS[$italian]|si)"), 
    array("cc","","[eiyéèê]","(tS[$italian]|ks[".($portuguese+$french+$spanish)."])"), 
    array("c","","[eiyéèê]","(tS[$italian]|s[".($portuguese+$french+$spanish)."])"), 
   //array("c","","[aou]","(k|C[".($portuguese+$spanish)."])"), // "C" means that the actual letter could be "ç" (cedille omitted)
        
    array("s","^","","s"),
    array("s","[aáuiíoóeéêy]","[aáuiíoóeéêy]","(s[$spanish]|z[".($portuguese+$french+$italian)."])"), 
    array("s","","[dglmnrv]","(z|s|Z[$portuguese])"), 
            
    array("z","","$","(s|ts[$italian]|S[$portuguese])"), // ts It, s/S/Z Port, s in Sp, z Fr
    array("z","","[bdgv]","(z|dz[$italian]|Z[$portuguese])"), // dz It, Z/z Port, z Sp & Fr
    array("z","","[ptckf]","(s|ts[$italian]|S[$portuguese])"), // ts It, s/S/z Port, z/s Sp
    array("z","","","(z|dz[$italian]|ts[$italian]|s[$spanish])"), // ts/dz It, z Port & Fr, z/s Sp
    
    array("que","","$","(k[$french]|ke)"),
    array("qu","","[eiu]","k"),    
    array("qu","","[ao]","(kv|k)"), // k is It   
        
    array("ex","","[aáuiíoóeéêy]","(ez[$portuguese]|eS[$portuguese]|eks|egz)"), 
    array("ex","","[cs]","(e[$portuguese]|ek)"), 
                
    array("m","","[cdglnrst]","(m|n[$portuguese])"), 
    array("m","","[bfpv]","(m|n[".($portuguese+$spanish)."])"), 
    array("m","","$","(m|n[$portuguese])"), 
    
    array("b","^","","(b|V[$spanish])"), 
    array("v","^","","(v|B[$spanish])"), 
        
 // VOWELS   
    array("eau","","","o"), // Fr
    
    array("ouh","","[aioe]","(v[$french]|uh)"),
    array("uh","","[aioe]","(v|uh)"),
    array("ou","","[aioe]","v"), // french
    array("uo","","","(vo|o)"),
    array("u","","[aie]","v"),
    
    array("i","[aáuoóeéê]","","j"),
    array("i","","[aeou]","j"),
    array("y","[aáuiíoóeéê]","","j"),
    array("y","","[aeiíou]","j"),
    // array("e","","$","(e|E[$french])"),
    array("e","","$","(e|[$french])"),
           
    array("ão","","","(au|an)"), // Port
    array("ãe","","","(aj|an)"), // Port
    array("ãi","","","(aj|an)"), // Port
    array("õe","","","(oj|on)"), // Port
    array("où","","","u"), // Fr
    array("ou","","","(ou|u[$french])"), 
        
    array("â","","","a"), // Port & Fr
    array("à","","","a"), // Port 
    array("á","","","a"), // Port & Sp
    array("ã","","","(a|an)"), // Port
    array("é","","","e"), 
    array("ê","","","e"), // Port & Fr
    array("è","","","e"), // Sp & Fr & It
    array("í","","","i"), // Port & Sp
    array("î","","","i"), // Fr
    array("ô","","","o"), // Port & Fr
    array("ó","","","o"), // Port & Sp & It
    array("õ","","","(o|on)"), // Port
    array("ò","","","o"),  // Sp & It
    array("ú","","","u"), // Port & Sp
    array("ü","","","u"), // Port & Sp
   
 // LATIN ALPHABET     
    array("a","","","a"),
    array("b","","","(b|v[$spanish])"), 
    array("c","","","k"),
    array("d","","","d"),
    array("e","","","e"),
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","h"), 
    array("i","","","i"),
    array("j","","","(x[$spanish]|Z)"), // not It
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","o"),
    array("p","","","p"),
    array("q","","","k"),    
    array("r","","","r"),
    array("s","","","(s|S[$portuguese])"), 
    array("t","","","t"),
    array("u","","","u"),
    array("v","","","(v|b[$spanish])"), 
    array("w","","","v"),    // foreign
    array("x","","","(ks|gz|S[".($portuguese+$spanish)."])"),   // S/ks Port & Sp, gz Sp, It only ks
    array("y","","","i"),   
    array("z","","","z"),
    
    array("rulesany")
  );

  $rules[LanguageIndex("any", $languages)] = $rulesAny;
?> 
