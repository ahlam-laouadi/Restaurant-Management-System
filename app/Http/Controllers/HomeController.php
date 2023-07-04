<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $data2=Chef::all();
        $data=food::all();
        return view('home',compact('data','data2'));

    }
    public function adminHome(){
        
          $userType = Auth::user()->user_type;//to check if is user is admin or any user
          if($userType==1){
        return view('adminHome');}
        else{
            $user_id=Auth::id();
            
            $count=Cart::where('userid',$user_id)->count();
            $data=food::all();
            $data2=Chef::all();
            return view('home',compact('data','data2','count')); 
        }

    }
    public function addcart(Request $request,food $food){
if(Auth::id())//check if user login and get id to user login or not (if user login you can add to cart)
{
$userid=Auth::id();
$foodid=$food->id;
$quantity=$request->quantity;
Cart::create([
    'userid' => $userid,
    'foodid' => $foodid,
    'quantity' => $quantity,
    
]);
return redirect()->back();
}
else{
    return redirect('/login');
}
    }
    public function showcart($userid){
        $count=Cart::where('userid',$userid)->count();//get count where userid column in cart table equal $userid 
        $data=Cart::where('userid',$userid)->join('food','carts.foodid','=','food.id')->get();//get data where id of user make ligin and get food data when join food table with carts table(where carts.foodid = food.id)
        $cartid=Cart::where('userid',$userid)->get();
       // dd($cartid);
       return view('showcart',compact('count','data','cartid'));
    

       
            }
          /*  public function deleteproduct($cartid){
               $data=Cart::find($cartid) ;
               $data->delete();
            return  redirect()->back();
                 
                  
            }*/
            public function deleteproduct( Cart $cartid){
                
                $cartid->delete();
             return  redirect()->back();
                  
                   
             }
             public function orderconfirm(Request $request, $userid){
                $data=Cart::where('userid',$userid)->join('food','carts.foodid','=','food.id')->get();//get data where id of user make ligin and get food data when join food table with carts table(where carts.foodid = food.id)
               // dd($data);
               foreach($data as $data){
                Order::create([
'name'=>$request->name,
'phone'=>$request->phone,
'address'=>$request->address,
'foodname'=>$data->title,
'price'=>$data->price,
'foodquantity'=>$data->quantity,
                ]);
               }
return redirect()->back();
             }

}
