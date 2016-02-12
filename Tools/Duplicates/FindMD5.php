<?php
$MD5 = array();
$MD5['BasePath'] = '/location-of-vault-directory/signatures/';
$MD5['Mussel_Delimited'] = file($MD5['BasePath'] . 'md5_mussel.cvd');
$MD5['ClamAV_Delimited'] = file($MD5['BasePath'] . 'md5_clamav.cvd');
$MD5['Mussel_Imploded'] = implode('', $MD5['Mussel_Delimited']);
$MD5['ClamAV_Imploded'] = implode('', $MD5['ClamAV_Delimited']);
$MD5['Count'] = count($MD5['Mussel_Delimited']);

for ($MD5['Iteration'] = 0; $MD5['Iteration'] < $MD5['Count']; $MD5['Iteration']++) {
    $MD5['Current_Line'] = substr($MD5['Mussel_Delimited'][$MD5['Iteration']], 0, strrpos($MD5['Mussel_Delimited'][$MD5['Iteration']], ':'));
    if (strlen($MD5['Current_Line']) < 32) {
        continue;
    }
    if (
        substr_count($MD5['Mussel_Imploded'], $MD5['Current_Line']) > 1 ||
        substr_count($MD5['ClamAV_Imploded'], $MD5['Current_Line']) > 1
    ) {
        echo $MD5['Current_Line'].";\n";
    }
}

unset($MD5);

echo "\n\nDone.";
