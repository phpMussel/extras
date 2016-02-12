<?php
$PEX = array();
$PEX['BasePath'] = '/location-of-vault-directory/signatures/';
$PEX['Delimited'] = file($PEX['BasePath'] . 'pex_mussel.cvd');
$PEX['Imploded'] = implode('', $PEX['Delimited']);
$PEX['Count'] = count($PEX['Delimited']);

for ($PEX['Iteration'] = 0; $PEX['Iteration'] < $PEX['Count']; $PEX['Iteration']++) {
    $PEX['Current_Line'] = substr($PEX['Delimited'][$PEX['Iteration']], 0, strrpos($PEX['Delimited'][$PEX['Iteration']], ':'));
    if (strlen($PEX['Current_Line']) < 32) {
        continue;
    }
    if (substr_count($PEX['Imploded'], $PEX['Current_Line']) > 1) {
        echo $PEX['Current_Line'].";\n";
    }
}

unset($PEX);

echo "\n\nDone.";
