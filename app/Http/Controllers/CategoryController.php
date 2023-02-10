<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
        return view('Pages.Products.category-new');
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
            'name_category' => 'required',
        ]);

        // return str_replace([' ',','], ['-',''],$validatedData['name_category']);
        
        DB::transaction(function() use ($validatedData){
            
            Category::create([
                'name' => $validatedData['name_category'],
                'slug' => str_replace([' ',','], ['-',''],$validatedData['name_category'])
            ]);

        });

        $redirect = redirect()->route("products.index");

        return $redirect->with([
            'message'    => "Category has been Added",
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $edit = true;
        // return $category->name;
        return view('Pages.Products.category-new', compact('edit','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name_category' => 'required',
        ]);

        // return str_replace([' ',','], ['-',''],$validatedData['name_category']);
        
        DB::transaction(function() use ($validatedData, $category){
            
            $category->name = $validatedData['name_category'];
            $category->slug = str_replace([' ',','], ['-',''],$validatedData['name_category']);
            $category->save();

        });

        $redirect = redirect()->route("products.index");

        return $redirect->with([
            'message'    => "Category has been Updated",
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        $redirect = redirect()->route("products.index");

        return $redirect->with([
            'message'    => "Category has been Deleted",
            'success' => true,
        ]);
    }

    public function fetchCategory(Request $request)
    {
        $data['categories'] = Category::all();

        return response()->json($data);
    }
}

?>