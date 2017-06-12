<?php
// https://yourUser:yourSecret@yoursite.net/path/to/file.php - use this URL for the webhook with basic auth

if (!file_exists("phpMussel") && !is_dir("phpMussel")) {
    exec("git clone https://github.com/phpMussel/phpMussel.git");
}

if ($_POST['payload']) {
    shell_exec("cd phpMussel && git reset --hard HEAD && git pull");
    
    // zip begin - added as reference, actually not used
    /*
    // config
    $file_remote = "https://github.com/phpMussel/phpMussel/archive/master.zip";
    $newfile = "phpmussel_src/master.zip";
    
    // step1: remove current src
    $dir = "phpMussel";
    if (is_dir($dir)) {
        $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($it,RecursiveIteratorIterator::CHILD_FIRST);
        foreach($files as $file) {
            if ($file->isDir()){rmdir($file->getRealPath());} 
                else {unlink($file->getRealPath());}
            }
        rmdir($dir);
    }
    
    // step2: download zip file
    copy($file_remote, $newfile);
    
    // step3: extract zip file
    if(file_exists($newfile)){
        $zip = new ZipArchive;
        $res = $zip->open($newfile);
        if ($res === TRUE) {
            $zip->extractTo(realpath(__DIR__)."/");
            $zip->close();
        }
        unlink($newfile);
        rename("phpMussel-master","phpMussel);
    }
    */
    // zip end
    
    $vault    = "phpMussel/vault/";
    $ini_file = "phpMussel/vault/phpmussel.ini";
    $inif     = file_get_contents($ini_file);
    $inif     = str_replace("cleanup=true", "cleanup=false", $inif);
    $inif     = str_replace("scan_cache_expiry=21600", "scan_cache_expiry=0", $inif);
    $inif     = str_replace("disable_cli=false", "disable_cli=true", $inif);
    file_put_contents($ini_file, $inif);
    chmod($vault, 0777);
    
    //alternatively, if needed, recursive chmod
    /*
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($pathname));
    foreach($iterator as $item) {
        chmod($item,$filemode);
    }
    */
    
}
