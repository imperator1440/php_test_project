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
          <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 ms-md-auto">
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

    <div>
        

        <div class="container">
            <div class="dynamicDiv" id="dd.0.1.0"></div>
            <div class="row">
                <div class="col-md-12 ct-content">
                    <div class="dynamicDiv" id="dd.0.1.1">
                        <div class="blog-wrapper">
                            <h1>
                                 {{ $post->title}}
                            </h1>
                            <h2>
                                 {{$post->preview}}
                            </h2>
                            <p>
                                <img class="align="left" vspace="5" hspace="5" src="/storage/posts/{{$post->thumbnail}}">
                                {{$post->description}}
                                
                            </p>
              
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
    <div class="py-4">
                <section class="col-4  offset-4 border rounded ">
                    <div class="offset-2 form-group col-9 mb-1 py-4">
                        <form method="POST" action="{{route("comment", $post->id)}}"> 
                            @csrf
                            <textarea name="text" class="col-form-label-lg py-2" placeholder="Your comment..." spellcheck="false"></textarea>
                            
                            @error('text')
                                <div class="alert alety-danger">{{ $message}}</div>
                            @enderror

                            <button type="submit" class="offset-3 btn btn-outline-light  bg-dark ">Send </button>
                        </form>
                    </div>

                    <div id="task-comments" class="pt-4">
                        @foreach($post->comments as $comment)
                        <div class="bg-white rounded-lg p-3  flex flex-col justify-center items-center md:items-start shadow-lg mb-4">
                            <div class="flex flex-row justify-center mr-2">
                                <label class="offset-1 col-form-label-lg">{{$comment->user->name}}:</label>
                                <label class="comment">{{$comment->text}}</label>
                            </div>
                        </div>
                        <!--  comment end-->
                    </div>
                    @endforeach
                </section>

            </div>
        </div>

    

    <footer class="p-3 bg-dark text-white">
    <div class="text-center p-3">
      © 2022 Copyright: NEWS
    </div>
  </footer>
</body>
</html>


