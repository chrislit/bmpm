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

  $rulesPolishdjskp = array(

// CONSONANTS
    array("cka","","$","tski"), // because in rulespolish all final ska --> ski
    array("ska","","$","ski"), // because in rulespolish all final ska --> ski
    
    array("x","","","ks"),
    
    array("cz","","","tS"),
    array("ch","","","x"),
    array("cia","","","(tSa|tsa)"), 
    array("cią","","[bp]","(tSom|tsom)"),
    array("cią","","","(tSon|tson)"),
    array("cię","","[bp]","(tSem|tsem)"),
    array("cię","","","(tSen|tsen)"),
    array("cie","","","(tSe|tse)"), 
    array("cio","","","(tSo|tso)"), 
    array("ciu","","","(tSu|tsu)"), 
    array("ci","","","(tSi|tsI)"),
    array("ć","","","(tS|ts)"),
    array("c_h","","","tsh"), // only in Beider's DJSKP
    array("c","","","ts"),
    
    array("ssz","","","S"),
    array("sz","","","S"),
    array("sia","","","(Sa|sja)"), 
    array("sią","","[bp]","(Som|som)"),
    array("sią","","","(Son|son)"),
    array("się","","[bp]","(Sem|sem)"),
    array("się","","","(Sen|sen)"),
    array("sie","","","(Se|se)"), 
    array("sio","","","(So|so)"), 
    array("siu","","","(Su|sju)"), 
    array("si","","","(Si|sI)"),
    array("ś","","","(S|s)"),
    
    array("zia","","","(Za|zja)"), 
    array("zią","","[bp]","(Zom|zom)"),
    array("zią","","","(Zon|zon)"),
    array("zię","","[bp]","(Zem|zem)"),
    array("zię","","","(Zen|zen)"),
    array("zie","","","(Ze|ze)"), 
    array("zio","","","(Zo|zo)"), 
    array("ziu","","","(Zu|zju)"), 
    array("zi","","","(Zi|zI)"),
    array("ż","","","Z"),
    array("ź","","","(Z|z)"),
    
    array("rz","t","","(S|r)"),
    array("rz","","","(Z|r|rZ)"),
    array("r_z","","","rz"), // only in Beider's DJSKP
    array("lio","","","(lo|le)"),
    array("ł","","","l"),
    array("ń","","","n"),
    array("w","","","v"),
    array("h","","","h"),
        
 // VOWELS   
    array("ó","","","(u|o)"),
    array("ą","","[bp]","om"),
    array("ę","","[bp]","em"),
    array("ą","","","on"),
    array("ę","","","en"),

    array("ije","","","je"),
    array("yje","","","je"),
    array("ij","","[aou]","j"),
    array("yj","","[aou]","j"),
    
    array("rie","","","rje"), 
    array("die","","","dje"), 
    array("tie","","","tje"), 
    array("ie","","","e"),
    
    array("ej","","","aj"),
    array("i","","[aou]","j"),
    
    array("aue","","","aue"),
    
    array("y","","","I"),
    array("e","","","E"),
    array("i","","","I"),
        
// TRIVIAL
    array("a","","","a"),
    array("b","","","b"),
    array("d","","","d"),
    array("f","","","f"),
    array("g","","","g"),
    array("j","","","j"),
    array("k","","","k"),
    array("l","","","l"),
    array("m","","","m"),
    array("n","","","n"),
    array("o","","","o"),
    array("p","","","p"),
    array("r","","","r"),
    array("s","","","s"),
    array("t","","","t"),
    array("u","","","u"),
    array("z","","","z")

  );

  $rules[LanguageIndex("polishdjskp", $languages)] = $rulesPolishdjskp;
?> 
