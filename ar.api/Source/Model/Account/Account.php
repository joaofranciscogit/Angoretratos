<?php

	namespace Autoload\Model\Account;

	class Account{

		private $database;

		public function __construct($database)
		{
			$this->database = $database;
		}

		public function readAccount($data)
		{
			$readAccount = $this->database->mysqlExe("

				select *from 	account 
				where 			account_id = :accountId

			", $data);

			return $readAccount;
		}

		public function readaccountList()
		{
			$readaccountList = $this->database->mysqlExe("

				select *from 	account 
				order by 		account_id 
				desc

			");

			return $readaccountList;
		}

		public function createAccount($data)
		{
			$createAccount = $this->database->mysqlNon("

			insert into account (
						account_code,
						account_name,
						account_email,
						account_pass,
						account_master,
						account_access
			)
			values(
						:accountCode,
						:accountName,
						:accountEmail,
						:accountPass,
						:accountMaster,
						:accountAccess
			)

			", $data);

			return $createAccount;

		}

		public function updateAccount($data)
		{

			$updateAccount = $this->database->mysqlNon("

				update 	account
				set 	account_name 	= :accountName,
						account_email	= :accountEmail,
						account_master	= :accountMaster,
						account_access	= :accountAccess
				where 	account_id 		= :accountId;

			", $data);

			return $updateAccount;

		}

		public function updatepassAccount($data)
		{

			$updatepassAccount = $this->database->mysqlNon("

				update 	account
				set 	account_pass	= :accountPass
				where 	account_id 		= :accountId;

			", $data);

			return $updatepassAccount;

		}

		public function deleteAccount($data)
		{
			$deleteAccount = $this->database->mysqlNon("

				delete from account
				where 		account_id = :accountId;

			", $data);

			return $deleteAccount;
		}

		public function authAccount($data)
		{
			$authAccount = $this->database->mysqlExe("

				select *from 	account
				where 			account_email 	= :accountEmail
				and 			account_pass 	= :accountPass;

			", $data);

			return $authAccount;
		}
		
	}