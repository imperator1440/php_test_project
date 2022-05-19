<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>NEWS</title>
</head>

<body>
<header class="p-3 bg-dark text-white mb-3">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="{{route("home")}}" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none h1">NEWS</a>    
    </div>
  </div>
</header>

<form class="col-4  offset-4 border rounded" methot="POST" action="{{ route('admin.login_process') }}">
    @csrf 
    <h2 class="offset-1 py-2">Log in</h2>
    <div class="offset-1 form-group col-9">
        <label for="email" class="col-form-label-lg">email</label>
        <input class="form-control" id="email" name="email" type="text" value="" placeholder="email">
        @error('email')
        <div class="alert alety-danger">{{ $message}}</div>
        @enderror
    </div>
    <div class="offset-1 form-group col-9 mb-1">
        <label for="password" class="col-form-label-lg">password</label>
        <input class="form-control" id="password" name="password" type="password" value="" placeholder="password">
        @error('password')
        <div class="alert alety-danger">{{ $message}}</div>
        @enderror
    </div>
    <div>
        <button class="offset-1 btn btn-outline-light me-2 mb-2 bg-dark mt-1" type="submit" name="sendMe" value="1">Log in</button>  
    </div>
</form>


</body>

