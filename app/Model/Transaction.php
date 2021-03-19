<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $table = 'transaction';
    protected $fillable = [
        'code_transaction', 'cust_name', 'email', 'number', 'address', 'transaction_total', 'transaction_status'];

    protected $hidden = [

    ];

    public function detail(){
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }
}
