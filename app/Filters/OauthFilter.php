<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

use \App\Libraries\Oauth;//our server libraries
use \OAuth2\Request;
use \OAuth2\Response;


class OauthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $oauth = new Oauth();
        $request = Request::createFromGlobals();
        $response = new Response();

        //if the request is not verify
        if(!$oauth->server->verifyResourceRequest($request)){
            $oauth->server->getResponse()->send();
            die(); //altrimenti andrebbe in loop
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}