<?php
    namespace Citibike;

    /**
     * A request handler for Citibike API HTTP Requests
     */
    class RequestHandler
    {
        private $baseUrl;

        /**
         * Instantiate a new RequestHandler
         */
        public function __construct()
        {
            $this->baseUrl = 'http://appservices.citibikenyc.com/';
            $this->client = new \Guzzle\Http\Client();
        }

        /**
         * Set the base url for this request handler.
         *
         * @param string $url The base url (e.g. http://appservices.citibikenyc.com/)
         */
        public function setBaseUrl($url)
        {
            // Ensure trailing slash since it is expected in {@link request}.
            if (substr($url, -1) !== '/') {
                $url .= '/';
            }

            $this->baseUrl = $url;
        }

        /**
         * Make a request with this request handler
         * TODO: Handle Options argument
         *
         * @param string $method  one of GET, POST
         * @param string $path    the path to hit
         *
         * @return \stdClass response object
         */
        public function request($method, $path)
        {
            $url = $this->baseUrl . $path;

            if ($method === 'GET') {
                $request = $this->client->get($url);
            } else {
                // TODO: POST requests
            }

            // Handle success or response error(s)
            try {
                $response = $request->send();
            } catch (\Guzzle\Http\Exception\BadResponseException $e) {
                $response = $request->getResponse();
            }

            // Construct the Client's response object
            $obj = new \stdClass;
            $obj->status = $response->getStatusCode();
            $obj->body = $response->getBody();
            $obj->headers = $response->getHeaders()->toArray();

            return $obj;
        }
    }