<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function addproduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

     if(auth::check())
     {
       $prod_check = product::where('id',$product_id)->first();
       if($prod_check)
       {
           if(Cart::where('prod_id',$product_id)->where('user_id' ,Auth::id())->exists())
           {
            return response()->json(['status' => $prod_check->name. " already added to cart"]);
           }
           else
           {
                $cartItem = new Cart();
                $cartItem -> prod_id = $product_id;
                $cartItem -> user_id = Auth::id();
                $cartItem -> prod_qty = $product_qty;
                $cartItem ->save();
                return response()->json(['status' => $prod_check->name. " added to cart"]);
           }

       }
     }
     else
     {
       return response()->  json(['status' => "login to continue"]);
     }

    }

    public function addproductr(Request $request)
    {
        $product_id = $request->input('product_id');
        $receveur_id = $request->input('receveur_id');
        $product_qty = $request->input('product_qty');

     if(auth::check())
     {
       $prod_check = product::where('id',$product_id)->first();
       if($prod_check)
       {
           if(Cart::where('prod_id',$product_id)->where('user_id' ,Auth::id())->exists())
           {
            return response()->json(['status' => $prod_check->name. " already added to cart"]);
           }
           else
           {
                $cartItem = new Cart();
                $cartItem -> prod_id = $product_id;
                $cartItem -> receveur_id = $receveur_id;
                $cartItem -> user_id = Auth::id();
                $cartItem -> prod_qty = $product_qty;
                $cartItem ->save();
                return response()->json(['status' => $prod_check->name. " added to cart"]);
           }

       }
     }
     else
     {
       return response()->  json(['status' => "login to continue"]);
     }

    }

    public function viewcart()
    {
        $cart_count =Cart:: where('user_id',Auth::id())->count();
        $cartitems = Cart::where('user_id' ,Auth::id())->get();
        return view('frontend.products.cart' , compact(['cartitems','cart_count']));

    }

    public function destroy($id)
    {
        $cart = Cart::find($id);

            $cart->delete();
            return back()->with('status1','product deleted succesfully');

    }
}
