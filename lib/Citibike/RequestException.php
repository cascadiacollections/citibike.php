<?php
    namespace Citibike;

    class RequestException extends \Exception
    {
        /**
         * Response that threw exception
         *
         * @param \stdClass $response
         */
        public function __construct($response)
        {
            $error = json_decode($response->body);
            $errstr = isset($error->meta) ? $error->meta->msg : 'Unknown Error';

            $this->statusCode = $response->status;
            $this->message = $errstr;
            parent::__construct($this->message, $this->statusCode);
        }

        /**
         * Convert exception to String
         *
         * @return string    Exception thrown
         */
        public function __toString()
        {
            return __CLASS__ . ": [$this->statusCode]: $this->message\n";
        }
    }
?>