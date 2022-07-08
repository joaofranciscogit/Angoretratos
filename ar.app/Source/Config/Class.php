<?php

    use Autoload\Class\Auth\Auth;
    use Autoload\Class\Csrf\Csrf;
    use Autoload\Class\Api\Api;

    $useAuth 	= new Auth();
    $useCsrf    = new Csrf();
    $useApi     = new Api(API);
