<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\checkoutRequest as APICheckoutRequest;
use App\Model\Product;
use App\Model\Transaction;
use App\Model\TransactionDetail;

class checkoutController extends Controller
{
    public function checkout(APICheckoutRequest $request)
    {
        $data = $request->except('transaction_details');
        $data['code_transaction'] = 'MPA' .mt_rand(10000, 99999) .mt_rand(100, 999);
        // dd($data);

        $transaction = Transaction::create($data);

        foreach ($request->transaction_details as $product) 
        {
            $details[] = new TransactionDetail([
                'transaction_id' => $transaction->id,
                'product_id' => $product
            ]);

            Product::find($product)->decrement('quantity');
        }

        $transaction->detail()->saveMany($details);

        return responseFormatter::success($transaction);
    }
}
