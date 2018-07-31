<?php

namespace Woenel;

use GuzzleHttp\Client;

class Laravesta
{    
    private $postvars;
    private $client;
    private $url;

    public function __construct()
    {
        $this->client = new Client;
    }

    public function execute($cmd, array $args)
    {
        $this->postvars =  [
            'form_params' => [
                'user' => config('laravesta.vst_username', 'admin'),
                'password' => config('laravesta.vst_password', 'p4ssw0rd'),
                'cmd' => $cmd
            ] + $args,
            'verify' => config('laravesta.ssl_verify', false)
        ];
        
        $this->url = 'https://' . config('laravesta.vst_hostname', 'server.vestacp.com') . ':8083/api/';

        return $this;
    }

    public function getCode()
    {
        $this->postvars['form_params'] += [
            'returncode' => 'yes'
        ];

        $res = $this->client->post($this->url, $this->postvars);

        return $res->getBody()->getContents();
    }

    public function getData()
    {
        $this->postvars['form_params'] += [
            'returncode' => 'no'
        ];

        $res = $this->client->post($this->url, $this->postvars);

        return $res->getBody()->getContents();
    }
}
