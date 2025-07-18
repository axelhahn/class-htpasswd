<?php

/**
 * write a section header
 * @param string $sTitle  section title
 * @return void
 */
function section($sTitle){
    echo "
---> $sTitle".PHP_EOL;
}

// function checkResult($value, $OkValue, $message)
// {
//     section($message);
//     if ($value == $OkValue) {
//         echo "✅ $message".PHP_EOL;
//     } else {
//         echo "❌ $message".PHP_EOL;
//     }    
// }
