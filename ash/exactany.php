<?php

  // These rules are applied after the word has been transliterated into the phonetic alphabet
  // These rules are substitution rules within the phonetic character space rather than mapping rules
  
  // format of each entry rule in the table
  //   (pattern, left context, right context, phonetic)
  // where
  //   pattern is a sequence of characters that might appear after a word has been transliterated into phonetic alphabet
  //   left context is the context that precedes the pattern
  //   right context is the context that follows the pattern
  //   phonetic is the result that this rule generates
  //
  // note that both left context and right context can be regular expressions
  // ex: left context of ^ would mean start of word
  //     right context of $ means end of word
  //
  // match occurs if all of the following are true:
  //   portion of word matches the pattern
  //   that portion satisfies the context

// A, E, I, O, P, U should create variants, but a, e, i, o, u should not create any new variant
// Q = ü ; Y = ä = ö


  $exactAny = array(
    array ("A", "", "", "a"),
    array ("B", "", "", "a"),
        
    array ("E", "", "", "e"),
    array ("F", "", "", "e"),
    
    array ("I", "", "", "i"),
    array ("O", "", "", "o"),
    array ("P", "", "", "o"),
    array ("U", "", "", "u"),
    
    array ("J", "", "", "l"),
    
    array("exactany")
      
  );

  $exact[LanguageIndex("any", $languages)] = $exactAny;

?> 
