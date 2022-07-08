<?php

	require_once "./Source/Config/Class.php";

	use Autoload\Model\Account\Account;

	$useAccount = new Account($useMysql);

	define("DATA",
	[
		"METHOD"	=> "GET",
		"ACCESS"	=> "PRIVATE",
		"REQUEST"	=>
		[
			"METHOD" 	=> $_SERVER["REQUEST_METHOD"],
			"INDEX"		=> ID,
			"JSON" 		=> null,
			"TOKEN"		=> null
		]
	]);

	$useValidate->dataValidate(DATA);

	if($useValidate->requestValidate() == true)
	{
		$requestIndex = DATA["REQUEST"]["INDEX"];

		if(!empty($requestIndex))
		{
			$data = [":account_id" => $requestIndex];

			$dataAccount = $useAccount->readaccount($data);

			$useResponse->responseCode(200);
			$useResponse->responseReturn($dataAccount);

			die;
		}
		else
		{
			$dataAccount = $useAccount->readAccountList();
			
			$useResponse->responseCode(200);
			$useResponse->responseReturn($dataAccount);

			die;
		}
	}
	else
	{
		$useResponse->responseCode(400);
		$useResponse->responseReturn(
		[
			"responseCode" => 400,
			"responseText" => "Problema Na Requisição."
		]);
		
		die;
	}