<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('Pages.Products.service-new', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_product' => 'required',
            'category' => 'required',
            'product_image' => 'image|file',
            'singlePrice' => '',
            'variants' => '',
            'price' => '',
            'description' => ''
        ]);
        //check image
        // if($request->file('product_image'))
        // {
        //     $rules['product_image'] = 'image|file';
        // }


        // return $validatedData;
        
        DB::transaction(function() use ($validatedData){
            $price = null;
            if(isset($validatedData['product_image'])){
                $validatedData['product_image'] = $validatedData['product_image']->store('product_image');
            }
            else{
                $validatedData['product_image'] = null;
            }

            if(isset($validatedData['singlePrice'])){
                $price = $validatedData['singlePrice'];
            }
            
            $service = Service::create([
                'name' => $validatedData['name_product'],
                'product_image' => $validatedData['product_image'],
                'category_id'=> $validatedData['category'],
                'description'=> $validatedData['description'],
                'price' => $price,
                'slug' => str_replace([' ',','], ['-',''], $validatedData['name_product']),
            ]);
    
            if(!isset($validatedData['singlePrice'])){
                // $variants=[];
                foreach($validatedData['variants'] as $key=>$val)
                {
                    // $variants[$key] = [
                    //     'service_id' => $service->id,
                    //     'name' => $val,
                    //     'price' => $validatedData['price'][$key]
                    // ];

                    $variant = new Variant();
                    $variant->service_id = $service->id;
                    $variant->name = $val;
                    $variant->price = $validatedData['price'][$key];
                    $variant->save();
                }

                // Variant::insert($variants);
            };

        });

        $redirect = redirect()->route("products.index");

        return $redirect->with([
            'message'    => "Service has been Added",
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $categories = Category::all();
        // return $service->variants;
        return view('Pages.Products.service-edit', compact('service','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        // return $request;
        $validatedData = $request->validate([
            'name_product' => 'required',
            'category' => 'required',
            'product_image' => 'image|file',
            'singlePrice' => '',
            'variants' => '',
            'price' => '',
            'description' => '',
            'sku' => ''
        ]);

        DB::transaction(function() use ($validatedData, $service){
            // $price = null;
            if(isset($validatedData['product_image'])){
                $service->product_image = $validatedData['product_image']->store('product_image');
            }

            if(isset($validatedData['singlePrice'])){
                $service->price = $validatedData['singlePrice'];
            }
            
            if(!isset($validatedData['singlePrice'])){
                // Variant::where('service_id',$service->id)->delete();
                Variant::where('service_id',$service->id)->whereNotIn('sku',$validatedData['sku'])->delete();
                foreach($validatedData['variants'] as $key=>$val)
                {

                    if (isset($validatedData['sku'][$key])) {
                        Variant::where('sku', $validatedData['sku'][$key])
                                ->update([
                                    'name' => $val,
                                    'price' => $validatedData['price'][$key]
                                ]);
                    }

                    else
                    {
                        $variant = new Variant();
                        $variant->service_id = $service->id;
                        $variant->name = $val;
                        $variant->price = $validatedData['price'][$key];
                        $variant->save();
                    }

                }
            };

            $service->name = $validatedData['name_product'];
            $service->slug = str_replace([' ',','], ['-',''], $validatedData['name_product']);
            $service->category_id = $validatedData['category'];
            $service->description = $validatedData['description'];

            $service->save();
            

        });

        $redirect = redirect()->route("products.index");

        return $redirect->with([
            'message'    => "Service has been Updated",
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        $redirect = redirect()->route("products.index");

        return $redirect->with([
            'message'    => "Service has been Deleted",
            'success' => true,
        ]);
    }
}
