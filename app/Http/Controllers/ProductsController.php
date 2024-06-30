<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view("products.create",compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=>"required|unique:products|min:3|max:80|regex:/(^[0-9a-zA-Z ]+$)/u",
            "price"=>"required|decimal:3",
            "photo"=>"required|image|mimes:png,jpg,webp,jpeg|max:2048",
            "description"=>"required|min:15",
            "category_id"=>"required|numeric"
        ]);
        $inputs=$request->all();
        //traitement de la photo produit
        //verifier si l utilisateur a parcouru une image
        if($photo=$request->file("photo")){
            //changer le nom du fichier
            $newname=time().".".$photo->getClientOriginalExtension();
            //copier le fichier temporaire dans un dossier
            $photo->move("photos/",$newname);
            $inputs["photo"]=$newname;
        }
        Product::create($inputs);
        return redirect()->route("products.index")->with("success","un produit est ajouté avec succés!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("products.show",compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        return view("products.edit",compact("product","categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "name"=>"required|min:3|max:80|regex:/(^[0-9a-zA-Z ]+$)/u",
            "price"=>"required|decimal:3",
            "photo"=>"image|mimes:png,jpg,webp,jpeg|max:2048",
            "description"=>"required|min:15",
            "category_id"=>"required|numeric"
        ]);
        $inputs=$request->all();
        //traitement de la photo produit
        //verifier si l utilisateur a parcouru une image
        if($photo=$request->file("photo")){
            //supprimer l ancien fichier
            if(file_exists("photos/".$product->photo))
        unlink("photos/".$product->photo);
            //changer le nom du fichier
            $newname=time().".".$photo->getClientOriginalExtension();
            //copier le fichier temporaire dans un dossier
            $photo->move("photos/",$newname);
            $inputs["photo"]=$newname;
        }
        $product->update($inputs);
        return redirect()->route("products.index")->with("success","un produit est modifié avec succés!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if(file_exists("photos/".$product->photo))
        unlink("photos/".$product->photo);
        $product->delete();
        return redirect()->route("products.index")->with("success","un produit est supprimé avec succés!");
    }
}
