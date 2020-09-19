<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|max:255|unique:products,name',
            'product_sku' => 'required|numeric|unique:products,SKU',
            'product_price' => 'required|numeric',
        ]);

        $path = $request->file('product_image')->storeAS('images', $request->file('product_image')->getClientOriginalName());
        $product = [
            'SKU' => $request->get('product_sku'),
            'name' => $request->get('product_name'),
            'short_description' => $request->get('product_short_description'),
            'description' => $request->get('product_description'),
            'price' => $request->get('product_price'),
            'discount_price' => $request->get('product_discount_price'),
            'image' => $path,
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
            'qty' => null,
        ];
        Product::create($product);

        return redirect('/panel/products/create')->with('success', 'Product is successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|max:255',
            'product_sku' => 'required|numeric',
            'product_price' => 'required|numeric',
        ]);

        $file = $request->file('product_image')->storeAs('public', $request->file('product_image')->getClientOriginalName());
        $url = Storage::url($file);
        // $product = [
        //     'SKU' => $request->get('product_sku'),
        //     'name' => $request->get('product_name'),
        //     'short_description' => $request->get('product_short_description'),
        //     'description' => $request->get('product_description'),
        //     'price' => $request->get('product_price'),
        //     'discount_price' => $request->get('product_discount_price'),
        //     'image' => $path,
        //     'url' => $request->get('product_url'),
        //     'weight' => $request->get('product_weight'),
        //     'length' => $request->get('product_length'),
        //     'width' => $request->get('product_width'),
        //     'height' => $request->get('product_height'),
        //     'categories' => $request->get('product_categories'),
        //     'tags' => null,
        //     'type' => 'simple',
        //     'is_purchasable' => $request->get('is_product_purchasable'),
        //     'is_taxable' => null,
        //     'tax' => $request->get('product_tax'),
        //     'qty' => null
        // ];
        $product = Product::find($id);
        $product->SKU = $request->get('product_sku');
        $product->name = $request->get('product_name');
        $product->short_description = $request->get('product_short_description');
        $product->description = $request->get('product_description');
        $product->price = $request->get('product_price');
        $product->discount_price = $request->get('product_discount_price');
        $product->image = $url;
        $product->url = $request->get('product_url');
        $product->weight = $request->get('product_weight');
        $product->length = $request->get('product_length');
        $product->width = $request->get('product_width');
        $product->height = $request->get('product_height');
        $product->categories = $request->get('product_categories');
        $product->tags = null;
        $product->type = 'simple';
        $product->is_purchasable = $request->get('is_product_purchasable');
        $product->is_taxable = null;
        $product->tax = $request->get('product_tax');
        $product->qty = null;
        $product->save();

        return redirect()->back()->with('success', 'Contact updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
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
        return Excel::download(new ProductsExport(), 'users.xlsx');
    }

    public function import()
    {
        Excel::import(new ProductsImport(), request()->file('file'));

        return back();
    }
}
