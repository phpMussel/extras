<?php
/**
 * Function for decoding phpMussel Quarantine Files (QFU).
 *
 * Sometimes it's necessary to decode a quarantined file, in order to analyse
 * it more closely, such as if you suspect it's a false positive, want to share
 * it with vendors, or wish to analyse it for the purposes of refining
 * signatures. This function will allow you to do so.
 */

/**
 * phpMussel_Decode_Quarantined_File($filename, $key, $head = false);
 *
 * WARNING: For your safety, if you decode quarantined files, I'd usually
 * recommend only using this function inside some other encoding function, such
 * as base64_encode() or bin2hex(); If a quarantined file is malicious and
 * decoded into an unsecured environment, it could potentially execute under
 * some circumstances and cause harm to your system.
 *
 * @param string $filename is the full path to the QFU file to be decoded.
 * @param string $key is the original quarantine key used to encode the file
 *      (QFU files can't be decoded without knowing the quarantine key
 *      originally used to encode the files).
 * @param bool $head indicates whether to return only metadata about the file
 *      (the MD5 hash and the original size of the encoded file) or to return
 *      the actual content of the file (optional).
 * @return string The decoded QFU file contents.
 */
function phpMussel_Decode_Quarantined_File($filename, $key, $head = false) {
    if (!$dat = file_get_contents($filename)) {
        return '';
    }
    $HeadData = substr($dat, 170, 32);
    $FileSize = unpack('l*', substr($HeadData, 27, 4))[1];
    if ($head) {
        return 'MD5: ' . bin2hex(substr($HeadData, 11, 16)) . "\n" . 'Raw Filesize: ' . $FileSize . "\n";
    }
    if(!$c = strlen($dat = substr($dat, 202))) {
        return '';
    }
    if ($key < 128) {
        $key = hex2bin(hash('sha512', $key) . hash('whirlpool', $key));
    }
    $k = strlen($key);
    $o = '';
    $i = 0;
    while ($i < $c) {
        for ($j = 0; $j < $k; $j++, $i++) {
            if (strlen($o) >= $FileSize) {
                break 2;
            }
            $L = substr($dat, $i, 1);
            $R = substr($key, $j, 1);
            $o .= ($L === false ? "\x00" : $L) ^ ($R === false ? "\x00" : $R);
        }
    }
    $o = gzinflate($o);
    return $o;
}
