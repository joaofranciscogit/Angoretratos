<?php

	require_once "./Source/Config/Class.php";

	use Autoload\Model\Account\Account;

	$useAccount = new Account($useMysql);

	define("DATA",
	[
		"METHOD"	=> "DELETE",
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

			$existData = $useHelper->existData($useMysql, "account", "account_id", $data[":account_id"]);

			if($existData == true)
			{

				$deleteAccount = $useAccount->deleteAccount($data);
				
				if($deleteAccount == true)
				{
					$useResponse->responseCode(200);
					$useResponse->responseReturn(
					[
						"responseCode" => 200,
						"responseText" => "Eliminado."
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