<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Darryldecode\Cart\Cart as Cart;
use Illuminate\Contracts\Session\Session;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class PlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $menu = [];
        // dd( $_GET['num_tab'] );
        // Session::put('num_tab', $_GET['num_tab']);
        if(isset($_GET['num_tab'])){
            session(['num_tab' =>   $_GET['num_tab']]);
        };
        $salads = Plat::with('media')->where('type','=','salads')->get();
        // dd($salads[0]->media[0]->file_name);
        $starters = Plat::with('media')->where('type','=','starters')->get();
        $diners = Plat::with('media')->where('type','=','diner')->get();
        $lunchs = Plat::with('media')->where('type','=','lunch')->get();
        return view('menu',['salads' => $salads, 'starters'=>$starters, 'diners'=>$diners, 'lunchs'=>$lunchs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function invoice(Request $request)
    {
        $plats_id = is_array($request->input('plats')) ? array_values($request->input('plats')) : []; 
        // dd($plats_id);
        $plats = Plat::whereIn('id', $plats_id )->get();

        foreach ($plats as  $plat) {
            \Cart::add(array(
                'id' => $plat->id, 
                'name' => $plat->name,
                'price' => $plat->price,
                'quantity' => 1,
            ));
        }
      
        // dd(\Cart::getContent());

        return redirect(route('show.cart')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->session()->get('num_tab')){
            $plats = [];
            foreach(\Cart::getContent() as $plat) {
                $plats [] = '  '.$plat->quantity .' - '.$plat->name .'  ' ;
            }
            // dd($request->session()->get('num_tab'));
            // dd($plats);
            $order = new Order;
            $order->plats =json_encode($plats)  ;
            $order->num_tab = $request->session()->get('num_tab');
            $order->save();
            // clear cart
            \Cart::clear();
            // redirect to menu page 
            return redirect( route('menu'));
        }else{
            return redirect( route('menu') );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('cart');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd(\Cart::get($id)['quantity']);
        \Cart::update($id, array(
            'quantity' => $request->new_qty - \Cart::get($id)['quantity']   , // so if the current product has a quantity of 4, another 2 will be added so this will result to 6
        ));
        
        // dd(\Cart::getContent());
        return redirect( route('show.cart'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        \Cart::clear();

        return redirect(route('show.cart'));
    }
}
