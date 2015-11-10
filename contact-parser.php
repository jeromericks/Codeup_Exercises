<?php

function parseContacts($filename)
{
    $contactsArray = array();

    // todo - read file and parse contacts
    $handle = fopen($filename, 'r');
    $contentString = trim(fread($handle, filesize($filename)));
    $arrayOfStrings = explode(PHP_EOL, $contentString);


    foreach ($arrayOfStrings as $index => $contact) {
    	$innerArray = explode('|', $contact);
    	unset($arrayOfStrings[$index]);
  		$contactsArray[$index]['name'] = $innerArray[0];
  		$contactsArray[$index]['number'] = numberSplit($innerArray[1]);
    }

    fclose($handle);
    return $contactsArray;
}

function numberSplit($number) 
{
	return substr($number, 0, 3) . '-' . substr($number, 3, 3) . '-' . substr($number, 6);
}

print_r(parseContacts('contacts.txt'));
