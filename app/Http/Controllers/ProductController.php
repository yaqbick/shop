<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
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
            'product_name' => 'required|max:255|unique:products,name',
            'product_sku' => 'required|numeric|unique:products,SKU',
            'product_price' => 'required|numeric'
        ]);

        $product = [
            'SKU' => $request->get('product_sku'),
            'name' => $request->get('product_name'),
            'short_description' => $request->get('product_short_description'),
            'description' => $request->get('product_description'),
            'price' => $request->get('product_price'),
            'discount_price' => $request->get('product_discount_price'),
            'image' => $request->get('product_image'),
            'url' => $request->get('product_url'),
            'weight' => $request->get('product_weight'),
            'length' => $request->get('product_length'),
            'width' => $request->get('product_width'),
            'height' => $request->get('product_height'),
            'categories' => $request->get('product_categories'),
            'tags' => null,
            'type' => 'simple',
            'is_purchasable' => $request->get('is_product_purchasable'),
            'is_taxable' => null,
            'tax' => $request->get('product_tax'),
            'qty' => null
        ];
        Product::create($product);
        return redirect('/products/create')->with('success', 'Product is successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function list()
    {
        $products = Product::all()->toArray();
        return view('products.list', compact('products'));
    }

    public function importExportView()
    {
       return view('products.import');
    }
   
    public function export() 
    {
        return Excel::download(new ProductsExport, 'users.xlsx');
    }
   

    public function import() 
    {
        Excel::import(new ProductsImport,request()->file('file'));
           
        return back();
    }
}
