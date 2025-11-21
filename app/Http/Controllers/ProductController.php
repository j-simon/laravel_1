<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index()
    {

        // 13.5 Raw Sql
        // $products=DB::selct("SELECT * FROM products_ue14;");
        // a) produkte aus database 
        // 15. QUeryBuilder
        // $products =  DB::table('products_ue14')->get(); // alle
        // dd($products);
        // 16 Eloquent
        // $products = Product::all();
        $products = Product::lazy(10);
       
        $products = $products->map(function ($product) {
            $product->name = strtolower($product->name);
            return $product;
        });

        

        // b) an view senden und anzeigen
        return view("products.index", compact("products"));
    }

    public function store(Request $request)
    {

        // Validate form data
        $returnArray = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:99999999.99|decimal:0,2',
            'in_stock' => 'required'
        ]);

        // // Retrieve validated data
        // $name = $request->input('name');
        // $price = $request->input('price');


        // dump($request->all());
        // speichern
        // dd("speichern! QueryBuilder speichern");
        // DB::table('products_ue14')->insert([
        //     'name' => $name,
        //     'price' => $price
        // ]);

        // Variante a)
        // $product = Product::firstOrCreate(
        //    ['name' => $name, 'price' => $price]
        // );

        Product::firstOrCreate($returnArray);

        // Variante b)
        // $product = new Product();
        // $product->name = $name;
        // $product->price = $price;
        // $product->save();


        //  return redirect("/products_ue14")->with('success', 'Product added successfully!');
        return "OK";
    }
}
