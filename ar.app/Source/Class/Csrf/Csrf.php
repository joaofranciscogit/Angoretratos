<?php

    namespace Autoload\Class\Csrf;

	class Csrf
    {
    	function createCsrf()
        {
            return $_SESSION[csrf] = mb_strtoupper(strval(bin2hex()));
        }
    }