<?php

    use Autoload\Class\Validate\Validate;
    use Autoload\Class\Response\Response;
    use Autoload\Class\Mysql\Mysql;
    use Autoload\Class\Code\Code;
    use Autoload\Class\Helper\Helper;
    use Firebase\JWT\JWT;

    $useValidate 	= new Validate();
    $useResponse    = new Response();
    $useMysql       = new Mysql(DATABASE);
    $useCode        = new Code();
    $useHelper      = new Helper();
