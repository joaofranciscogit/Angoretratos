<?php

    header("Content-Type:application/json");

    require_once './vendor/autoload.php';
    require_once './Source/Config/Const.php';
    require_once './Source/Config/Route.php';

    use Autoload\Class\Route\Route;
    use Autoload\Class\Response\Response;

    $useRoute   = new Route();

    $routeDir   = $useRoute->routeData(0);
    $routeFile  = $useRoute->routeData(1);
    $routeId    = $useRoute->routeData(2);

    $routePath  = $routeDir.'/'.$routeFile;
    
    define('ID' , $routeId);

    $routeShow = $useRoute->routeShow(ROUTE_LIST, $routePath);

    if ($routeShow != false)
    {
       require_once $routeShow;

       die;
    }
    else
    {
        $useResponse = new Response();

        $useResponse->responseCode(404);
					
        $useResponse->responseReturn(
        [
            "responseCode" => 404,
            "responseText" => "Routa Não Encontrada."
        ]);

        die;
    }