<?php
	if(!defined("SECURE")) die();
	
	// http://in.eregnow.com/v1/ticketing/checkpoint/115849.fd3ad3d0b199?cid=140
	
//	ini_set('display_errors',1);
//	error_reporting(E_ALL);

	ini_set('memory_limit', '-1');
	
	$uid = $mapi->validateAuth($ffw->alias);
	$chk = addslashes(rnn($_REQUEST['cid'],0));
	
	$ffw->com = "ticketing";
	$path = $ffw->getComPath("ticketing");
	include($path."class.php");
	
	$dbEvent = new externalDB();
	$sql = "SELECT * FROM `{$chk}`";
    $details = $dbEvent->db->getArray($sql);
	
	foreach($details as $detail) {
		$response[] = array(
			'id'	=> $detail['id'],
			'name'	=> $detail['data_57651'],
			'mobile'	=> $detail['data_57656'],
			'fee_id'	=> $detail['fee_id']
		);
	}
	echo json_encode($response);
	die();