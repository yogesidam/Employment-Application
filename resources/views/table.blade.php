<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<body>



    
    <a href="{{route('user')}}"><button type="button" class="btn btn-success">Add</button>
    </a>

    {{-- msg --}}
    @if (session()->has('msg'))
    <div class="alert alert-success">
      {{session()->get('msg')}}
      <a href="" class="close" data-dismiss="alert" aria-label="close">X</a>        
    </div>
@endif


{{-- table --}}


    <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            {{-- <th scope="col">Password</th> --}}
            <th scope="col">Email</th>
            <th scope="col">Mobile No</th>
            <th scope="col">Country</th>
            <th scope="col">Address</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)

          <tr>
            <td>{{$d->id}}</td>
            <td>{{$d->name}}</td>
            {{-- <td>{{$d->password}}</td> --}}
            <td>{{$d->email}}</td>
            <td>{{$d->mobileno}}</td>
            <td>{{$d->country}}</td>
            <td>{{$d->address}}</td>
            <td><a href="{{route('edit',$d->id)}}"><button type="button" class="btn btn-warning">edit</button>
            </a>
            <a href="{{route('delete',$d->id)}}"><button type="button" class="btn btn-danger">delete</button></a>
            </td>
            
          </tr>
          @endforeach

        </tbody>
      </table>
    
</body>
</html>