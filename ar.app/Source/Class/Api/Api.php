<?php

    namespace Autoload\Class\Api;

    class Api
    {
        private string  $ApiBase;

        public function __construct(string $apiBase)
        {
            $this->apiBase = $apiBase;
        }

        public function apiGet(string $apiRoute): array
        {
            $useCurl = curl_init();

            curl_setopt_array(
            $useCurl, 
            [
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $this->apiBase.$apiRoute
            ]);
            
            $apiData    = json_decode(curl_exec($useCurl));
            $apiStatus  = json_decode(curl_getinfo($useCurl, CURLINFO_HTTP_CODE));

            curl_close($useCurl);

            $apiReturn  = 
            [
                'STATUS' => $apiStatus,
                'DATA'   => $apiData
            ];

            return $apiReturn;
        }
    }