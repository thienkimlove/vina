@extends('admin')

@section('content')
    @include('admin.post.heading')
    <div class="row">
        <div class="col-lg-6">
            <h2>Add New Post</h2>
            {!! Form::model($post = new App\Post, ['route' => ['admin.posts.store'], 'files' => true]) !!}
            @include('admin.post.form', ['submitText' => 'Add Post', 'categories' => $categories])
            {!! Form::close() !!}
            @include('errors.list')

        </div>
    </div>
@stop