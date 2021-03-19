<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Transaction;
use Illuminate\Http\Request;

class transactionController extends Controller
{
    public function get(Request $request, $id)
    {
        $product = Transaction::with('detail.product')->find($id);

        if($product)
            return responseFormatter::success($product, 'Data Berhasil diambil');

        else
            return responseFormatter::error(null, 'Data tidak ada');
    }
}
