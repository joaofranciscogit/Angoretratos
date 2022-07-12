<?php

	require_once "./Source/Config/Class.php";

	use Autoload\Model\Account\Account;
	use Firebase\JWT\JWT;
	use Curl\Curl;

	$useAccount = new Account($useMysql);
	$useJWT 	= new JWT();

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

	if($useValidate->requestValidate())
	{
		$arr = json_decode(DATA["REQUEST"]["JSON"]);

		if	(
					!empty($arr->accountEmail)
				&&	!empty($arr->accountPass)
			)
		{
			$data  = 
			[
				":accountEmail" => $arr->accountEmail,
				":accountPass" 	=> $arr->accountPass
			];

			$authAccount = $useAccount->authAccount($data);

			if(count($authAccount) > 0)
			{
				$dataAccount = $useHelper->selectData(
					$useMysql,
					"account",
					"account_email",
					$data[":accountEmail"]
				);

						$useResponse->responseCode(200);
				echo 	$useResponse->responseReturn(
				[
					"responseToken" => $useJWT->encode($dataAccount, 'account_key', 'HS256'),
					"responseData"	=> $dataAccount[0]
				]);
			}
			else
			{
						$useResponse->responseCode(406);
				echo 	$useResponse->responseReturn(["responseText" => "Autenticação Inválida."]);
			}
		}
		else
		{
					$useResponse->responseCode(400);
			echo 	$useResponse->responseReturn(["responseText" => "Faltando Dados."]);
		}
	}
	else
	{
				$useResponse->responseCode(400);
		echo 	$useResponse->responseReturn(["responseText" => "Requisição Inválida."]);
	}