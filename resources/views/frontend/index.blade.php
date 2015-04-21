@extends('frontend')

@section('content')
<!-- Hot Section -->

@if ($features->count() > 0)
<div class="container margin-top20">
    <div class="row">

        @foreach ($features as $feature)

        <div class="grid_4 wow fadeInRight animated">
            <div class="box">
                <img src="{{url('files/images/' .$feature->avatar)}}" alt="{{$feature->title}}">
                <div class="box_cnt">
                    <h5><div class="box_inner">{{str_limit($feature->title, 25)}}</div></h5>
                    <div class="box_inner">
                        <p style="">{{str_limit($feature->desc), 50}}</p>
                    </div>
                    <a class="btn_arrow" href="{{url($feature->slug. '.html')}}"><img src="{{url('images/more_arrow1.png')}}" alt="">
                    </a>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</div>
@endif


<!-- End hot Section-->

<!-- Services Section -->
@if($categories->count() > 0)
<div class="container margin-top20">
    @foreach ($categories as $category)
    <div class="row">
        <div class="header-bar"><a href="#"><img src="{{url('files/images/' . $category->icon)}}">{{$category->name}}</a></div>
        @foreach ($category->homepagePosts as $post)
        <div class="grid_3">
            <div class="box1 wow fadeInUp animated" data-wow-duration="1s" data-wow-delay="0.1s">
                <img src="{{url('files/images/' . $post->avatar)}}" alt="">
                <div  class="content maxheight"><div class="box_inner">
                        <h4>{{str_limit($post->title, 25)}}</h4>
                        <p>{{str_limit($post->desc, 50)}}</p>
                        <a class="btn-big" href="{{url($post->slug. '.html')}}"></a>
                    </div></div>
            </div>
        </div>
        @endforeach
    </div>
   @endforeach
</div>
@endif
@endsection