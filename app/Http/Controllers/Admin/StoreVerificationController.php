<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreVerificationController extends Controller
{
    public function index()
    {
        $stores = Store::with('user')->get();

        return view('admin.stores.index', compact('stores'));
    }

    public function verify($id)
    {
        $store = Store::findOrFail($id);
        $store->status = 'approved';
        $store->save();

        return redirect()->back()->with('success', 'Store verified successfully.');
    }

    public function reject($id)
    {
        $store = Store::findOrFail($id);
        $store->status = 'rejected';
        $store->save();

        return redirect()->back()->with('success', 'Store rejected.');
    }
}
