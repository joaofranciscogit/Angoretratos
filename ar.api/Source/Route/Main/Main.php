<?php

    use Autoload\Class\Response\Response;

    $useResponse = new Response();

    $useResponse->responseCode(200);
    $useResponse->responseReturn(
    [
        "responseCode" => 200,
        "responseText" => "Angoretratos Rest Api",
        "responseAuthor" => "João Francisco"
    ]);