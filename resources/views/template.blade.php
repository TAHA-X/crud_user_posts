<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>@yield("title")</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('posts.index') }}">{{ Auth::user()->name }}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('posts.index') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('posts.create') }}">ajouter</a>
              </li>
              <li class="nav-item">
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                   <button type="submit" class="btn btn-secondary">logout</button>
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>

       <div class="container  mt-2">
            // chaque session est un message vien du controleur
            @if(Session::has('ajouter'))
              <p id="message" class="alert alert-success">{{ Session::get('ajouter') }}</p>
            @endif

            @if(Session::has('supprimer'))
               <p id="message" class="alert alert-danger">{{ Session::get('supprimer') }}</p>
            @endif

            @if(Session::has('modifier'))
               <p id="message" class="alert alert-primary">{{ Session::get('modifier') }}</p>
            @endif

            @yield("content")
       </div>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
     <script>
         // ce script est pour cacher le message du controleur aprés 3 seconds
         var messsage = document.getElementById("message");
         setTimeout(()=>{
            message.style.display = "none";
         },3000)
     </script>
</body>
</html>
