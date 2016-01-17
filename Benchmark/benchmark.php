<?php
error_reporting(0);
include 'phpMussel/phpmussel.php'; // set cleanup=false, disable_cli=true and scan_cache_expiry=0 fur uncached results
echo phpMussel("phpMussel/_testfiles/ascii_standard_testfile.txt");
