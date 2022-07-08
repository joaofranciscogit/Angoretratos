<?php

	namespace Autoload\Class\Helper;

	class Helper
	{
		public function existData($mysql, $table, $field, $data)
		{
			$existData = $mysql->mysqlExe("SELECT $field FROM $table WHERE $field = '{$data}' ");

			if(count($existData) > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function selectData($mysql, $table, $field, $data)
		{
			$selectData = $mysql->mysqlExe("SELECT *FROM $table WHERE $field = '{$data}' ");

			return $selectData;
		}
	}