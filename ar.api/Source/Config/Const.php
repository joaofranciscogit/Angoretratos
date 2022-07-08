<?php

	define('BASE',        'http://localhost/Ar/ar.api/');
    define('ERROR',       'error/404');
    
	define('ROUTE',       './Source/Route/');
    define('RESPONSE',    './Source/Response/');

	define('DATABASE',
    [
        'DRIVER'    => 'mysql',
        'CHARSET'   => 'utf8',
        'HOST'      => 'localhost',
        'NAME'      => 'ar',
        'USER'      => 'root',
        'PASSWD'  => ''
    ]);

    define('EMAIL',
    [
        'DEBUG'         => false,
        'HOST'          => 'smtp.sendgrid.net',
        'PORT'          => '465',
        'SECURE'        => 'ssl',
        'USER'          => 'apikey',
        'PASSWD'        => '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',
        'FROM_NAME'     => 'Equipe de Suporte | SRAD',
        'FROM_EMAIL'    => 'ariannexux0101@gmail.com',
    ]);