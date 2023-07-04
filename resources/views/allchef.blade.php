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
<div style="margin-left: 200px;margin-top:50px "> 

<a href="{{ route('createChef') }}" class="btn btn-outline-success" style="padding: 10px">Create</a>
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
        <th scope="col">Chef_Type</th>
        <th scope="col">Image</th>

    </tr>
</thead>
<tbody>
    @forelse ($chefs as $chef)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $chef->name}}</td>
            <td>{{ $chef->chef_type}}</td>
            <td><img src="{{ asset("storage/$chef->image") }}"></td>
            <td>
                <div class="d-flex">
                    <form action="{{ route('editchef' , ['chef' => $chef->id]) }}" method="GET">
                        @csrf
                        <button class="btn btn-sm btn-info">Edit</button>
                    </form>


                    <form class="ms-2" action="{{ route('deletechef', ['chef' => $chef->id]) }}" method="GET">
                        @csrf
                        
                        <button class="btn btn-sm btn-danger">Delete</button>

                    </form>
                </div>
            </td>
         
        </tr>
    @empty

    @endforelse

</tbody>
</table>

  
    </div>
    </div>
   
     @include('ِADMIN.js')
  </body>
</html>