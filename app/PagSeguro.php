<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GuzzleHttp\Client as Guzzle;

class PagSeguro extends Model
{
    //
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

    public function paymentBillet($sendHash)
    {
        $params = [
            'email' => config('pagseguro.email'),
            'token' => config('pagseguro.token'),
            'senderHash' => $sendHash,
            'paymentMode' => 'default',
            'paymentMethod' => 'boleto',
            'currency' => 'BRL',
            'itemId1' => '0001',
            'itemDescription1' => 'Produto PagSeguroI',
            'itemAmount1' => '99999.99',
            'itemQuantity1' => '1',
            'itemWeight1' => '1000',
            'itemId2' => '0002',
            'itemDescription2' => 'Produto PagSeguroII',
            'itemAmount2' => '99999.98',
            'itemQuantity2' => '2',
            'itemWeight2' => '750',
            'reference' => 'REF1234',
            'senderName' => 'Jose Comprador',
            'senderAreaCode' => '99',
            'senderPhone' => '99999999',
            'senderEmail' => 'c60032373166157921625@sandbox.pagseguro.com.br',
            'senderCPF' => '54793120652',
            'shippingType' => '1',
            'shippingAddressStreet' => 'Av. PagSeguro',
            'shippingAddressNumber' => '9999',
            'shippingAddressComplement' => '99o andar',
            'shippingAddressDistrict' => 'Jardim Internet',
            'shippingAddressPostalCode' => '99999999',
            'shippingAddressCity' => 'Cidade Exemplo',
            'shippingAddressState' => 'SP',
            'shippingAddressCountry' => 'ATA',
        ];
        //$params = http_build_query($params);
        
        $guzzle = new Guzzle;
        $response = $guzzle->request('POST', config('pagseguro.url_payment_transparent_sandbox'), [
            'form_params' => $params,
        ]);
        $body = $response->getBody();
        $contents = $body->getContents();
        
        $xml = simplexml_load_string($contents);
        
        return $xml->paymentLink;
    }
}
