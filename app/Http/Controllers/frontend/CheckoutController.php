<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Payement;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $total = $request->input('total');
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.checkout' ,compact(['cartitems','total']));
    }

    public function pay(Request $request)
    {
        $pay=new Payement();
        $pay->user_id=Auth::id();
        $pay->name_card=$request ->input('name_card');
        $pay->num_card=$request ->input('num_card');
        $pay->date_card=$request ->input('date_card');
        $pay->cvv=$request ->input('cvv');
        $pay->save();
        $cartitems = Cart::where('user_id',Auth::id())->get();
        foreach($cartitems as $cart)
        {
        DB::table('receveurs')
             ->where('user_id', $cart->receveur_id)
             ->increment('point',10);
             $cart->delete();
        }
        return redirect('/' )->with('status' , "your order completed seccusfully") ;
    }
}
