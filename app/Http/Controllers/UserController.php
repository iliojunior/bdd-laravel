<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery\Exception;
use PHP2WSDL\PHPClass2WSDL;
use WSDL\WSDLCreator;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function server()
    {
        $location = url('api/server');
        $class = "\\App\\UserModel";

        $wsdlGen = new PHPClass2WSDL($class, $location);
        $wsdlGen->generateWSDL(true);

        if (isset($_GET['wsdl'])) {
            return \response($wsdlGen->dump(true))->header('Content-type', 'text/xml');
        }

        $server = new \SoapServer($location . '?wsdl', array(
            'exceptions' => 1,
            'trace' => 1,
        ));
        $server->setClass($class);
        $server->handle();
        exit;
    }

    public function client()
    {
        $wsdl = url('api/server?wsdl');
        $client = new \SoapClient($wsdl);

        try {
            $res = $client->getNome("Ilio");
            dd($res);
        } catch (Exception $ex) {
            dd($ex);
        }
    }
}
