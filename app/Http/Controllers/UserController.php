<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    /* Register Section */
    // View Register
    function viewCreate(Request $req){

        if ($req->session()->has('user')){
            return redirect('/profile');
        }

        return view('user.signup');
    }

    // Perform Register
    function createAccount(Request $req){

        if ($req->session()->has('user')){
            return redirect('/profile');
        }

        $inputs = $req->input();

        if (empty($inputs['username']) || empty($inputs['email']) || empty($inputs['password']) ){
            return 'Empty Fields';
        }else {
            User::create([
                'username' => $req->input('username'),
                'email' => $req->input('email'),
                'password' => Hash::make($req->input('password')),
            ]);
            return redirect('/login');
        }
    }

    /* Login Section */
    // View Login
    function viewLogin(Request $req){

        if ($req->session()->has('user')){
            return redirect('/profile');
        }

        return view('user.login');
    }

    // Perform Login
    function loginAccount(Request $req){
        
        if ($req->session()->has('user')){
            return redirect('/profile');
        }

        $inputs = $req->input();

        if (empty($inputs['email']) || empty($inputs['password']) ){
            return 'Empty Fields';
        }else {
            $user = User::where('email',$req->input('email'))->first();
                if ($user){
                    if (Hash::check($req->input('password'),$user->password)) {
                        $req->session()->put('user',$user);
                        return redirect('profile');
                    }else {
                        return 'Not Valid';
                    }
                }else {
                    return 'Email or password isn\'t correct';
                }
        }
    }

    /* Profile Section */

    // View Profile
    function viewProfile(Request $req){

        if ($req->session()->has('user')){
            $user = User::where('email',$req->session()->get('user')->email)->first();
            return view('user.profile',[
                'user' => $user,
            ]);
        }else {
            return redirect('/login');
        }
    }

    // Edit Profile
    function editAccount(Request $req){
        $inputs = $req->input();
        $user = User::where('email',$req->session()->get('user')->email)->first();

        if (empty($inputs['username']) || empty($inputs['email'])){
            return 'Empty Fields';
        }else {
            if (empty($inputs['password'])){
                return 'Password can\'t be empty';
            }else {
                if (Hash::check($inputs['password'],$user->password)){
                    User::where('email',$user->email)->update([
                        'username' => $inputs['username'],
                        'email' => $inputs['email']
                    ]);
                    return redirect('/profile');
                }else {
                    return 'Password is incorrect';
                }
            }
        }
    }

    // Delete Profile
    function deleteAccount(Request $req){
        $inputs = $req->input();
        $user = User::where('email',$req->session()->get('user')->email)->first();

        if (empty($req->input('password'))){
            return 'Password can\'t be empty';
        }else {
            if (Hash::check($req->input('password'),$user->password)){
                User::find($user->id)->delete();
                $req->session()->forget('user');
            }else {
                return 'password is incorrect';
            }
        }
    }

    // Logout Profile
    function logout(Request $req){
        if ($req->session()->has('user')){
            $req->session()->forget('user');
            return redirect('/login');
        }
        return redirect('/login');
    }

    function viewProducts(Request $req){

        if ($req->session()->has('user')){
            $user = User::where('email',$req->session()->get('user')->email)->first();
            $products = Product::where('user_id',$user->id)->get()->all();

            return view('product.shop',[
                'products' => $products,
                'user' => $user
            ]);
        }else {
            return redirect('/login');
        }
    }
}
