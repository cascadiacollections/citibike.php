<?php

require_once 'lib/Citibike/RequestException.php';

class RequestExceptionTest extends PHPUnit_Framework_TestCase
{
    public function provider()
    {
        $class_name = 'Citibike\RequestException';

        return array(
            array(array('status' => 401, 'body' => '{}'), "$class_name: [401]: Unknown Error\n"),
            array(array('status' => 404, 'body' => '{"meta":{"msg":"really important error msg"}}'), "$class_name: [404]: really important error msg\n"),
        );
    }

    /**
     * @dataProvider provider
     */
    public function testErrorString($responseArr, $expectedString)
    {
        $response = (object) $responseArr;
        $err = new \Citibike\RequestException($response);
        $this->assertEquals((string) $err, $expectedString);
    }
}