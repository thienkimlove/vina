<!DOCTYPE html>
<html lang="en" data-ng-app="Application">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <meta name="description" content="{{!empty($meta_desc)? $meta_desc : 'Website về sản phẩm'}}"/>
    <meta name="keyword" content="{{!empty($meta_keywords)? $meta_keywords : 'thiet bi, san pham, dat mua'}}"/>

    <title>{{!empty($meta_title)? $meta_title : 'Vinaquips.com'}}</title>
    <link type="text/css" href="{{url('css/frontend.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

<!-- Navigation -->
@include('frontend.nav')

<!-- Intro Section -->

@include('frontend.intro')


@yield('content')

@include('frontend.logo-box')
<!-- FOOTER -->
@include('frontend.footer')


<script>
    var Config = {};
    Config.url = '{{ url('/') }}';
</script>

<!-- script -->
<script type="text/javascript" src="{{url('js/frontend.js')}}"></script>
<script type="text/javascript" src="{{url('/js/frontend-custom.js')}}"></script>
<script type="text/javascript" src="{{url('js/plain.js')}}"></script>


<a style="display: inline;" href="#" id="toTop" class="fa fa-arrow-circle-o-up"></a>
@yield('footer')
</body>

</html>
