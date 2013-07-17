<?php
    namespace Citibike;

    /**
     * A client to access the Citibike REST API
     */
    class Client
    {
        private $stationsUrl  = 'data2/stations.php';
        private $branchesUrl  = 'v1/branch/list';
        private $helmetsUrl   = 'v1/helmet/list';

        /**
         * Create a new Client
         */
        public function __construct()
        {
                $this->requestHandler = new RequestHandler();
        }

        /**
         * Retrieve RequestHandler instance
         *
         * @return RequestHandler
         */
        public function getRequestHandler()
        {
                return $this->requestHandler;
        }

        /**
         * Get Citibike Stations Data
         *
         * @return array    the response array
         */
        public function getStations()
        {
                return $this->getRequest($this->stationsUrl);
        }

        /**
         * Get Citi Branches Data
         *
         * @return array    the response array
         */
        public function getBranches()
        {
                return $this->getRequest($this->branchesUrl);
        }

        /**
         * Get Citibike Helmets Data
         *
         * @return array    the response array
         */
        public function getHelmets()
        {
                return $this->getRequest($this->helmetsUrl);
        }

        /**
         * Make a GET request to the given endpoint and return the response
         *
         * @param string $path    the path to call on
         *
         * @return array    the response object (parsed)
         */
        private function getRequest($path)
        {
                $response = $this->makeRequest('GET', $path);
                return $this->parseResponse($response);
        }

        /**
        * Parse a response and return the appropriate result
        *
        * @param  \stdClass $response    the response from the server
        *
        * @throws RequestException
        * @return array    the response data
        */
        private function parseResponse($response)
        {
                $response->json = json_decode($response->body);

                // If (OK) HTTP Status, return decoded JSON
                if ($response->status < 400) {
                        return $response->json;
                } 
                else {
                        throw new RequestException($response);
                }
        }

        /**
         * Make a request to the given endpoint and return the response
         *
         * @param string $method    the method to call: GET, POST
         * @param string $path      the path to call on
         *
         * @return \stdClass    the response object (not parsed)
         */
        private function makeRequest($method, $path)
        {
                return $this->requestHandler->request($method, $path);
        }
    }
?>