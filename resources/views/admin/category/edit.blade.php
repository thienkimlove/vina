@extends('admin')

@section('content')
  @include('admin.category.heading')
  <div class="row">
      <div class="col-lg-6">
          <h2>Edit "{{ $category->name }}"</h2>
          {!! Form::model($category, ['method' => 'PATCH', 'route' => ['admin.categories.update', $category->id]]) !!}
              @include('admin.category.form', ['submitText' => 'Edit Category', 'parents' => $parents])
          {!! Form::close() !!}
          @include('errors.list')

      </div>
  </div>
@stop