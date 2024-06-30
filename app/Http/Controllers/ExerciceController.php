<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Orderline;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExerciceController extends Controller
{
    public function acceuil(){

        return redirect('/produits');
    }

    public function about(){
        return view('about');
    }
    public function produits($category_id=null){

        if($category_id>0)
        $products=Product::where('category_id',$category_id)->get();
        else
        $products=Product::all();
        $categories=Category::all();

        return view('produits', compact('products','categories'));
    }
    public function contact(){
        return view('contact');
    }

    public function post(request $request){

        $inputs=$request->all();
        return view('show',compact("inputs"));
    }
    public function admin(){
        return redirect('login');
    }
    public function addtocard(request $request){

        $id=$request->input('id');
        $product=Product::find($id);
        $panier=session()->get("panier");


        if(isset($panier[$id]))
            $panier[$id]["qte"]++;

        else
            $panier[$id]=["id"=>$product->id,"name"=>$product->name,"price"=>$product->price,"description"=>$product->description,"photo"=>$product->photo,"qte"=>1];

        session()->put("panier", $panier);

        return redirect()->route('exercice.produits');
    }
    public function removeproduct(request $request){
        $id=$request->input('id');
        $panier=session()->get("panier");
        unset($panier[$id]);
        session()->put("panier", $panier);
        return redirect()->back();
    }
    public function cart(request $request){
        $products=session()->get('panier');
        return view('cart',compact('products'));
    }

    public function checkout(){
        $total = 0;
        if (is_array(session()->get("panier"))){
        foreach(session()->get("panier") as $product)
        if (isset($product["qte"]) && is_numeric($product["qte"])){
        $total += $product["qte"] * $product["price"];
        }else {
        $total = 0;
        }
        return view('checkout', compact('total'));
    } else {

        return redirect()->back()->withErrors(['msg' => 'panier vide !!!!']);
    }
    }
    public function addorder(){
        if (isset(Auth::user()->id)){

       $order = ["date"=>date("y-m-d"), "user_id"=>Auth::user()->id,"user_name"=>Auth::user()->name, "user_email"=>Auth::user()->email,"user_tel"=>Auth::user()->tel,"user_adresse"=>Auth::user()->adresse, "validated"=>false ];
       $neworder =Order::create($order);

       $order_id = $neworder->id;
       if(session()->has('panier')){

        foreach(session()->get("panier") as $product){
            $product=["product_id"=>$product["id"],"product_name"=>$product["name"],"qte"=>$product["qte"], "price"=>$product["price"], "order_id"=>$order_id,];

            Orderline::create($product);
        }
    }
        session()->forget("panier");

        return view("success", compact('order_id'));
    } else {


return  redirect()->back()->withErrors(['msg' => 'tu dois avoir un compte pour faire un commande']);
}

    }

    public function showDetails($id)
{
    $order = Order::findOrFail($id);
    $orderlines = Orderline::where('order_id', $id)->get();

    return view('details', compact('order', 'orderlines'));
}

public function contactus(){
    return view('contactus');
}


}
