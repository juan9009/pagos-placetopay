<?php

namespace App\Http\Controllers;

class AuthWebService extends Controller
{

    public $login; //ID placetopay
    public $tranKey; //tranKey placetopay
    public $seed; //semilla
    public $hashkey; //hash generado con la semilla y la llave Llave transaccional
    public $url; //url servicio de pruebas
    public $paramAuth; //parametros de autenticacion
    public $auth; //autenticador

    /******************** datos de configuracion predefinidos ***********************/
    public function __construct()
    {

        $this->login = '6dd490faf9cb87a9862245da41170ff2';

        $this->tranKey = '024h1IlD';

        $this->seed = date('c');

        $this->hashkey = sha1($this->seed . $this->tranKey, false);

        $this->url = 'https://test.placetopay.com/soap/pse?wsdl';

        $this->paramAuth = array(
            'login' => $this->login,
            'tranKey' => $this->hashkey,
            'seed' => $this->seed
        );

        $this->auth = array('auth' => $this->paramAuth);
    }

}
