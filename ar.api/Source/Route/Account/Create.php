<?php

	require_once "./Source/Config/Class.php";

	use Autoload\Model\Account\Account;

	$useAccount = new Account($useMysql);

	define("DATA",
	[
		"METHOD"	=> "POST",
		"ACCESS"	=> "PRIVATE",
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
				":account_code" 	=> $useCode->createCode(6, "US"),
				":account_name" 	=> $arr->account_name,
				":account_email" 	=> $arr->account_email,
				":account_passwd" 	=> sha1($arr->account_passwd),
				":account_master" 	=> $arr->account_master,
				":account_access" 	=> $arr->account_access
			];

			$existData = $useHelper->existData(
				$useMysql,
				"account",
				"account_email",
				$data[":account_email"]
			);

			if($existData != true)
			{
				$createAccount = $useAccount->createAccount($data);

				if($createAccount == true)
				{
					$dataAccount = $useHelper->selectData(
						$useMysql,
						"account",
						"account_code",
						$data[":account_code"]
					);

					$useResponse->responseCode(201);
					$useResponse->responseReturn($dataAccount);
					
					die;
				}
				else
				{
					$useResponse->responseCode(500);
					$useResponse->responseReturn(
					[
						"responseCode" => 500,
						"responseText" => "Ocorreu Um Problema."
					]);

					die;
				}
			}
			else
			{
				$useResponse->responseCode(406);
				$useResponse->responseReturn(
				[
					"responseCode" => 406,
					"responseText" => "O Email Já Existe."
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