<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Models\Auth;
use App\Models\Receveur;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = product::where('trending','1')->get();
        $trending_category = Category::where('popular','1')->get();
        return view('home', compact('featured_products') , compact('trending_category') );


    }

    public function category()
    {
        $category = Category::where('status' ,'0')->get();
        return view('frontend.category', compact('category'));


    }

    public function viewcategory($slug)
    {
        if(Category::where('slug',$slug)->exists())
        {
            $category =Category::where('slug',$slug)->first();
            $products = Product::where('cate_id' ,$category->id)->where('status','0')->get();
        return view('frontend.products.index', compact('category' , 'products'));
        }
        else
        {
           return redirect('/home')->with('status1', "slug does not exists" );
        }



    }

    public function productview($cate_slug , $prod_slug)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
           if(Product::where('slug',$prod_slug)->exists())
           {
             $products = Product::where('slug',$prod_slug)->first();
             return view('frontend.products.view' , compact('products'));

           }
           else
           {
               return redirect('/')->with('status1', 'the link was broken');
           }
        }
           else
           {
               return redirect('/')->with('status1', 'no such category found');
           }



    }
    public function productviewr($cate_slug , $prod_slug, $id)
    {
        if(Category::where('slug',$cate_slug)->exists())
        {
           if(Product::where('slug',$prod_slug)->exists())
           {
             $products = Product::where('slug',$prod_slug)->first();
             DB::table('receveurs')
             ->where('user_id', $id)
             ->increment('point',1);
             return view('frontend.products.viewr' , compact('products'));

           }
           else
           {
               return redirect('/')->with('status1', 'the link was broken');
           }
        }
           else
           {
               return redirect('/')->with('status1', 'no such category found');
           }



    }

    public function earn($id)
    {
       $receveur=Receveur::where('user_id',$id)->first();
       return view('frontend.money' ,compact('receveur'));
    }

    public function role(Request $request ,$id)
    {
       $user = User::find($id);
       $user -> check_role = $request->input('role');
       $user ->update();
       $receveur= new Receveur();
       $receveur-> user_id=$id;
       $receveur-> point=0;
       $receveur->save();
       return back();
    }
}
