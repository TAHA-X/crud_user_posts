@extends("template")

@section("title")
     modifier page
@endsection

@section("content")
        <h1>Modifier un post</h1>
        <form action="{{ route('posts.update',$post->id) }}" enctype="multipart/form-data" method="post">
            @csrf
            @method("put")
            <div class="mt-2">
                <label class="form-label" for="title">title :</label>
                <input value="{{ $post->title }}" class="form-control @error('title') is-invalid @enderror" name="title" type="text">
                @error('title')
                     <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label class="form-label" for="title">img :</label> <br>
                <img style="width:160px; height:160px; border-radius:13px;" src="{{ $post->img }}"> <br>
                <input class="mt-2" name="img" type="file">
            </div>
            <button type="submit" class="mt-2 btn btn-primary">modifier</button>
        </form>
@endsection
