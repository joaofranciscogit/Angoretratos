<?php

    namespace Autoload\Class\Code;

	class Code
    {
    	function createCode($length, $prefix)
        {

            if ($prefix != null)
            {
                $randomCode = $prefix.mb_strtoupper(strval(bin2hex(openssl_random_pseudo_bytes($length))));
            }

            else
            {
                $randomCode = mb_strtoupper(strval(bin2hex(openssl_random_pseudo_bytes($length))));
            }

            return $randomCode;
        }
    }