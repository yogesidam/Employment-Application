<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
 <style>
    .container{width: 400px; margin-top:20px;background-color: rgb(241, 243, 243)}
    h1{text-align: center;color: brown;text-decoration-line: underline;margin-bottom: 50px}
    .btn{position: relative;left: 150px;margin-bottom: 50px}
 </style>
</head>
<body>
  <div class="container border rounded">
    <form action="{{route('store')}}" method="post">
        @csrf
        <h1><em>Application Form</em></h1>
        <div class="form-group">
          <label for="exampleInputname">Full Name: </label>
          <input type="text" class="form-control" id="exampleInputtext" placeholder="Enter Name" name="name"
           value="{{old('name')}}">
          <span class="text-danger">@error('name'){{$message}}@enderror</span>
        </div>

        <div class="form-group">
          <label for="exampleInputPassword">Password:</label>
          <input type="password" class="form-control" id="exampleInputPassword" placeholder="Enter Password"  name="pass" value="{{old('pass')}}">
          <span class="text-danger">@error('pass'){{$message}}@enderror</span>

        </div>
        <div class="form-group">
            <label for="exampleInputemail">Email: </label>
            <input type="email" class="form-control" id="exampleInputEmail" placeholder="Enter Email" name="email" value="{{old('email')}}">
            <span class="text-danger">@error('email'){{$message}}@enderror</span>

          </div>

          <div class="form-group">
            <label for="exampleInputmobileno">Mobile No:</label>
            <input type="number" class="form-control" id="exampleInputmobileno" placeholder="Enter Mobile no" name="mobileno" value="{{old('mobileno')}}">
            <span class="text-danger">@error('mobileno'){{$message}}@enderror</span>
          </div>   

          <div class="form-group">
            <label for="exampleInputaddress">Address:</label>
            <input type="address" class="form-control" id="exampleInputaddress" placeholder="Enter Address"  name="address" value="{{old('address')}}">
            <span class="text-danger">@error('address'){{$message}}@enderror</span>
          </div>


        {{--  country-state-city field  --}}

          <div class="form-group">
            <label for="">Country/ State/ city:</label>
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
          </div><hr>
        <button type="submit" class="btn btn-primary ">Submit</button>
    </div>
      </form>


      {{-- ajex /jquery script start here --}}
     
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
</body>
</html>