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
   
    <form action="{{ route('update', ['chef' => $chef->id])  }}" class="w-50" method="post" enctype="multipart/form-data" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $chef->name }}"id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('name')
            <div class="text-danger">{{ $message }}</div>
    
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Chef_type</label>
            <input type="text" name="chef_type"value="{{ $chef->chef_type }}" class="form-control" id="exampleInputPassword1">
            @error('chef_type')
            <div class="text-danger">{{ $message }}</div>
    
            @enderror
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">Image</label>
            <img src="{{asset("storage/$chef->image")}}" style="width:100px" alt="">
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