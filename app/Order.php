<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    //
    protected $fillable = ['user_id', 'reference', 'code', 'status', 'payment_method', 'date'];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produto_order');                        
    }

    public function newOrderProducts($cart, $reference, $code, $status = 1, $paymentMethod = 2)
    {
        $order = $this->create([
            'user_id'           => auth()->user()->id,
            'reference'         => $reference,
            'code'              => $code,
            'status'            => $status,
            'payment_method'    => $paymentMethod,
            'date'              => date('Ymd'),
        ]);

        $order->save();

        //$itemsCart = $cart->getItems();      
        
        //$order->products()->attach($productsOrder);
    }
    
    
    public function getStatus($status)
    {
        $statusA = [
            1 => 'Aguardando pagamento',
            2 => 'Em análise',
            3 => 'Paga',
            4 => 'Disponível',
            5 => 'Em disputa',
            6 => 'Devolvida',
            7 => 'Cancelada',
            8 => 'Debitado',
            9 => 'Retenção temporária',
        ];
        
        return $statusA[$status];
    }
    
    public function getMethodPayment($method)
    {
        $paymentsMethods = [
            1 => 'Cartão de crédito',
            2 => 'Boleto',
            3 => 'Débito online (TEF)',
            4 => 'Saldo PagSeguro',
            5 => 'Oi Paggo',
            7 => 'Depósito em conta',
        ];
        
        return $paymentsMethods[$method];
    }
    
    
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
    
    
    public function getDateRefreshStatusAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
    
    
    public function changeStatus($newStatus)
    {
        $this->status = $newStatus;
        $this->save();
    }


}
