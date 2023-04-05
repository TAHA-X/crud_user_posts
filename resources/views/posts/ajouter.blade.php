@extends("template")

@section("title")
     ajouter page
@endsection

@section("content")
        <h1>Ajouter un post</h1>
        <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div class="mt-2">
                <label class="form-label" for="title">title :</label>
                <input value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title" type="text">
                @error('title')
                     <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-2">
                <label class="form-label" for="title">img :</label>
                <input name="img" type="file">
                @error('img')
                     <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="mt-2 btn btn-primary">ajouter</button>
        </form>
@endsection
