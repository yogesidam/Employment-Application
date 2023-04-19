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

         {{--  country-state-city field  --}}

          <div class="form-group">
           <select name="country_id" id="country-dd" class="form-control">
            <option value="">Select Country</option>
            @foreach ($countries as $data)
            <option value="{{$data->id}}">{{$data->name}}</option>
            @endforeach
           </select>
          </div>
          <div class="form-group">
            <select id="state-dd" class="form-control" name="state_id"></select>
          </div>
          <div class="form-group">
            <select id="city-dd" class="form-control" name="city_id"></select>
          </div>
          

        <div class="form-group">
            <label for="exampleInputaddress">Address:</label>
            <input type="text" class="form-control" id="exampleInputaddress" placeholder="Enter Address"  name="address" value="{{old('address',$data->address)}}">
            <span class="text-danger">@error('address'){{$message}}@enderror</span>

          </div>
          
         
        <button type="submit" class="btn btn-primary">update</button>
    </div>
      </form>

      {{-- ajex method /script --}}
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
        $(document).ready(function () {
  
            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country-dd').on('change', function () {
                var idCountry = this.value;
                $("#state-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-states')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dd').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#city-dd').html('<option value="">-- Select City --</option>');
                    }
                });
            });
  
            /*------------------------------------------
            --------------------------------------------
            State Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#state-dd').on('change', function () {
                var idState = this.value;
                $("#city-dd").html('');
                $.ajax({
                    url: "{{url('api/fetch-cities')}}",
                    type: "POST",
                    data: {
                        state_id: idState,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dd').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dd").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
  
        });
    </script>
</body>
</html>