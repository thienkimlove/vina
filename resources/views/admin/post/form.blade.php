<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('avatar', 'Image') !!}
    @if ($post->avatar)
        <img src="{{url('files/images/' .$post->avatar)}}" height="100" width="100" />
        <hr>
    @endif
    {!! Form::file('avatar', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::label('homepage', 'Make product display in homepage') !!}
    {!! Form::checkbox('homepage', null, null) !!}
</div>

<div class="form-group">
    {!! Form::label('feature', 'Make product display in top') !!}
    {!! Form::checkbox('feature', null, null) !!}
</div>


<div class="form-group">
     {!! Form::label('desc', 'Description') !!}
     {!! Form::textarea('desc', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
     {!! Form::label('content', 'Content') !!}
     {!! Form::textarea('content', null, ['class' => 'form-control ckeditor']) !!}
</div>

<div class="form-group">
    {!! Form::label('tag_list', 'Tags') !!}
    {!! Form::select('tag_list[]', $tags, null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
</div>

 <div class="form-group">
        {!! Form::submit($submitText, ['class' => 'btn btn-primary form-control']) !!}
  </div>
@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder : 'Choose a tag',
            tags : true //allow to add new tag which not in list.
        });
    </script>
@endsection
