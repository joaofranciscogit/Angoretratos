<?php

    namespace Autoload\Class\Response;

    class Response
    {
        public function responseCode($code)
        {
            return header("HTTP/1.1 ".$code);
        }

        public function responseReturn($return)
        {
            return printf(json_encode($return));
        }
    }