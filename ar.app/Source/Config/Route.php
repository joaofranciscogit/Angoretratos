<?php

        define('ROUTE_LIST', 
        [
                '/'                => ROUTE.'Main/Main.php',

                'error/401'        => ROUTE.'Error/Unauthorized.php',
                'error/404'        => ROUTE.'Error/PageNotFounded.php',
                'error/500'        => ROUTE.'Error/InternalServerError.php',

                'auth/account'     => ROUTE.'Auth/Account.php',

                'login/admin'      => ROUTE.'Admin/Login/Account.php',

                'painel/main'      => ROUTE.'Admin/Painel/Main.php'
        ]);