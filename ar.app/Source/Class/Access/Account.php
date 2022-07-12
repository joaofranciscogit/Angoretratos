<?php

    namespace Autoload\Class\Access;

    class Account
    {
        private array $data;

        public function accountAccess(array $data): void
        {
            $this->data = $data;
        }

        private function sessionAccess(): bool
        {
            if (isset($_SESSION['ACCOUNT']))
            {
                if ($_SESSION['ACCOUNT'] != null)
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

        private function masterAccess(): array
        {
            if ($this->data['MASTER'] == true)
            {
                return $this->data;
            }
        }

    }