<?php

	require_once './Source/Config/Class.php';

	define('DATA',
	[

		'ACCESS'	=> 'PUBLIC',
		'MODULE'	=> null,
		'AUTH'		=> false,
        'TITLE'		=> 'Auth | Account',
		'META'		=> null
	]);

	$useAuth->dataAuth(DATA);

	$getAuthData = $_GET['authData'];
	if(!empty($getAuthData))
	{
		$authData = $getAuthData;
	}
	if(isset($authData))
	{
		$_SESSION['ACCOUNT'] = json_decode($authData);

		header('location: '.BASE.'painel/main');
	}
	else
	{
		header('location: '.BASE.'error/500');
	}
	
?>