<!DOCTYPE html>
<html lang="en">
  <head>
    @include("ِADMIN.css")
  </head>
  <body>
    <x-app-layout>
                                
    </x-app-layout>
    <div class="container-scroller ">
        
@include('ِADMIN.nav')
<div class="container">
    <div class="row">
<div class="d-flex ">
    
    <form action="{{ route('search' )}}" method="GET"style="margin-top:10px;margin-left:20px">
        @csrf
       
        <input type="text"  name="name" id="name" placeholder="Enter Name" >
        <br>
        <br>
        <button  style="margin-left:48px"type="submit" name="search" class="btn btn-sm btn-info">Search</button>

    </form></div>
<div style="margin-left: 200px;margin-top:50px "> 


@if (session('status'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
<table class="table table-hover table-striped">
<thead>
    
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">PhoneNumber</th>
        <th scope="col">Address</th>
        <th scope="col">FoodName</th>
        <th scope="col">FoodPrice</th>
        <th scope="col">FoodQuantity</th>
        <th scope="col">TotalPrice</th>
    </tr>
</thead>
<tbody>


    @forelse ($data as $data)
    
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $data->name }}</td>
            <td>{{ $data->phone }}</td>
            <td>{{ $data->address }}</td>
            <td>{{ $data->foodname }}</td>
            <td>{{ $data->price}}</td>
            <td>{{ $data->foodquantity }}</td>
            <td>{{($data->price) * ($data->foodquantity) }}</td>
           
           
            
         
        </tr>
    @empty

    @endforelse

</tbody>
</table>

  
    </div>
    </div>
</div>
    </div>
     @include('ِADMIN.js')
  </body>
</html>