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
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
<table class="table table-hover">
    <thead >
        <tr  >
            <th style ="font-size:20px; color:white "scope="col">UserNum</th>
            <th style ="font-size:20px; color:white  "scope="col">UserName</th>
            <th style ="font-size:20px;  color:white"scope="col">UserEmail</th>
           

        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
            <tr>
                <th style ="font-size:20px"scope="row">{{ $loop->iteration }}</th>
                <td style ="font-size:20px" >{{ $user->name }}</td>
                <td style ="font-size:20px">{{ $user->email }}</td>
                <td>
                    <div class="d-flex">
                       


                        <form class="ms-2" action="{{ route('user_delete', ['user' => $user->id]) }}" method="GET">
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
  
     
     @include('ِADMIN.js')
  </body>
</html>

