<!DOCTYPE html>
<html lang="en">
<head>
    <base href="/public" >
    @include("ِADMIN.css")

</head>
<body>
    <x-app-layout>
                                
    </x-app-layout>
    <div class="container-scroller ">
        
@include('ِADMIN.nav')
   
    <form action="{{ route('updatefood', ['food' => $food->id]) }}" class="w-50" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
        @csrf
      
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" name="title" value="{{ $food->title }}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('title')
            <div class="text-danger">{{ $message }}</div>
    
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Description</label>
            <input type="text" name="description"value="{{ $food->description }}" class="form-control" id="exampleInputPassword1">
            @error('description')
            <div class="text-danger">{{ $message }}</div>
    
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Price</label>
            <input type="number" name="price" value="{{ $food->price }}"class="form-control" id="exampleInputPassword1">
            @error('price')
            <div class="text-danger">{{ $message }}</div>
    
            @enderror
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Image</label>
            <img src="{{asset("storage/$food->image")}}" style="width:100px" alt="">
            <input type="file" name="image" class="form-control" id="images">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
    
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @include('ِADMIN.js')

</body>
</html>