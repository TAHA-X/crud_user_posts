@extends("template")

@section("title")
     home page
@endsection

@section("content")
        <p class="text-secondary">hello {{ Auth::user()->name }} , ici vous pouvez voir tous les postes mais vous pouvez modifier et supprimer jstement vos posts</p>
        <div style="display:flex; flex-direction:column; align-items:center;" id="posts">
        @if(count($posts)>0) // check s'il y'a des posts dans la base de donnés , si non on affiche un message
                @foreach ($posts as $post)
                        <div style="width:70%;  height:600px;" class="card p-3 m-2">
                            <div class="text-secondary text-left">
                                posted by
                                @if(auth()->user()->id==$post->user_id)
                                     you // pour informer l'utilisateur que c'est son post
                                @else
                                    {{ $post->user->name }} // pour informer l'utilisateur qui a publié ce post
                                @endif
                            </div>
                            <div class="d-flex justify-content-between p-3">
                            <h3 class="card-title">{{ $post->title }}</h3>
                            @if($post->user_id==Auth::user()->id) // pour donner la main au utilisateur de supprimer et modifier le post
                                <div class="d-flex gap-2">
                                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">modifier</a>
                                    <form method="post" action="{{ route('posts.destroy',$post->id) }}">
                                        @csrf
                                        @method("delete")
                                        <button onclick="return confirm('vous étes sur que vous voulez supprimer ce post')" type="submit" class="btn btn-danger">supprimer</button>
                                    </form>
                                </div>
                            @endif
                            </div>
                            <img style="height:400px; width:100%;" class="card-body" src="{{ $post->img }}" alt="">
                        </div>
                @endforeach
            @else
               <div class="alert alert-info">aucun post a ce moment</div>
           @endif
        </div>

@endsection
