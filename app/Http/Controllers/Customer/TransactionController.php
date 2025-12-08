<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:customer']);
    }

    public function index()
    {
        $orders = Transaction::with('details.product.store')
            ->where('user_id', auth()->id())
            ->orderByDesc('created_at')
            ->paginate(12);

        return view('customer.transactions.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Transaction::with('details.product.store')->where('id',$id)->where('user_id', auth()->id())->firstOrFail();
        return view('customer.transactions.show', compact('order'));
    }
}
