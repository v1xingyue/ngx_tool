<?php

function set($k,$v,$t){
	$l = strlen(serialize($v));
	$send = 'set ' . $k . ' 0 '  . $t . ' ' . $l . "\r\n";
	$send .= serialize($v) . "\r\n";
	echo send_memcached($send);
}

function get($k){
	$send = 'get ' . $k . "\r\n";
	$str = send_memcached($send);
	echo $str . "\n";
	//var_dump(unserialize($str));
}

$net_handle = fsockopen('localhost',11211);
set('A','Hello world', 100);
get('A');
fclose($net_handle);

function send_memcached($send){
	global $net_handle;
	if($net_handle){
		fwrite($net_handle,$send);
		$r = fread($net_handle,200) . "\n";
		return $r;
	}
}
