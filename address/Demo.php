<?php

require_once 'class.Address.inc.php';

$address = new Address();

echo '<tt><pre>'. var_export($address, TRUE) . '</pre></tt>';
echo '<tt><pre>'. var_dump($address) . '</pre></tt>';

$address->streetAddress_1 = 'Fuckstreet';
$address->streetAddress_2 = 'Fuckstreet Addrres 2';
$address->cityName = 'Townsvill';
$address->subdivisionName = 'State';
$address->postalCode = '123123';
$address->countryName = 'United State of Tests';

echo '<pre>'. var_export($address, TRUE) . '</pre>';

echo $address->display();
