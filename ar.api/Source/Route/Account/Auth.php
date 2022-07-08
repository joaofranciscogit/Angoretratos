<?php

	require_once "./Source/Config/Class.php";

	use Autoload\Model\Account\Account;

	$useAccount = new Account($useMysql);

	define("DATA",
	[
		"METHOD"	=> "POST",
		"ACCESS"	=> "PUBLIC",
		"REQUEST"	=>
		[
			"METHOD" 	=> $_SERVER["REQUEST_METHOD"],
			"INDEX"		=> null,
			"JSON" 		=> file_get_contents("php://input"),
			"TOKEN"		=> null
		]
	]);

	$useValidate->dataValidate(DATA);

	if($useValidate->requestValidate() == true)
	{
		$requestJson = DATA["REQUEST"]["JSON"];

		if(!empty($requestJson))
		{
			$arr = json_decode($requestJson);

			$data  = 
			[
				":account_email" => $arr->account_email,
				":account_passwd" => sha1($arr->account_passwd)
			];

			$authAccount = $useAccount->authAccount($data);

			if(count($authAccount) > 0)
			{
				$dataAccount = $useHelper->selectData(
					$useMysql,
					"account",
					"account_email",
					$data[":account_email"]
				);

				$useResponse->responseCode(200);
				$useResponse->responseReturn($dataAccount);
				
				die;
			}
			else
			{
				$useResponse->responseCode(406);
				$useResponse->responseReturn(
				[
					"responseCode" => 406,
					"responseText" => "Autenticação Inválida."
				]);
				
				die;
			}
		}
		else
		{
			$useResponse->responseCode(400);
			$useResponse->responseReturn(
			[
				"responseCode" => 400,
				"responseText" => "Faltando Dados."
			]);
			
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