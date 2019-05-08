<?php

namespace App;
use GuzzleHttp\Client as Guzzle;
use Illuminate\Http\Request;
use App\Produto;


trait PagSeguroTrait
{
    public function getConfigs() {
        
        return [
            'email' => config('pagseguro.email'),
            'token' => config('pagseguro.token'),
        ];
    }
    
  
    public function getItem(){
       
        $produto = $this->produto->getProduto();
        $valor = number_format($produto->preco, 2, '.', '');

        return $item = [
            'itemId1'           => $produto->id,
            'itemDescription1'  => $produto->nome,
            'itemAmount1'       => $valor,
            'itemQuantity1'     => '1',
            'itemWeight1'       => '1000',

        ];
    }
    
    
    public function getSender()
    {
        return [
            'senderName' => 'Jose Comprador',
            'senderCPF'=> '72962940005',
            'senderAreaCode'=> '11',
            'senderPhone'=> '56273440',
            'senderEmail'=> 'c60032373166157921625@sandbox.pagseguro.com.br',
            
        ];
    }
    
    public function getShipping()
    {
        return [
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
    }
}