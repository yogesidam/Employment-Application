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
    <form action="{{route('update',$data->id)}}" method="post">
        @csrf


        <div class="container">

        <div class="form-group">
          <label for="exampleInputname">Full Name :</label>
          <input type="text" class="form-control" id="exampleInputtext" 
           {{-- pattern="[A-Za-z]+" title="Please enter a valid full name"  --}}
           placeholder="Enter name" name="name" value="{{old('name',$data->name)}}">
          <span class="text-danger">@error('name'){{$message}}@enderror</span>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword">Password:</label>
          <input type="password" class="form-control" id="exampleInputPassword" placeholder=" Enter Password"  name="pass" value="{{old('pass',$data->password)}}">
          <span class="text-danger">@error('pass'){{$message}}@enderror</span>

        </div>
        <div class="form-group">
            <label for="exampleInputemail">Email:</label>
            <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email" name="email" value="{{old('email',$data->email)}}">
            <span class="text-danger">@error('email'){{$message}}@enderror</span>

          </div>

          <div class="form-group">
            <label for="exampleInputmobileno">Mobile No:</label>
            <input type="number" class="form-control" id="exampleInputmobileno" placeholder=" Enter Mobile NO." name="mobileno" value="{{old('mobileno',$data->mobileno)}}">
            <span class="text-danger">@error('mobileno'){{$message}}@enderror</span>

          </div>

          <div class="form-group">
            <label for="exampleInputmobileno">Country:</label>
            {{-- <input type="text" class="form-control" id="exampleInputcountry" placeholder="Enter Country" name="country" value="{{old('country')}}"> --}}
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Country
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">India</a>
                <a class="dropdown-item" href="#">Canada</a>
                <a class="dropdown-item" href="#">Iran</a>
                <a class="dropdown-item" href="#">America</a>

              </div>
            </div>
          

        <div class="form-group">
            <label for="exampleInputaddress">Address:</label>
            <input type="text" class="form-control" id="exampleInputaddress" placeholder="Enter Address"  name="address" value="{{old('address',$data->address)}}">
            <span class="text-danger">@error('address'){{$message}}@enderror</span>

          </div>
          
         
        <button type="submit" class="btn btn-primary">update</button>
    </div>
      </form>
</body>
</html>