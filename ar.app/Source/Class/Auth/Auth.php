<?php

    namespace Autoload\Class\Auth;

    class Auth
    {
        private array $data;

        public function dataAuth(array $data): void
        {
            $this->data = $data;
        }

        private function accessAuth($data): bool
        {
            if($data["ACCESS"] == "PRIVATE")
			{
				return true;
			}
        }

        private function moduleAuth(): bool
        {
            return true;
        }
    }