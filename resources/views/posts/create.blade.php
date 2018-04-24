@extends ('posts.layout')

@section ('content')
    <div class="col-sm-8 blog-main">
        <h1>Publish a post</h1>

        <hr>

        @include("posts.create_form")

    </div>


@endsection