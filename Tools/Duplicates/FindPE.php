<?php
$PE = array();
$PE['BasePath'] = '/location-of-vault-directory/signatures/';
$PE['Mussel_Delimited'] = file($PE['BasePath'] . 'pe_mussel.cvd');
$PE['ClamAV_Delimited'] = file($PE['BasePath'] . 'pe_clamav.cvd');
$PE['Mussel_Imploded'] = implode('', $PE['Mussel_Delimited']);
$PE['ClamAV_Imploded'] = implode('', $PE['ClamAV_Delimited']);
$PE['Count'] = count($PE['Mussel_Delimited']);

for ($PE['Iteration'] = 0; $PE['Iteration'] < $PE['Count']; $PE['Iteration']++) {
    $PE['Current_Line'] = substr($PE['Mussel_Delimited'][$PE['Iteration']], 0, strrpos($PE['Mussel_Delimited'][$PE['Iteration']], ':'));
    if (strlen($PE['Current_Line']) < 32) {
        continue;
    }
    if (
        substr_count($PE['Mussel_Imploded'], $PE['Current_Line']) > 1 ||
        substr_count($PE['ClamAV_Imploded'], $PE['Current_Line']) > 1
    ) {
        echo $PE['Current_Line'].";\n";
    }
}

unset($PE);

echo "\n\nDone.";
