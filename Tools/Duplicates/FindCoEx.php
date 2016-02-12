<?php
$CoEx = array();
$MD5['BasePath'] = '/location-of-vault-directory/signatures/';
$CoEx['Delimited'] = file($MD5['BasePath'] . 'coex_mussel.cvd');
$CoEx['Imploded'] = implode('', $CoEx['Delimited']);
$CoEx['Count'] = count($CoEx['Delimited']);
for ($CoEx['Iteration'] = 0; $CoEx['Iteration'] < $CoEx['Count']; $CoEx['Iteration']++) {
    $CoEx['Current_Line'] = @substr($CoEx['Delimited'][$CoEx['Iteration']], 0, strrpos($CoEx['Delimited'][$CoEx['Iteration']], ';'));
    if(strlen($CoEx['Current_Line']) < 32) {
        continue;
    }
    if(substr_count($CoEx['Imploded'], $CoEx['Current_Line']) > 1) {
        echo $CoEx['Current_Line'].";\n";
    }
}
unset($CoEx);
echo "\n\nDone.";
