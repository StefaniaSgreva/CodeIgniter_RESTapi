<?php

namespace App\Controllers;

use \App\Libraries\Oauth;
use \OAuth2\Request;
use CodeIgniter\API\ResponseTrait;

class User extends BaseController
{   
    use ResponseTrait;//to use respond();
    //function that handles the login functionality
    public function login(){
        $oauth = new Oauth();
        $request = new Request();
        $respond = $oauth->server->handleTokenRequest($request->createFromGlobals());
        $code = $respond->getStatusCode();
        $body = $respond->getResponseBody();

        return $this->respond(json_decode($body), $code);

    }
}
