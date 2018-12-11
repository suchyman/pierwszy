<?php

namespace App\Http\Controllers;
use Spatie\Activitylog\Models\Activity;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$this->middleware('auth');
        $products = Product::latest()->paginate(10);

        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
// DB::insert('insert into users (id, date, what) values (?, ?, ?)', array(1, 'Dayle', 'heh'));
        Product::create($request->all());
        // return History::create([
        //     'id' => $data['data'],
        //     'date' => 'asd',
        //     'what' => 'sda'
        // ]);

        activity()
   ->withProperties([$request->user_send])
   ->log('Dodanie');

      //  Spatie\Activitylog\Models\Activity::all();
//activity()->log('Dodano nowego'); //działa
// $lastActivity = Activity::all()->last(); //returns the last logged activity
//
// $lastActivity->description; //returns 'Look mum, I logged something';
//activity()->log('User called get balance', 2153306);

        return redirect()->route('products.index')
                        ->with('success','Dodano!!!');
    }

    /**public function create2(array $data)
    {
        return history::create([
            'id' => $data['data'],
            'date' => 'asd',
            'what' => 'sda'
        ]);
    }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')
                        ->with('success','Uaktualniono!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success','Usunięty pomyślnie');
    }
}
