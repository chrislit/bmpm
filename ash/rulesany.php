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

//ASHKENAZIC
  $rulesAny = array(

// CONVERTING FEMININE TO MASCULINE
    array("yna","","$","(in[$russian]|ina)"), 
    array("ina","","$","(in[$russian]|ina)"), 
    array("liova","","$","(lof[$russian]|lef[$russian]|lova)"),
    array("lova","","$","(lof[$russian]|lef[$russian]|lova)"),
    array("ova","","$","(of[$russian]|ova)"), 
    array("eva","","$","(ef[$russian]|eva)"),
    array("aia","","$","(aja|i[$russian])"),
    array("aja","","$","(aja|i[$russian])"), 
    array("aya","","$","(aja|i[$russian])"), 
    
    array("lowa","","$","(lova|lof[$polish]|l[$polish]|el[$polish])"),   
    array("kowa","","$","(kova|kof[$polish]|k[$polish]|ek[$polish])"),   
    array("owa","","$","(ova|of[$polish]|)"),   
    array("lowna","","$","(lovna|levna|l[$polish]|el[$polish])"), 
    array("kowna","","$","(kovna|k[$polish]|ek[$polish])"),  
    array("owna","","$","(ovna|[$polish])"),  
    array("lówna","","$","(l|el[$polish])"),  // polish
    array("kówna","","$","(k|ek[$polish])"),  // polish
    array("ówna","","$",""),   // polish
    
    array("a","","$","(a|i[$polish])"), 
    
// CONSONANTS  (integrated: German, Polish, Russian, Romanian and English)

    array("rh","^","","r"),
    array("ssch","","","S"), 
    array("chsch","","","xS"), 
    array("tsch","","","tS"), 
    
    array("sch","","[ei]","(sk[$romanian]|S|StS[$russian])"), // german
    array("sch","","","(S|StS[$russian])"), // german
            
    array("ssh","","","S"), 
    
    array("sh","","[äöü]","sh"), // german
    array("sh","","[aeiou]","(S[".($russian+$english)."]|sh)"),
    array("sh","","","S"), // russian+english
    
    array("kh","","","(x[".($russian+$english)."]|kh)"),  
    
    array("chs","","","(ks[$german]|xs|tSs[".($russian+$english)."])"), 
    
    // French "ch" is currently disabled
    //array("ch","","[ei]","(x|tS|k[$romanian]|S[$french])"), 
    //array("ch","","","(x|tS[".($russian+$english)."]|S[$french])"), 
    
    array("ch","","[ei]","(x|k[$romanian]|tS[".($russian+$english)."])"),
    array("ch","","","(x|tS[".($russian+$english)."])"), 
        
    array("ck","","","(k|tsk[$polish])"),
        
    array("czy","","","tSi"),
    array("cze","","[bcdgkpstwzż]","(tSe|tSF)"),
    array("ciewicz","","","(tsevitS|tSevitS)"),
    array("siewicz","","","(sevitS|SevitS)"),
    array("ziewicz","","","(zevitS|ZevitS)"),
    array("riewicz","","","rjevitS"), 
    array("diewicz","","","djevitS"), 
    array("tiewicz","","","tjevitS"), 
    array("iewicz","","","evitS"),
    array("ewicz","","","evitS"),
    array("owicz","","","ovitS"),
    array("icz","","","itS"),
    array("cz","","","tS"), // Polish
    
    array("cia","","[bcdgkpstwzż]","(tSB[$polish]|tsB)"), 
    array("cia","","","(tSa[$polish]|tsa)"), 
    array("cią","","[bp]","(tSom[$polish]|tsom)"),
    array("cią","","","(tSon[$polish]|tson)"),
    array("cię","","[bp]","(tSem[$polish]|tsem)"),
    array("cię","","","(tSen[$polish]|tsen)"),
    array("cie","","[bcdgkpstwzż]","(tSF[$polish]|tsF)"), 
    array("cie","","","(tSe[$polish]|tse)"), 
    array("cio","","","(tSo[$polish]|tso)"), 
    array("ciu","","","(tSu[$polish]|tsu)"), 

    array("ci","","$","(tsi[$polish]|tSi[".($polish+$romanian)."]|tS[$romanian]|si)"), 
    array("ci","","","(tsi[$polish]|tSi[".($polish+$romanian)."]|si)"), 
    array("ce","","[bcdgkpstwzż]","(tsF[$polish]|tSe[".($polish+$romanian)."]|se)"), 
    array("ce","","","(tSe[".($polish+$romanian)."]|tse[$polish]|se)"), 
    array("cy","","","(si|tsi[$polish])"), 
              
    array("ssz","","","S"), // Polish
    array("sz","","","S"), // Polish; actually could also be Hungarian /s/, disabled here 
    
    array("ssp","","","(Sp[$german]|sp)"),
    array("sp","","","(Sp[$german]|sp)"),
    array("sst","","","(St[$german]|st)"),
    array("st","","","(St[$german]|st)"), 
    array("ss","","","s"), 
    
    array("sia","","[bcdgkpstwzż]","(SB[$polish]|sB[$polish]|sja)"), 
    array("sia","","","(Sa[$polish]|sja)"), 
    array("sią","","[bp]","(Som[$polish]|som)"),
    array("sią","","","(Son[$polish]|son)"),
    array("się","","[bp]","(Sem[$polish]|sem)"),
    array("się","","","(Sen[$polish]|sen)"),
    array("sie","","[bcdgkpstwzż]","(SF[$polish]|sF|zi[$german])"), 
    array("sie","","","(se|Se[$polish]|zi[$german])"), 
    array("sio","","","(So[$polish]|so)"), 
    array("siu","","","(Su[$polish]|sju)"), 
    array("si","","","(Si[$polish]|si|zi[$german])"),
    array("s","","[aeiouäöü]","(s|z[$german])"),
        
    array("gue","","","ge"), 
    array("gui","","","gi"), 
    array("guy","","","gi"), 
    array("gh","","[ei]","(g[$romanian]|gh)"), 
    
    array("gauz","","$","haus"), 
    array("gaus","","$","haus"), 
    array("gol'ts","","$","holts"), 
    array("golts","","$","holts"), 
    array("gol'tz","","$","holts"), 
    array("goltz","","","holts"), 
    array("gol'ts","^","","holts"), 
    array("golts","^","","holts"), 
    array("gol'tz","^","","holts"), 
    array("goltz","^","","holts"), 
    array("gendler","","$","hendler"), 
    array("gejmer","","$","hajmer"), 
    array("gejm","","$","hajm"), 
    array("geymer","","$","hajmer"), 
    array("geym","","$","hajm"), 
    array("geimer","","$","hajmer"), 
    array("geim","","$","hajm"), 
    array("gof","","$","hof"), 
    
    array("ger","","$","ger"), 
    array("gen","","$","gen"), 
    array("gin","","$","gin"), 
    
    array("gie","","$","(ge|gi[$german]|ji[$french])"), 
    array("gie","","","ge"), 
    array("ge","[yaeiou]","","(gE|xe[$spanish]|dZe[".($english+$romanian)."])"), 
    array("gi","[yaeiou]","","(gI|xi[$spanish]|dZi[".($english+$romanian)."])"), 
    array("ge","","","(gE|dZe[".($english+$romanian)."]|hE[$russian]|xe[$spanish])"), 
    array("gi","","","(gI|dZi[".($english+$romanian)."]|hI[$russian]|xi[$spanish])"), 
    array("gy","","[aeouáéóúüöőű]","(gi|dj[$hungarian])"),
    array("gy","","","(gi|d[$hungarian])"), 
    array("g","[jyaeiou]","[aouyei]","g"), 
    array("g","","[aouei]","(g|h[$russian])"), 
              
    array("ej","","","(aj|eZ[".($french+$romanian)."]|ex[$spanish])"),
    array("ej","","","aj"),
    
    array("ly","","[au]","l"), 
    array("li","","[au]","l"), 
    array("lj","","[au]","l"), 
    array("lio","","","(lo|le[$russian])"), 
    array("lyo","","","(lo|le[$russian])"), 
    array("ll","","","(l|J[$spanish])"), 
  
    array("j","","[aoeiuy]","(j|dZ[$english]|x[$spanish]|Z[".($french+$romanian)."])"), 
    array("j","","","(j|x[$spanish])"), 
                       
    array("pf","","","(pf|p|f)"), 
    array("ph","","","(ph|f)"),
    
    array("qu","","","(kv[$german]|k)"), 
        
    array("rze","t","","(Se[$polish]|re)"), // polish
    array("rze","","","(rze|rtsE[$german]|Ze[$polish]|re[$polish]|rZe[$polish])"), 
    array("rzy","t","","(Si[$polish]|ri)"), // polish
    array("rzy","","","(Zi[$polish]|ri[$polish]|rZi)"),
    array("rz","t","","(S[$polish]|r)"), // polish
    array("rz","","","(rz|rts[$german]|Z[$polish]|r[$polish]|rZ[$polish])"), // polish
    
    array("tz","","$","(ts|tS[".($english+$german)."])"), 
    array("tz","^","","(ts|tS[".($english+$german)."])"), 
    array("tz","","","(ts[".($english+$german+$russian)."]|tz)"), 
    
    array("zh","","","(Z|zh[$polish]|tsh[$german])"), 
        
    array("zia","","[bcdgkpstwzż]","(ZB[$polish]|zB[$polish]|zja)"), 
    array("zia","","","(Za[$polish]|zja)"), 
    array("zią","","[bp]","(Zom[$polish]|zom)"),
    array("zią","","","(Zon[$polish]|zon)"),
    array("zię","","[bp]","(Zem[$polish]|zem)"),
    array("zię","","","(Zen[$polish]|zen)"),
    array("zie","","[bcdgkpstwzż]","(ZF[$polish]|zF[$polish]|ze|tsi[$german])"), 
    array("zie","","","(ze|Ze[$polish]|tsi[$german])"), 
    array("zio","","","(Zo[$polish]|zo)"), 
    array("ziu","","","(Zu[$polish]|zju)"), 
    array("zi","","","(Zi[$polish]|zi|tsi[$german])"), 
            
    array("thal","","$","tal"), 
    array("th","^","","t"), 
    array("th","","[aeiou]","(t[$german]|th)"),
    array("th","","","t"), // german 
    array("vogel","","","(vogel|fogel[$german])"), 
    array("v","^","","(v|f[$german])"), 
        
    array("h","[aeiouyäöü]","",""), //german
    array("h","","","(h|x[".($romanian+$polish)."])"), 
    array("h","^","","(h|H[".($english+$german)."])"), // H can be exact "h" or approximate "kh"
    
 // VOWELS  
    array("yi","^","","i"),
    
    // array("e","","$","(e|)"),  // French & English rule disabled except for final -ine
    array("e","in","$","(e|[$french])"), 
    
    array("ii","","$","i"), // russian
    array("iy","","$","i"), // russian
    array("yy","","$","i"), // russian
    array("yi","","$","i"), // russian
    array("yj","","$","i"), // russian
    array("ij","","$","i"), // russian
    
    array("aue","","","aue"), 
    array("oue","","","oue"), 
    
    array("au","","","(au|o[$french])"), 
    array("ou","","","(ou|u[$french])"), 
        
    array("ue","","","(Q|uje[$russian])"), 
    array("ae","","","(Y[$german]|aje[$russian]|ae)"), 
    array("oe","","","(Y[$german]|oje[$russian]|oe)"), 
    array("ee","","","(i[$english]|aje[$russian]|e)"), 
    
    array("ei","","","aj"),
    array("ey","","","aj"),
    array("eu","","","(aj[$german]|oj[$german]|eu)"),
    
    array("i","[aou]","","j"),
    array("y","[aou]","","j"),
    
    array("ie","","[bcdgkpstwzż]","(i[$german]|e[$polish]|ije[$russian]|je)"), 
    array("ie","","","(i[$german]|e[$polish]|ije[$russian]|je)"), 
    array("ye","","","(je|ije[$russian])"),
         
    array("i","","[au]","j"),
    array("y","","[au]","j"),
    array("io","","","(jo|e[$russian])"),
    array("yo","","","(jo|e[$russian])"),
            
    array("ea","","","(ea|ja[$romanian])"),
    array("e","^","","(e|je[$russian])"), 
    array("oo","","","(u[$english]|o)"), 
    array("uu","","","u"), 
    
// LANGUAGE SPECIFIC CHARACTERS 
    array("ć","","","(tS[$polish]|ts)"),  // polish
    array("ł","","","l"),  // polish
    array("ń","","","n"),  // polish
    array("ñ","","","(n|nj[$spanish])"), 
    array("ś","","","(S[$polish]|s)"), // polish
    array("ş","","","S"),  // romanian
    array("ţ","","","ts"),  // romanian
    array("ż","","","Z"),  // polish
    array("ź","","","(Z[$polish]|z)"), // polish 

    array("où","","","u"), // french
    
    array("ą","","[bp]","om"),  // polish
    array("ą","","","on"),  // polish
    array("ä","","","(Y|e)"),  // german
    array("á","","","a"), // hungarian
    array("ă","","","(e[$romanian]|a)"), //romanian
    array("à","","","a"),  // french
    array("â","","","a"), //french+romanian
    array("é","","","e"), 
    array("è","","","e"), // french
    array("ê","","","e"), // french
    array("ę","","[bp]","em"),  // polish
    array("ę","","","en"),  // polish
    array("í","","","i"), 
    array("î","","","i"), 
    array("ö","","","Y"),
    array("ő","","","Y"), // hungarian
    array("ó","","","(u[$polish]|o)"),  
    array("ű","","","Q"), 
    array("ü","","","Q"),
    array("ú","","","u"), 
    array("ű","","","Q"), // hungarian
  
    array("ß","","","s"),  // german
    array("'","","",""), 
    array('"',"","",""), 
       
    array("a","","[bcdgkpstwzż]","(A|B[$polish])"),
    array("e","","[bcdgkpstwzż]","(E|F[$polish])"),
    array("o","","[bcćdgklłmnńrsśtwzźż]","(O|P[$polish])"), 
  
  // LATIN ALPHABET
    array("a","","","A"),
    array("b","","","b"),
    array("c","","","(k|ts[$polish])"), 
    array("d","","","d"),
    array("e","","","E"),  
    array("f","","","f"),
    array("g","","","g"),
    array("h","","","h"), 
    array("i","","","I"),
    array("j","","","j"),
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","O"),
    array("p","","","p"),
    array("q","","","k"),
    array("r","","","r"),
    array("s","","","s"),
    array("t","","","t"),
    array("u","","","U"),
    array("v","","","v"),
    array("w","","","v"), // English disabled
    array("x","","","ks"), 
    array("y","","","i"),
    array("z","","","(ts[$german]|z)"),
        
    array("rulesany")
  );

  $rules[LanguageIndex("any", $languages)] = $rulesAny;
?> 
