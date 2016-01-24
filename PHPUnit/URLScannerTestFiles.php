<?php
$domain="kitdriver.com";
$string="Blah blah blah 123 \"http://{$domain}\" hello world.";

function encodeURI($url) {
    // http://php.net/manual/en/function.rawurlencode.php
    // https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/encodeURI
    $unescaped = array(
        '%2D'=>'-','%5F'=>'_','%2E'=>'.','%21'=>'!', '%7E'=>'~',
        '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')'
    );
    $reserved = array(
        '%3B'=>';','%2C'=>',','%2F'=>'/','%3F'=>'?','%3A'=>':',
        '%40'=>'@','%26'=>'&','%3D'=>'=','%2B'=>'+','%24'=>'$'
    );
    $score = array(
        '%23'=>'#'
    );
    return strtr(rawurlencode($url), array_merge($reserved,$unescaped,$score));

}

function escape($url) {
    // http://php.net/manual/en/function.rawurlencode.php
    // https://developer.mozilla.org/en/JavaScript/Reference/Global_Objects/encodeURI
    $unescaped = array(
        '%2D'=>'-','%5F'=>'_','%2E'=>'.','%21'=>'!', '%7E'=>'~',
        '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')'
    );
    $reserved = array(
        '%3B'=>';','%2C'=>',','%2F'=>'/','%3F'=>'?',
        '%40'=>'@','%26'=>'&','%3D'=>'=','%2B'=>'+','%24'=>'$'
    );
    $score = array(
        '%23'=>'#'
    );
    return strtr(rawurlencode($url), array_merge($reserved,$unescaped,$score));

}

function mres($value)
{
    $search = array("\\", "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");

    return str_replace($search, $replace, $value);
}

function javascriptEscape($value)
{
    $search = array("\\", "\x00", "\n",  "\r",  "'",  '"', "\x1a", "/");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z", "\/");

    return str_replace($search, $replace, $value);
}

function singleQuotes($value){
	return str_replace("\"", "'", $value);
}

function protocollLess($value){
    $search = array("https:", "http:", "ftp:");

    return str_replace($search, "", $value);
}

function lbr($value){
	$value = str_replace("://", "://\n", $value);
	return str_replace(".com", "\n.com", $value);
}

file_put_contents("urlencoded_2.txt", urlencode($string));
file_put_contents("urlencoded.txt", rawurlencode($string));
// file_put_contents("urlencoded.txt", encodeURI($string)); // Blah%20blah%20blah%20123%20%22http://kitdriver.com%22%20hello%20world.
file_put_contents("unicode.txt", escape($string));
file_put_contents("sql_escape.txt", mres($string));
file_put_contents("single_quotes.txt", singleQuotes($string));
file_put_contents("protocol_less.txt", protocollLess($string));
file_put_contents("javascript_escape.txt", javascriptEscape($string));
file_put_contents("normal.txt", $string);
file_put_contents("linebreaks.txt", lbr($string));
file_put_contents("html_escape.txt", htmlentities($string));
