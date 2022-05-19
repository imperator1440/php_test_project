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
  <header class="p-3 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="{{route("home")}}" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none h1">NEWS</a>

          <form method="GET" action="{{route('search')}}" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 ms-md-auto">
            <input name="search" id="search" type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
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

    <main class="container">

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
              <a class="p-2 link-secondary" href="#">World</a>
              <a class="p-2 link-secondary" href="#">Politics</a>
              <a class="p-2 link-secondary" href="#">Business</a>
              <a class="p-2 link-secondary" href="#">Tech</a>
              <a class="p-2 link-secondary" href="#">Science</a>
              <a class="p-2 link-secondary" href="#">Sport</a>
              <a class="p-2 link-secondary" href="#">Health</a>
              <a class="p-2 link-secondary" href="#">Arts</a>
              <a class="p-2 link-secondary" href="#">Travel</a>
            </nav>
      </div>

      <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic">{{$lastPost[0]->title}}</h1>
          <p class="lead my-3">{{$lastPost[0]->preview}}</p>
          <p class="lead mb-0"><a href="{{route("show", $lastPost[0]->id)}}" class="text-white fw-bold">Continue reading...</a></p>
        </div>
      </div>

     
      @foreach($posts as $post)
        
          <div class="col-md-12">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">{{$post->category}}</strong>
                <h3 class="mb-0">{{$post->title}}</h3>
                <div class="mb-1 text-muted">{{$post->created_at}}</div>
                <p class="card-text mb-auto">{{$post->preview}}</p>
                <a href="{{route("show", $post->id)}}" class="stretched-link">Continue reading</a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <img class="bd-placeholder-img" width="400" height="250" src="/storage/posts/{{$post->thumbnail}}"></img>
              </div>
            </div>

      @endforeach



      
      {{$posts->links()}}
    

    </main>
  
  <footer class="p-3 bg-dark text-white">
    <div class="text-center p-3">
      © 2022 Copyright: NEWS
    </div>
  </footer>
</body>
</html>