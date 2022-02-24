<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function viewProducts(){
        $products = Product::all();
        return view('product.shop',[
            'products' => $products,
        ]);
    }

    function createProduct(Request $req){
        
        if ($req->session()->has('user')){

            $inputs = $req->input();
            $user = $req->session()->get('user');

            foreach ($inputs as $i){
                if (empty($i)){
                    return 'Empty Fields';
                }
            }

            Product::create([
                'title' => $inputs['title'],
                'description' => $inputs['description'],
                'url' => $inputs['url'],
                'price' => $inputs['price'],
                'user_id' => $user->id,
            ]);

            return redirect('/profile/products');

        }else {
            return redirect('/login');
        }
        
    }

    function viewEdit(Request $req,$id){
        if (!$req->session()->has('user')){
            return redirect('/login');
        }else {
            $product = Product::where('id',$id)->get()->first();
            return view('product.edit',[
                'product' => $product,
            ]);
        }
    }

    function editProduct(Request $req , $id){
        if (!$req->session()->has('user')){
            return redirect('/login');
        }else {
            $inputs = $req->input();

            foreach ($inputs as $i){
                if (empty($i)){
                    return 'Empty Fields';
                }
            }

            $user = $req->session()->get('user');
            $product = Product::where('id',$id)->get()->first();

            if ($product->user_id === $user->id){
                $product->update([
                    'title' => $inputs['title'],
                    'description' => $inputs['description'],
                    'url' => $inputs['url'],
                    'price' => $inputs['price'],
                ]);
            }else {
                return 'Not Authorized';
            }
        }
    }

    function deleteProduct(Request $req , $id){
        if (!$req->session()->has('user')){
            return redirect('/login');
        }
        else {
            $inputs = $req->input();

            $user = $req->session()->get('user');
            $product = Product::where('id',$id)->get()->first();
    
            if ($product->user_id === $user->id){
                $product->delete();
            }else {
                return 'Not Authorized';
            }
        }
    }
}
