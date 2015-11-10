<?php

function parseContacts($filename)
{
    $contacts = array();

    // todo - read file and parse contacts
    $handle = fopen($filename, 'r');
    $contents = fread($handle, filesize($filename));
    $contents = trim($contents);
    $contacts = explode("\n", $contents);


    foreach ($contacts as $key => $contact) {
    	$contact = explode('|', $contact);
    	unset($contacts[$key]);
  		$contacts[$key]['name'] = $contact[0];
  		$contacts[$key]['number'] = numberSplit($contact[1]);
    }

    fclose($handle);
    return $contacts;
}

function numberSplit($number) 
{
	return substr($number, 0, 3) . '-' . substr($number, 3, 3) . '-' . substr($number, 6);
}

print_r(parseContacts('contacts.txt'));
