<?php

function dec2string ($decimal, $base) 
{
    global $error; 
    $string = null; 
// The next step is to make sure that the base number is valid. Note that this value can be any number between 2 and 36.

    $base = (int)$base; 
    if ($base < 2 | $base > 62 | $base == 10) { 
       echo 'BASE must be in the range 2-9 or 11-36'; 
       exit; 
    } // if; 
// Next we set up the list of possible output characters, then chop off any characters beyond the limit specified by $base.

    $charset = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
    $charset = substr($charset, 0, $base); 
// Here we are checking that the input value is acceptable - a positive integer between 1 and 16 digits long.

    if (!preg_match('(^[0-9]{1,16}$)', trim($decimal))) {
       $error['dec_input'] = 'Value must be a positive integer'; 
       return false; 
    } // if
    $decimal = (int)$decimal;  
// Here we are starting what is known as a do loop.

    do {
// Step 1 inside the loop is to get the remainder after dividing $decimal by $base.

       $remainder = ($decimal % $base); 
// Step 2 is to extract the character that corresponds to this remainder and add it to the front of the output string.

       $char   = substr($charset, $remainder, 1); 
       $string = "$char$string"; 
// Step 3 is to reduce the decimal value by the number we have just processed. This is done by subtracting $remainder then dividing by $base.

       $decimal   = ($decimal - $remainder) / $base; 
// This terminates the do loop when the input value has been reduced to zero.

    } while ($decimal > 0); 
// The function ends by passing back the completed string value to the calling process.

    return $string; 

} // dec2string 

function string2dec ($string, $base) 
{
    global $error; 
    $decimal = 0; 
// The next step is to make sure that the base number is valid. Note that this value can be any number between 2 and 36.

    $base = (int)$base; 
    if ($base < 2 | $base > 62 | $base == 10) { 
       echo 'BASE must be in the range 2-9 or 11-36'; 
       exit; 
    } // if; 
// Next we set up the list of possible output characters, then chop off any characters beyond the limit specified by $base.

    $charset = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; 
    $charset = substr($charset, 0, $base); 
// Here we are just checking that the input string is not empty.

    $string = trim($string);
    if (empty($string)) { 
       $error[] = 'Input string is empty'; 
       return false; 
    } // if 
// Here we start a do loop to process every character in the input string.

    do {
// Next we extract the first character from the input string, then remove it from the string.

       $char   = substr($string, 0, 1); 
       $string = substr($string, 1); 
// Here we obtain the position of $char in $charset.

       $pos = strpos($charset, $char); 
       if ($pos === false) { 
          $error[] = "Illegal character ($char) in INPUT string"; 
          return false; 
       } // if 
// Here we increment the decimal value by the value of the character we have just extracted from the input string.

       $decimal = ($decimal * $base) + $pos; 
// Finally we can terminate the do loop and return the decimal value to the calling process.

    } while($string <> null); 
 
    return $decimal; 
     
} // string2dec 
?>