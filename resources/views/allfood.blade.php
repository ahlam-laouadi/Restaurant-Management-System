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

<a href="{{ route('createfood') }}" class="btn btn-outline-success" style="padding: 10px">Create</a>
@if (session('status'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
<table class="table table-hover table-striped">
<thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Price</th>
        <th scope="col">Image</th>

    </tr>
</thead>
<tbody>
    @forelse ($foods as $food)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $food->title }}</td>
            <td>{{ $food->description }}</td>
            <td>{{ $food->price }}</td>
            <td><img src="{{ asset("storage/$food->image") }}"></td>
            <td>
                <div class="d-flex">
                    <form action="{{ route('editfood' , ['food' => $food->id]) }}" method="GET">
                        @csrf
                        <button class="btn btn-sm btn-info">Edit</button>
                    </form>


                    <form class="ms-2" action="{{ route('deletefood', ['food' => $food->id]) }}" method="GET">
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