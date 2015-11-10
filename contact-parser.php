<?php

function parseContacts($filename)
{
    $contacts = array();

    // todo - read file and parse contacts
    $handle = fopen($filename, 'r');
    $contents = trim(fread($handle, filesize($filename)));
    $content = explode("\n", $contents);


    foreach ($content as $key => $contact) {
    	$contactArray = explode('|', $contact);
    	unset($contacts[$key]);
  		$contacts[$key]['name'] = $contactArray[0];
  		$contacts[$key]['number'] = numberSplit($contactArray[1]);
    }

    fclose($handle);
    return $contacts;
}

function numberSplit($number) 
{
	return substr($number, 0, 3) . '-' . substr($number, 3, 3) . '-' . substr($number, 6);
}

print_r(parseContacts('contacts.txt'));
