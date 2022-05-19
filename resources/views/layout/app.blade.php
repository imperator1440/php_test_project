<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>NEWS</title>
</head>

<body>

    <script src="/js/app.js"></script>



    <header class="p-3 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none h1">NEWS</a>

          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 ms-md-auto">
            <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
          </form>

          @guest("web")
          <div class="text-end">
            <a href="{{route('login')}}" type="button" class="btn btn-outline-light me-2">Login</a>
            <a href="{{route('registration')}}" type="button" class="btn btn-outline-light me-2">Sign up</a>
          </div>
          @endguest

          @auth("web")
          <div class="text-end">
            <a href="{{route('logout')}}" type="button" class="btn btn-outline-light me-2">Logout</a>
          </div>
          @endauth

        </div>
        </div>
    </header>

</body>
</html>