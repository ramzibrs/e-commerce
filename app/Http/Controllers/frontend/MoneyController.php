<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Receveur;
use Illuminate\Support\Facades\DB;

class MoneyController extends Controller
{
    public function index()
    {
        $receveur=Receveur::get();
        return view('admin.money.money' , compact('receveur')) ;
    }

    public function money(Request $request ,$id)
    {
        $money=Receveur::where('user_id',$id)->first();
        if($money->state==0)
        {

            if($request->input('money')>$money->point)
            {
                return back()->with('status1', 'vous n avez pas acces de points');
            }
            else{
            $a=$money -> money = $request->input('money');
            $money->state='1';
            $money->update();
            DB::table('receveurs')
             ->where('user_id', $id)
             ->decrement('point',$a);
            return back()->with('status', 'votre procedure est en cour de traitement');
            }

        }
        else {
            return back()->with('status1', 'vous avez deja demander');
        }



    }

    public function accepted( $id)
    {
        $money=Receveur::where('user_id',$id)->first();
        $money -> money ='0' ;
        $money->state='0';
        $money->update();
        return back()->with('status', 'demande accepted');
    }
}
