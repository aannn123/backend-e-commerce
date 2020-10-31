<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\Product;

class DashboardController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() 
    {
        $income = Transaction::where('transaction_status','SUCCESS')->sum('transaction_total');
        // var_dump(number_format($income,0,'.','.'));die();
        $sales = Transaction::count();
        $number = 1;
        $product = Product::count();
        $items = Transaction::with('details')->orderBy('id','DESC')->take(5)->get();
        $pie = [
            'pending' => Transaction::where('transaction_status','PENDING')->count(),
            'failed' => Transaction::where('transaction_status','FAILED')->count(),
            'success' => Transaction::where('transaction_status','SUCCESS')->count(),
        ];
        
        return view('pages.dashboard', [
            'income' => $income,
            'product' => $product,
            'number' => $number,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie
        ]);
    }
}
