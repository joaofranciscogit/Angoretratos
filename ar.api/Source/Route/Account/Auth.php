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

	if($useValidate->requestValidate())
	{
		$arr = json_decode(DATA["REQUEST"]["JSON"]);

		if	(
					!empty($arr->account_email)
				&&	!empty($arr->account_pass)
			)
		{
			$data  = 
			[
				":account_email" 	=> $arr->account_email,
				":account_pass" 	=> $arr->account_pass
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
			}
			else
			{
				$useResponse->responseCode(406);
			}
		}
		else
		{
			$useResponse->responseCode(400);
		}
	}
	else
	{
		$useResponse->responseCode(400);
	}