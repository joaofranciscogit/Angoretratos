<?php

	namespace Autoload\Class\Validate;

	class Validate
	{
		private array $data;

		public function dataValidate(array $data): void
		{
			$this->data = $data;
		}

		private function methodValidate(): bool
		{

			if($this->data['METHOD'] != $this->data['REQUEST']['METHOD'])
			{
				return false;
			}
			else
			{
				return true;
			}

		}

		private function accessValidate(): bool
		{
			if($this->data['ACCESS'] == 'PRIVATE')
			{
				if($this->data['REQUEST']['TOKEN'] == null)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return true;
			}
		}

		private function indexValidate(): bool
		{
			$requestIndex = $this->data['REQUEST']['INDEX'];

			if(!empty($requestIndex))
			{
				if(is_numeric($requestIndex) && $requestIndex > 0)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return true;
			}
		}

		public function requestValidate(): bool
		{
			if(
				self::methodValidate() 	== false OR 
				self::accessValidate() 	== false OR 
				self::indexValidate() 	== false
			)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
	}