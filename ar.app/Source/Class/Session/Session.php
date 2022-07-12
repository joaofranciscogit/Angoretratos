<?php

    namespace Autoload\Class\Session;

    class Session
    {
        private array $data;

        public function sessionData(array $data): void
        {
            $this->data = $data;
        }

        private function sessionAccount(): bool
        {
            if(isset($_SESSION['ACCOUNT']))
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        private function sessionAccess(): bool
        {
            if ($_SESSION['ACCOUNT']->account_access == true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

        private function sessionMaster(): bool
        {
            if($this->data['MASTER'] == true)
            {
                if ($_SESSION['ACCOUNT']['account_master'] == true)
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

        public function sessionValidate(): bool
        {
            if  (        self::sessionAccount() == true
                    AND  self::sessionAccess()  == true
                    AND  self::sessionMaster()  == true
                )
            {
                return true;
            }
            else
            {
                header('location: '.BASE);
            }
        }
    }