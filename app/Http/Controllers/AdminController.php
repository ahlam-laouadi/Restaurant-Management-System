<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\food;
use App\Models\User;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //user
    public function display(){
        
        
        $users = DB::table('users')->where('user_type', 0)->get();
        
           
            return view('allUsers',compact('users')); 
    

  }
  public function destroy(USER $user)
  {
      $user->delete();
      return redirect()->route('display')->with(['status' => true , "message" => 'user deleted successfully']);
  }
  //food
  public function deletefood(food $food)
  {
    storage::delete($food->image);
      $food->delete();
      return redirect()->route('displayfood')->with(['status' => true , "message" => 'food deleted successfully']);
  }
  public function editfood(food $food){
    return view('editFood',compact('food'));
  }
  public function updatefood(Request $request,food $food){
    $data =$request->validate([
        'title' =>'required',
        'description' => 'required',
        'price' => 'required',
        'image' => 'image|mimes:png,jpg,gif',
       
    ]);
    
    if($request->has('image')){
        storage::delete($food->image);
        $filename=Storage::putFile("foodimage",$data['image']);//هذا السطر بخزن الصورة نفسها داخل ملف اسمه فوداماج هوي بعمله داخل الستورج وبشفر الصورة وبحط امتداه
        //dd( $filename);
$data['image']=$filename;//اخلي الاسم بالداتا بيس هوي الاسم الجديد للصورة بعد التشفير
    }
    
$food->update($data);

return redirect()->route('displayfood')->with(['status' => true , "message" => 'food updated successfully']);




        

       
    
  }
  public function displayfood(){
    $foods=food::all();
    return view('allfood',compact('foods'));
  }
  public function createfood(){
    

        return view('createFood');
   
  }
 public function  storefood(Request $request){
    
    $food =$request->validate([
        'title' =>'required',
        'description' => 'required',
        'price' => 'required',
       'image' => 'required|image|mimes:png,jpg,gif',
    ]);
    

$filename=Storage::putFile("foodimage",$food['image']);//هذا السطر بخزن الصورة نفسها داخل ملف اسمه فوداماج هوي بعمله داخل الستورج وبشفر الصورة وبحط امتداه
//dd( $filename);
$food['image']=$filename;//اخلي الاسم بالداتا بيس هوي الاسم الجديد للصورة بعد التشفير
//dd($request->all());
    food::create($food);
    return redirect()->route('displayfood')->with(['status' => true , "message" => 'food created successfully']);
 }
 //chef
 public function deletechef(Chef $chef)
  {
    storage::delete($chef->image);
      $chef->delete();
      return redirect()->route('displaychef')->with(['status' => true , "message" => 'chef deleted successfully']);
  }
  public function editchef(Chef $chef){
    return view('editChef',compact('chef'));
  }
  public function updatechef(Request $request,Chef $chef){
    
    $data =$request->validate([
        'name' =>'required',
        'chef_type' => 'required',
        'image' => 'image|mimes:png,jpg,gif',
       
    ]);
    
    if($request->has('image')){
        storage::delete($chef->image);
        $filename=Storage::putFile("chefimage",$data['image']);//هذا السطر بخزن الصورة نفسها داخل ملف اسمه شيف اماج هوي بعمله داخل الستورج وبشفر الصورة وبحط امتداه
        //dd( $filename);
$data['image']=$filename;//اخلي الاسم بالداتا بيس هوي الاسم الجديد للصورة بعد التشفير
    }
    
$chef->update($data);

return redirect()->route('displaychef')->with(['status' => true , "message" => 'chef updated successfully']);




        

       
    
  }
  public function displaychef(){
    $chefs=Chef::all();
    return view('allchef',compact('chefs'));
  }
  public function createchef(){
    

        return view('createChef');
   
  }
 public function  storechef(Request $request){
    //dd($request);

    $chef =$request->validate([
        'name' =>'required',
        'chef_type' => 'required',
       'image' => 'required|image|mimes:png,jpg,gif',
    ]);
    

$filename=Storage::putFile("chefimage",$chef['image']);
//dd( $filename);
$chef['image']=$filename;//اخلي الاسم بالداتا بيس هوي الاسم الجديد للصورة بعد التشفير
//dd($request->all());
    Chef::create($chef);
    return redirect()->route('displaychef')->with(['status' => true , "message" => 'chef created successfully']);
 }
 //reservation
 public function reservation(Request $request){
    //dd($request);
    Reservation::create([
        'name' => $request->name,
        'email' => $request->email,
        'time' => $request->time,
        'date' => $request->date,
        'phoneNumber' => $request->phone,
        'numberGuest' => $request->number,
        'Message' => $request->message,
    ]);


    return redirect()->back();

 }
 public function adminreservation(){
   $data =Reservation::all();
   return view('adminreservation',compact('data'));
 }
 public function adminorder(){
    $data =Order::all();
    return view('adminorder',compact('data')); 


 
  }
  public function search(Request $request){
    
    $data =Order::where('name', 'like', '%' . request('name') . '%')->orWhere('foodname', 'like', '%' . request('name') . '%')->get();//get all order to the nameuser inter to search only or get all order to the foodname inter to search 
    return view('adminorder',compact('data')); 
  }
}
