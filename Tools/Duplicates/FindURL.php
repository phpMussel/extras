<?php
$URL = array();
$URL['BasePath'] = '/location-of-vault-directory/signatures/';
$URL['Delimited'] = file($URL['BasePath'] . 'urlscanner.cvd');
$URL['Imploded'] = implode('', $URL['Delimited']);
$URL['Count'] = count($URL['Delimited']);

for ($URL['Iteration'] = 0; $URL['Iteration'] < $URL['Count']; $URL['Iteration']++) {
    $URL['Current_Line'] = substr($URL['Delimited'][$URL['Iteration']], 0, strrpos($URL['Delimited'][$URL['Iteration']], ':'));
    if (strlen($URL['Current_Line']) < 32) {
        continue;
    }
    if (substr_count($URL['Imploded'], $URL['Current_Line']) > 1) {
        echo $URL['Current_Line'].";\n";
    }
}

unset($URL);

echo "\n\nDone.";
