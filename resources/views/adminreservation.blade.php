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
<table class="table table-hover table-striped">
<thead>
    
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">PhoneNumber</th>
        <th scope="col">NumberGuest</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Message</th>
    </tr>
</thead>
<tbody>
    @forelse ($data as $data)
    
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->phoneNumber }}</td>
            <td>{{ $data->numberGuest}}</td>
            <td>{{ $data->date}}</td>
            <td>{{ $data->time }}</td>
            <td>{{ $data->Message }}</td>
           
            
         
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