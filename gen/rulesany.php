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

  // format of each entry rule in the table
  //   (pattern, left context, right context, phonetic)
  // where
  //   pattern is a sequence of characters that might appear in the word to be transliterated
  //   left context is the context that precedes the pattern
  //   right context is the context that follows the pattern
  //   phonetic is the result that this rule generates
  //
  // note that both left context and right context can be regular expressions
  // ex: left context of ^ would mean start of word
  //     left context of [aeiouy] means following a vowel
  //     right context of [^aeiouy] means preceding a consonant
  //     right context of e$ means preceding a final e

//GENERIC
  $rulesAny = array(

// CONVERTING FEMININE TO MASCULINE
    array("yna","","$","(in[$russian]|ina)"), 
    array("ina","","$","(in[$russian]|ina)"), 
    array("liova","","$","(lova|lof[$russian]|lef[$russian])"),
    array("lova","","$","(lova|lof[$russian]|lef[$russian]|l[$czech]|el[$czech])"),   
    array("kova","","$","(kova|kof[$russian]|k[$czech]|ek[$czech])"),   
    array("ova","","$","(ova|of[$russian]|[$czech])"),   
    array("ová","","$","(ova|[$czech])"),   
    array("eva","","$","(eva|ef[$russian])"),   
    array("aia","","$","(aja|i[$russian])"),
    array("aja","","$","(aja|i[$russian])"), 
    array("aya","","$","(aja|i[$russian])"), 
    
    array("lowa","","$","(lova|lof[$polish]|l[$polish]|el[$polish])"),   
    array("kowa","","$","(kova|kof[$polish]|k[$polish]|ek[$polish])"),   
    array("owa","","$","(ova|of[$polish]|)"),   
    array("lowna","","$","(lovna|levna|l[$polish]|el[$polish])"), 
    array("kowna","","$","(kovna|k[$polish]|ek[$polish])"),  
    array("owna","","$","(ovna|[$polish])"),  
    array("lówna","","$","(l|el)"),  // polish
    array("kówna","","$","(k|ek)"),  // polish
    array("ówna","","$",""),         // polish
    array("á","","$","(a|i[$czech])"), 
    array("a","","$","(a|i[".($polish+$czech)."])"), 
    
// CONSONANTS
    array("pf","","","(pf|p|f)"), 
    array("que","","$","(k[$french]|ke|kve)"),
    array("qu","","","(kv|k)"), 
 
    array("m","","[bfpv]","(m|n)"), 
    array("m","[aeiouy]","[aeiouy]", "m"),  
    array("m","[aeiouy]","", "(m|n[".($french+$portuguese)."])"),  // nasal
 
    array("ly","","[au]","l"), 
    array("li","","[au]","l"), 
    array("lio","","","(lo|le[$russian])"), 
    array("lyo","","","(lo|le[$russian])"), 
  //array("ll","","","(l|J[$spanish])"),  // Disabled Argentinian rule
    array("lt","u","$","(lt|[$french])"), 
    
    array("v","^","","(v|f[$german]|b[$spanish])"), 

    array("ex","","[aáuiíoóeéêy]","(ez[$portuguese]|eS[$portuguese]|eks|egz)"), 
    array("ex","","[cs]","(e[$portuguese]|ek)"), 
    array("x","u","$","(ks|[$french])"), 
   
    array("ck","","","(k|tsk[".($polish+$czech)."])"),
    array("cz","","","(tS|tsz[$czech])"), // Polish
   
    //Proceccing of "h" in various combinations         
    array("rh","^","","r"),
    array("dh","^","","d"),
    array("bh","^","","b"),
     
    array("ph","","","(ph|f)"),
    array("kh","","","(x[".($russian+$english)."]|kh)"),  
  
    array("lh","","","(lh|l[$portuguese])"), 
    array("nh","","","(nh|nj[$portuguese])"), 
        
    array("ssch","","","S"),      // german
    array("chsch","","","xS"),    // german
    array("tsch","","","tS"),     // german 
    
    /// array("desch","^","","deS"), 
    /// array("desh","^","","(dES|de[$french])"), 
    /// array("des","^","[^aeiouy]","(dEs|de[$french])"), 
    
    array("sch","[aeiouy]","[ei]","(S|StS[$russian]|sk[".($romanian+$italian)."])"), 
    array("sch","[aeiouy]","","(S|StS[$russian])"), 
    array("sch","","[ei]","(sk[".($romanian+$italian)."]|S|StS[$russian])"),
    array("sch","","","(S|StS[$russian])"),
    array("ssh","","","S"), 
    
    array("sh","","[äöü]","sh"),      // german 
    array("sh","","[aeiou]","(S[".($russian+$english)."]|sh)"),
    array("sh","","","S"), 
 
    array("zh","","","(Z[".($english+$russian)."]|zh|tsh[$german])"), 
    
    array("chs","","","(ks[$german]|xs|tSs[".($russian+$english)."])"), 
    array("ch","","[ei]","(x|tS[".($spanish+$english+$russian)."]|k[".($romanian+$italian)."]|S[".($portuguese+$french)."])"), 
    array("ch","","","(x|tS[".($spanish+$english+$russian)."]|S[".($portuguese+$french)."])"),  
 
    array("th","^","","t"),     // english+german+greeklatin
    array("th","","[äöüaeiou]","(t[".($english+$german+$greeklatin)."]|th)"),
    array("th","","","t"),  // english+german+greeklatin
   
    array("gh","","[ei]","(g[".($romanian+$italian+$greeklatin)."]|gh)"), 
          
    array("ouh","","[aioe]","(v[$french]|uh)"),
    array("uh","","[aioe]","(v|uh)"), 
    array("h","","$",""), 
    array("h","[aeiouyäöü]","",""),  // $german
    array("h","^","","(h|x[".($romanian+$greeklatin)."]|H[".($english+$romanian+$polish+$french+$portuguese+$italian+$spanish)."])"), 
         
    //Processing of "ci", "ce" & "cy"
    array("cia","","","(tSa[$polish]|tsa)"),  // Polish
    array("cią","","[bp]","(tSom|tsom)"),     // Polish
    array("cią","","","(tSon[$polish]|tson)"), // Polish
    array("cię","","[bp]","(tSem[$polish]|tsem)"), // Polish
    array("cię","","","(tSen[$polish]|tsen)"), // Polish
    array("cie","","","(tSe[$polish]|tse)"),  // Polish
    array("cio","","","(tSo[$polish]|tso)"),  // Polish
    array("ciu","","","(tSu[$polish]|tsu)"), // Polish

    array("sci","","$","(Si[$italian]|stsi[".($polish+$czech)."]|dZi[$turkish]|tSi[".($polish+$romanian)."]|tS[$romanian]|si)"), 
    array("sc","","[ei]","(S[$italian]|sts[".($polish+$czech)."]|dZ[$turkish]|tS[".($polish+$romanian)."]|s)"), 
    array("ci","","$","(tsi[".($polish+$czech)."]|dZi[$turkish]|tSi[".($polish+$romanian)."]|tS[$romanian]|si)"), 
    array("cy","","","(si|tsi[$polish])"), 
    array("c","","[ei]","(ts[".($polish+$czech)."]|dZ[$turkish]|tS[".($polish+$romanian)."]|k[$greeklatin]|s)"), 
      
    //Processing of "s"      
    array("sç","","[aeiou]","(s|stS[$turkish])"),
    array("ssz","","","S"), // polish
    array("sz","^","","(S|s[$hungarian])"), // polish
    array("sz","","$","(S|s[$hungarian])"), // polish
    array("sz","","","(S|s[$hungarian]|sts[$german])"), // polish
    array("ssp","","","(Sp[$german]|sp)"),
    array("sp","","","(Sp[$german]|sp)"),
    array("sst","","","(St[$german]|st)"),
    array("st","","","(St[$german]|st)"), 
    array("ss","","","s"),
    array("sj","^","","S"), // dutch
    array("sj","","$","S"), // dutch
    array("sj","","","(sj|S[$dutch]|sx[$spanish]|sZ[".($romanian+$turkish)."])"), 
  
    array("sia","","","(Sa[$polish]|sa[$polish]|sja)"), 
    array("sią","","[bp]","(Som[$polish]|som)"), // polish
    array("sią","","","(Son[$polish]|son)"), // polish
    array("się","","[bp]","(Sem[$polish]|sem)"), // polish
    array("się","","","(Sen[$polish]|sen)"), // polish
    array("sie","","","(se|sje|Se[$polish]|zi[$german])"), 
    
    array("sio","","","(So[$polish]|so)"), 
    array("siu","","","(Su[$polish]|sju)"), 
     
    array("si","[äöëaáuiíoóeéêy]","","(Si[$polish]|si|zi[".($portuguese+$french+$italian+$german)."])"),
    array("si","","","(Si[$polish]|si|zi[$german])"),
    array("s","[aáuiíoóeéêy]","[aáuíoóeéêy]","(s|z[".($portuguese+$french+$italian+$german)."])"), 
    array("s","","[aeouäöë]","(s|z[$german])"),
    array("s","[aeiouy]","[dglmnrv]","(s|z|Z[$portuguese]|[$french])"), // Groslot
    array("s","","[dglmnrv]","(s|z|Z[$portuguese])"), 
                 
    //Processing of "g"   
    array("gue","","$","(k[$french]|gve)"),  // portuguese+spanish
    array("gu","","[ei]","(g[$french]|gv[".($portuguese+$spanish)."])"), // portuguese+spanish
    array("gu","","[ao]","gv"),     // portuguese+spanish
    array("guy","","","gi"),  // french
    
    array("gli","","","(glI|l[$italian])"), 
    array("gni","","","(gnI|ni[".($italian+$french)."])"),
    array("gn","","[aeou]","(n[".($italian+$french)."]|nj[".($italian+$french)."]|gn)"), 
    
    array("ggie","","","(je[$greeklatin]|dZe)"), // dZ is Italian
    array("ggi","","[aou]","(j[$greeklatin]|dZ)"), // dZ is Italian
        
    array("ggi","[yaeiou]","[aou]","(gI|dZ[$italian]|j[$greeklatin])"),  
    array("gge","[yaeiou]","","(gE|xe[$spanish]|gZe[".($portuguese+$french)."]|dZe[".($english+$romanian+$italian+$spanish)."]|je[$greeklatin])"), 
    array("ggi","[yaeiou]","","(gI|xi[$spanish]|gZi[".($portuguese+$french)."]|dZi[".($english+$romanian+$italian+$spanish)."]|i[$greeklatin])"), 
    array("ggi","","[aou]","(gI|dZ[$italian]|j[$greeklatin])"), 
    
    array("gie","","$","(ge|gi[$german]|ji[$french]|dZe[$italian])"), 
    array("gie","","","(ge|gi[$german]|dZe[$italian]|je[$greeklatin])"), 
    array("gi","","[aou]","(i[$greeklatin]|dZ)"), // dZ is Italian
        
    array("ge","[yaeiou]","","(gE|xe[$spanish]|Ze[".($portuguese+$french)."]|dZe[".($english+$romanian+$italian+$spanish)."])"), 
    array("gi","[yaeiou]","","(gI|xi[$spanish]|Zi[".($portuguese+$french)."]|dZi[".($english+$romanian+$italian+$spanish)."])"), 
    array("ge","","","(gE|xe[$spanish]|hE[$russian]|je[$greeklatin]|Ze[".($portuguese+$french)."]|dZe[".($english+$romanian+$italian+$spanish)."])"), 
    array("gi","","","(gI|xi[$spanish]|hI[$russian]|i[$greeklatin]|Zi[".($portuguese+$french)."]|dZi[".($english+$romanian+$italian+$spanish)."])"), 
    array("gy","","[aeouáéóúüöőű]","(gi|dj[$hungarian])"),
    array("gy","","","(gi|d[$hungarian])"), 
    array("g","[yaeiou]","[aouyei]","g"), 
    array("g","","[aouei]","(g|h[$russian])"), 
    
    //Processing of "j"        
    array("ij","","","(i|ej[$dutch]|ix[$spanish]|iZ[".($french+$romanian+$turkish+$portuguese)."])"), 
    array("j","","[aoeiuy]","(j|dZ[$english]|x[$spanish]|Z[".($french+$romanian+$turkish+$portuguese)."])"), 
         
    //Processing of "z"    
    array("rz","t","","(S[$polish]|r)"), // polish
    array("rz","","","(rz|rts[$german]|Z[$polish]|r[$polish]|rZ[$polish])"), 
        
    array("tz","","$","(ts|tS[".($english+$german)."])"), 
    array("tz","^","","(ts[".($english+$german+$russian)."]|tS[".($english+$german)."])"), 
    array("tz","","","(ts[".($english+$german+$russian)."]|tz)"), 
    
    array("zia","","[bcdgkpstwzż]","(Za[$polish]|za[$polish]|zja)"), 
    array("zia","","","(Za[$polish]|zja)"), 
    array("zią","","[bp]","(Zom[$polish]|zom)"),  // polish
    array("zią","","","(Zon[$polish]|zon)"), // polish
    array("zię","","[bp]","(Zem[$polish]|zem)"), // polish
    array("zię","","","(Zen[$polish]|zen)"), // polish
    array("zie","","[bcdgkpstwzż]","(Ze[$polish]|ze[$polish]|ze|tsi[$german])"), 
    array("zie","","","(ze|Ze[$polish]|tsi[$german])"), 
    array("zio","","","(Zo[$polish]|zo)"), 
    array("ziu","","","(Zu[$polish]|zju)"), 
    array("zi","","","(Zi[$polish]|zi|tsi[$german]|dzi[$italian]|tsi[$italian]|si[$spanish])"), 

    array("z","","$","(s|ts[$german]|ts[$italian]|S[$portuguese])"), // ts It, s/S/Z Port, s in Sp, z Fr
    array("z","","[bdgv]","(z|dz[$italian]|Z[$portuguese])"), // dz It, Z/z Port, z Sp & Fr
    array("z","","[ptckf]","(s|ts[$italian]|S[$portuguese])"), // ts It, s/S/z Port, z/s Sp
              
 // VOWELS  
    array("aue","","","aue"), 
    array("oue","","","(oue|ve[$french])"), 
    array("eau","","","o"), // French
        
    array("ae","","","(Y[$german]|aje[$russian]|ae)"), 
    array("ai","","","aj"), 
    array("au","","","(au|o[$french])"), 
    array("ay","","","aj"), 
    array("ão","","","(au|an)"), // Port
    array("ãe","","","(aj|an)"), // Port
    array("ãi","","","(aj|an)"), // Port
    array("ea","","","(ea|ja[$romanian])"),
    array("ee","","","(i[$english]|aje[$russian]|e)"), 
    array("ei","","","(aj|ej)"),
    array("eu","","","(eu|Yj[$german]|ej[$german]|oj[$german]|Y[$dutch])"),
    array("ey","","","(aj|ej)"),
    array("ia","","","ja"), 
    array("ie","","","(i[$german]|e[$polish]|ije[$russian]|Q[$dutch]|je)"), 
    array("ii","","$","i"), // russian
    array("io","","","(jo|e[$russian])"),
    array("iu","","","ju"), 
    array("iy","","$","i"), // russian
    array("oe","","","(Y[$german]|oje[$russian]|u[$dutch]|oe)"), 
    array("oi","","","oj"), 
    array("oo","","","(u[$english]|o)"), 
    array("ou","","","(ou|u[".($french+$greeklatin)."]|au[$dutch])"), 
    array("où","","","u"), // french
    array("oy","","","oj"), 
    array("õe","","","(oj|on)"), // Port
    array("ua","","","va"),
    array("ue","","","(Q[$german]|uje[$russian]|ve)"), 
    array("ui","","","(uj|vi|Y[$dutch])"), 
    array("uu","","","(u|Q[$dutch])"), 
    array("uo","","","(vo|o)"),
    array("uy","","","uj"), 
    array("ya","","","ja"), 
    array("ye","","","(je|ije[$russian])"),
    array("yi","^","","i"),
    array("yi","","$","i"), // russian
    array("yo","","","(jo|e[$russian])"),
    array("yu","","","ju"), 
    array("yy","","$","i"), // russian
    
    array("i","[áóéê]","","j"),
    array("y","[áóéê]","","j"),
         
    array("e","^","","(e|je[$russian])"), 
    array("e","","$","(e|EE[".($english+$french)."])"), 
            
// LANGUAGE SPECIFIC CHARACTERS 
    array("ą","","[bp]","om"), // polish
    array("ą","","","on"),  // polish
    array("ä","","","(Y|e)"), 
    array("á","","","a"), // Port & Sp
    array("à","","","a"), 
    array("â","","","a"), 
    array("ã","","","(a|an)"), // Port
    array("ă","","","(e[$romanian]|a)"), // romanian
    array("č","","", "tS"), // czech
    array("ć","","","(tS[$polish]|ts)"),  // polish
    array("ç","","","(s|tS[$turkish])"),
    array("ď","","","(d|dj[$czech])"),
    array("ę","","[bp]","em"), // polish
    array("ę","","","en"), // polish
    array("é","","","e"), 
    array("è","","","e"), 
    array("ê","","","e"), 
    array("ě","","","(e|je[$czech])"), 
    array("ğ","","",""), // turkish
    array("í","","","i"), 
    array("î","","","i"), 
    array("ı","","","(i|e[$turkish]|[$turkish])"), 
    array("ł","","","l"), 
    array("ń","","","(n|nj[$polish])"), // polish
    array("ñ","","","(n|nj[$spanish])"), 
    array("ó","","","(u[$polish]|o)"),  
    array("ô","","","o"), // Port & Fr
    array("õ","","","(o|on[$portuguese]|Y[$hungarian])"), 
    array("ò","","","o"),  // Sp & It
    array("ö","","","Y"),
    array("ř","","","(r|rZ[$czech])"),
    array("ś","","","(S[$polish]|s)"), 
    array("ş","","","S"), // romanian+turkish
    array("š","","", "S"), // czech
    array("ţ","","","ts"),  // romanian
    array("ť","","","(t|tj[$czech])"),
    array("ű","","","Q"), // hungarian
    array("ü","","","(Q|u[".($portuguese+$spanish)."])"),
    array("ú","","","u"), 
    array("ů","","","u"), // czech
    array("ù","","","u"), // french
    array("ý","","","i"),  // czech
    array("ż","","","Z"), // polish
    array("ź","","","(Z[$polish]|z)"), 
   
    array("ß","","","s"), // german
    array("'","","",""), // russian
    array('"',"","",""), // russian
 
    array("o","","[bcćdgklłmnńrsśtwzźż]","(O|P[$polish])"),    
    
 // LATIN ALPHABET
    array("a","","","A"),
    array("b","","","B"), 
    array("c","","","(k|ts[".($polish+$czech)."]|dZ[$turkish])"), 
    array("d","","","d"),
    array("e","","","E"),
    array("f","","","f"),
   //array("g","","","(g|x[$dutch])"), // Dutch sound disabled
    array("g","","","g"),
    array("h","","","(h|x[$romanian]|H[".($french+$portuguese+$italian+$spanish)."])"), 
    array("i","","","I"),
    array("j","","","(j|x[$spanish]|Z[".($french+$romanian+$turkish+$portuguese)."])"), 
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","O"),
    array("p","","","p"),
    array("q","","","k"),
    array("r","","","r"),
    array("s","","","(s|S[$portuguese])"), 
    array("t","","","t"),
    array("u","","","U"),
    array("v","","","V"), 
    array("w","","","(v|w[".($english+$dutch)."])"),     
    array("x","","","(ks|gz|S[".($portuguese+$spanish)."])"),   // S/ks Port & Sp, gz Sp, It only ks
    array("y","","","i"),
    array("z","","","(z|ts[$german]|dz[$italian]|ts[$italian]|s[$spanish])"), // ts/dz It, z Port & Fr, z/s Sp
     
    array("rulesany")
  );

  $rules[LanguageIndex("any", $languages)] = $rulesAny;
?> 
