<?php

	require_once "./Source/Config/Class.php";

	use Autoload\Model\Account\Account;

	$useAccount = new Account($useMysql);

	define("DATA",
	[
		"METHOD"	=> "PUT",
		"ACCESS"	=> "PRIVATE",
		"REQUEST"	=>
		[
			"METHOD" 	=> $_SERVER["REQUEST_METHOD"],
			"INDEX"		=> ID,
			"JSON" 		=> file_get_contents("php://input"),
			"TOKEN"		=> null
		]
	]);

	$useValidate->dataValidate(DATA);

	if($useValidate->requestValidate() == true)
	{
		$requestIndex	= DATA["REQUEST"]["INDEX"];
		$requestJson 	= DATA["REQUEST"]["JSON"];

		if(!empty($requestJson))
		{
			$arr = json_decode($requestJson);

			$data  = 
			[
				":account_id" 		=> $requestIndex,
				":account_passwd" 	=> sha1($arr->account_passwd)
			];

			$updatePasswdAccount = $useAccount->updatePasswdAccount($data);

			$existData = $useHelper->existData(
                $useMysql,
                "account",
                "account_id",
                $data[":account_id"]
            );

			if($existData == true)
			{
				if($updatePasswdAccount == true)
				{
					$dataAccount = $useHelper->selectData($useMysql, "account", "account_id", $requestIndex);
					
					$useResponse->responseCode(200);
					$useResponse->responseReturn(
                    [
                        "responseCode" => 200,
                        "responseText" => "Senha Actualizada."
                    ]);

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
					"responseText" => "O Registro Não Existe."
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