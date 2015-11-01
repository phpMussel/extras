<?php
/*
 Function for decoding phpMussel Quarantine Files (QFU).

  Sometimes it's necessary to decode a quarantined file, in order to analyse it
  more closely, such as if you suspect it's a false positive, want to share it
  with vendors or wish to analyse it for the purposes of refining signatures.

  This function will allow you to do so.

  Usage:

  phpMussel_Decode_Quarantined_File($filename,$key,$head=false);

  $filename (string, required) is the full path to the QFU file to be decoded,
  $key (string, required) is the original quarantine key used to encode the
  file (QFU files can't be decoded without knowing the quarantine key
  originally used to encode the files), and $head (boolean, optional) indicates
  whether to return only metadata about the file (the MD5 hash and the original
  size of the encoded file) or to return the actual content of the file.

  Output is returned as a string.

  WARNING: For your safety, if you decode quarantined files, I'd usually
  recommend only using this function inside some other encoding function, such
  as base64_encode() or bin2hex(); If a quarantined file is malicious and
  decoded into an unsecured environment, it could potentially execute under
  some circumstances and cause harm to your system.

*/

function phpMussel_Decode_Quarantined_File($filename,$key,$head=false)
	{
	if(!$dat=@file_get_contents($filename))return '';
	$o='';
	if($head)
		{
		$dat=@substr($dat,170,32);
		$o.='MD5: '.@bin2hex(substr($dat,11,16))."\n";
		$o.='Raw Filesize: '.@unpack('l*',substr($dat,27,4))[1]."\n";
		return $o;
		}
	if(!$c=strlen($dat=substr($dat,202)))return '';
	$o='';
	$i=0;
	$key=@hex2bin(hash('sha512',$key).hash('whirlpool',$key));
	$k=strlen($key);
	while($i<$c)for($j=0;$j<$k;$j++,$i++)$o.=@$dat{$i}^$key{$j};
	$o=@gzinflate($o);
	return $o;
	}

?>