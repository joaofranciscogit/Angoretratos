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
				where 			account_id = :account_id

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
						:account_code,
						:account_name,
						:account_email,
						:account_pass,
						:account_master,
						:account_access
			)

			", $data);

			return $createAccount;

		}

		public function updateAccount($data)
		{

			$updateAccount = $this->database->mysqlNon("

				update 	account
				set 	account_name 	= :account_name,
						account_email	= :account_email,
						account_master	= :account_master,
						account_access	= :account_access
				where 	account_id 		= :account_id;

			", $data);

			return $updateAccount;

		}

		public function updatepassAccount($data)
		{

			$updatepassAccount = $this->database->mysqlNon("

				update 	account
				set 	account_pass	= :account_pass
				where 	account_id 		= :account_id;

			", $data);

			return $updatepassAccount;

		}

		public function deleteAccount($data)
		{
			$deleteAccount = $this->database->mysqlNon("

				delete from account
				where 		account_id = :account_id;

			", $data);

			return $deleteAccount;
		}

		public function authAccount($data)
		{
			$authAccount = $this->database->mysqlExe("

				select *from 	account
				where 			account_email = :account_email
				and 			account_pass = :account_pass;

			", $data);

			return $authAccount;
		}
		
	}