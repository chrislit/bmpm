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

  $rulesRussiandjsre = array(
    array("tsya","","","tsa"), 
    array("tsyu","","","tsu"), 
    array("tsia","","","tsa"), 
    array("tsie","","","tse"), 
    array("tsio","","","tso"),   
    array("tsiu","","","tsu"), 
    array("sie","","","se"), 
    array("sio","","","so"),   
    array("zie","","","ze"), 
    array("zio","","","zo"),   
    
    array("gauz","","$","haus"), 
    array("gaus","","$","haus"), 
    array("gol'ts","","$","holts"), 
    array("gendler","","$","hendler"), 
    array("gejmer","","$","hajmer"), 
    array("gejm","","$","hajm"), 
    array("gof","","$","hof"), 
    array("gojf","","$","hojf"), 
    array("ger","","$","ger"), 
    array("gen","","$","gen"), 
    array("gin","","$","gin"), 
    array("gg","","","g"), 
    array("g","[jaeoiuy]","[aeoiu]","g"), 
    array("g","","[aeoiu]","(g|h)"), 
   
    array("kh","","","x"),
    array("ch","","","tS"), 
    array("ssh","","","S"),
    array("sh","","","S"),
    array("zh","","","Z"), 
    array("t_s","","","ts"), 
    array("s","","s",""),
    
    array("lya","","","la"), 
    array("lyu","","","lu"), 
    array("lej","","","laj"), 
    array("ley","","[au]","laj"),
    array("le","","","(lo|lE)"), 
    array("lio","","","(lo|le)"), 
    
    array("ije","","","je"),
    array("ie","","","je"),
    array("yje","","","je"),
    array("ye","","","je"),
    array("ij","","[aou]","j"),
    array("yj","","[aou]","j"),
 
    array("i","","[au]","j"),
    array("io","","","(jo|e)"), 
    array("y","","[au]","j"),
    array("yj","","$","i"), 
    array("ij","","$","i"), 
    
    array("ej","^","","(jaj|aj)"), 
    array("ej","","","aj"), 
    array("e","^","","je"), 
    array("ee","","","aje"), 
    array("e","[aou]","","je"), 
    
    array("èj","","","aj"), 
    array("è","","","E"), 
    array("y","","","I"),
    array("'","","",""), 
    array('"',"","",""), 
 
    array('ai',"","","aj"),   
    array('ei',"","","aj"), 
    array('ii',"","","i"), 
    array('oi',"","","oj"),  // Kikoin
    array('ui',"","","uj"),  
    
    array("aue","","","aue"),            
        
    array("a","","","a"),
    array("b","","","b"),
    array("d","","","d"),
    array("e","","","E"),
    array("f","","","f"),
    array("g","","","g"), 
    array("i","","","I"),
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
    array("v","","","v"),
    array("z","","","z")

  );

  $rules[LanguageIndex("russiandjsre", $languages)] = $rulesRussiandjsre;
?> 
