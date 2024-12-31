<?php

$strings = ["Hello", "World", "PHP", "Programming"];
foreach($strings as $index=>$myWord){
    
    $count = vCount($myWord);
    $reversedWord = strrev($myWord);
   
    echo "Original String: {$myWord}, Vowel Count: {$count}, Reversed String: {$reversedWord}";
    echo "<br>";
    
}

function vCount($x){
    $nw=0;
    for($i=0; $i<strlen($x);$i++){
        switch(substr(strtolower($x),$i,1)){
            case 'a':
                case 'e':
                    case 'i':
                        case 'o':
                            case 'u': $nw++;
        }
    }
    return $nw;
}
?>