<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client as Guzzle;
use app\Produto;


class PagSeguro extends Model
{
    //   
    private $produto;
    private $user;
   
    use PagSeguroTrait;

    public function __construct(Produto $produto){
        $this->produto = $produto;
        $this->user = auth()->user();
    }

    public function getSessionId()
    {
        $params = [
            'email' => config('pagseguro.email'),
            'token' => config('pagseguro.token'),
        ];
        $params = http_build_query($params);
        
        $guzzle = new Guzzle;
        $response = $guzzle->request('POST', config('pagseguro.url_transparente_session_sandbox'), [
            'query' => $params,
        ]);
        $body = $response->getBody();
        $contents = $body->getContents();
        
        $xml = simplexml_load_string($contents);
        
        return $xml->id;
    }

    public function paymentBillet($sendHash) {

        
        $params = [
            'senderHash' => $sendHash,
            'paymentMode' => 'default',
            'paymentMethod' => 'boleto',
            'currency' => 'BRL',
            'reference' => 'REF123',
        ];

        $params = array_merge($params, $this->getConfigs());
        $params = array_merge($params, $this->getItem());
        $params = array_merge($params, $this->getSender());
        $params = array_merge($params, $this->getShipping());

        //$params = http_build_query($params);
        
        $guzzle = new Guzzle;
        $response = $guzzle->request('POST', config('pagseguro.url_payment_transparent_sandbox'), [
            'form_params' => $params,
        ]); 
        $body = $response->getBody();
        $contents = $body->getContents();
        
        $xml = simplexml_load_string($contents);        
       
        return [
            'success'       => true,
            'payment_link'  => (string)$xml->paymentLink,
            'reference'     => 'REF123',
            'code'          => (string)$xml->code,
        ];
    }
}
