<?php

class env

{

public static $IP;

public static $MAC;

//get ip

public function getIP()

{

env::$IP = $_SERVER['REMOTE_ADDR'];

}

//get mac

public function getMAC($ip)

{

$macCommandString	=	"arp $ip | awk 'BEGIN{ i=1; } { i++; if(i==3) print $3 }'";	// awk command to crawl mac from string

$mac = exec($macCommandString);

env::$MAC =	$mac;

}

//constructor codes

function __construct()

{

$this->getIP();

$this->getMAC(env::$IP);

}

}

//test . creating object

$envObj = new env();

//print mac of user

                        echo "mac: ".env::$MAC;

//print ip of user

                            echo "IP : " .env::$IP;