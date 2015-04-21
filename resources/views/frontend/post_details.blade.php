@extends('frontend')

@section('content')
    <div class="container margin-top20">
        <div class="row">

            <div class="content">

                <div class="column-left">

                    <div class="gallery">

                        <div id="slides">

                            <div class="slide"><img src="images/sample_slides/macbook.jpg" alt="side" /></div>
                            <div class="slide"><img src="images/sample_slides/iphone.jpg"alt="side" /></div>
                            <div class="slide"><img src="images/sample_slides/imac.jpg" alt="side" /></div>
                            <div class="slide"><a href="" target="_blank"><img src="images/sample_slides/info.jpg" alt="side" /></a></div>

                        </div>

                        <div id="menu">
                            <ul>

                                <li class="menuItem"><a href=""><img src="images/sample_slides/macbook.jpg" alt="thumbnail" /></a></li>
                                <li class="menuItem"><a href=""><img src="images/sample_slides/iphone.jpg" alt="thumbnail" /></a></li>
                                <li class="menuItem"><a href=""><img src="images/sample_slides/imac.jpg" alt="thumbnail" /></a></li>

                            </ul>
                        </div>

                    </div>


                    <div class="right-detail">
                        <p class="tile-detail">{{$post->title}}</p>
                        <p>{{$post->desc}}</p>

                        <div class="tile-detail"></div>

                        <p class="color-red" style="font-size:18px">Chương trình khuyến mại</p>

                        <ul>
                            <li>Giảm giá 5% khi đặt hàng online</li>
                            <li>Tặng tủ thuốc gia đình trị giá 500k</li>
                        </ul>
                        <div class="tile-detail"></div>
                        <div class="sale">
                            <p class="color-red" style="font-size:30px; margin:0 ">16.256.000</p>
                            <p style="margin:-10px 0 15px 0;">Giá gốc: 16.500.000( Tiết kiệm 250.000 Đ)</p>
                            <p>
                                <a href=""><img src="images/button-buy.png"></a>
                                <a href=""><img src="images/button-buy-mobi.png"></a>
                            </p>
                        </div>

                    </div>
                    <!----------------------------------------------------------------->
                    <div class="clear"></div>
                    <div class="tabs">


                        <div class="tabs-title ">
                            <dd class="active"><a href="#" ><i class="icon-detail"></i>Chi tiết sản phẩm</a></dd>
                            <dd><a href="#" ><i class="icon-picture"></i>Hình ảnh khác</a></dd>
                            <dd><a href="#" ><i class="icon-video"></i>Video</a></dd>
                            <dd><a href="#" ><i class="icon-comment"></i>Bình luận </a></dd>
                            <dd><a href="#" ><i class="icon-download"></i>Download</a></dd>
                        </div>
                        <div class="clear"></div>
                        <div class="tabs-content">{!!$post->content!!}</div>
                    </div>

                    <!----------------------------------------------------------------->



                </div>
                <div class="column-right">
                    @if ($relatedPosts->count()> 0)
                    <div class="main-content">
                        <div class="tab-spcl">Sản phẩm cùng loại</div>
                        <div class="content-right">
                            <ul>
                                @foreach ($relatedPosts as $relate)
                                <li>
                                    <p><a href="{{url($relate->slug. '.html')}}"><img src="{{url('files/images/'. $relate->avatar)}}">{{str_limit($relate->title, 25)}}</a></p>
                                    <p>{{str_limit($relate->desc, 25)}}</p>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="clear"></div>
                    @if ($readPosts->count()> 0)
                    <div class="main-content margin-top20">
                        <div class="tab-dx">sản phẩm đã xem</div>
                        <div class="content-right">
                            <ul>
                                @foreach ($readPosts as $relate)
                                    <li>
                                        <p><a href="{{url($relate->slug. '.html')}}"><img src="{{url('files/images/'. $relate->avatar)}}">{{str_limit($relate->title, 25)}}</a></p>
                                        <p>{{str_limit($relate->desc, 25)}}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="clear"></div>

                    <div class="main-content margin-top20">
                        <div class="tab-dx">Suport online</div>
                        <div class="content-right" style="text-align:center">
                            <div class="online1"><img alt="" src="images/hotline.png">
                                <div class="onlinea">
                                    <b>Bán hàng</b>
                                    <div class="online_ht">
                                        <div class="online_col1">
                                            <a href="ymsgr:sendim?vinaquips"><img alt="" src="http://opi.yahoo.com/online?u=vinaquips&amp;m=g&amp;t=2"> </a>
                                        </div>
                                        <br>
                                        <div class="online_ht"><img alt="Name" src="images/user.png">: Kinh doanh 1</div>
                                    </div>
                                    <div class="online_ht"><img alt="Phone" src="images/phone.png">: 04 39905337
                                        <br><a href="mailto:sales@vinaquips.com">sales@vinaquips.com</a> </div>
                                    <div class="online_ht">
                                        <div class="online_col1">
                                            <a href="ymsgr:sendim?vinaquips"><img alt="" src="http://opi.yahoo.com/online?u=vinaquips&amp;m=g&amp;t=2"> </a>
                                        </div>
                                        <br>
                                        <div class="online_ht"><img alt="Name" src="images/user.png">: Kinh doanh 2</div>
                                    </div>
                                    <div class="online_ht"><img alt="Phone" src="images/phone.png">: 0968811227
                                        <br><a href="mailto:quan@vinaquips.com">quan@vinaquips.com</a> </div>
                                </div>
                                <div class="onlinea">
                                    <b>Kỹ thuật</b>
                                    <div class="online_ht">
                                        <div class="online_col1">
                                            <a href="ymsgr:sendim?vinaquips.service"><img alt="" src="http://opi.yahoo.com/online?u=vinaquips.service&amp;m=g&amp;t=2"> </a>
                                        </div>
                                        <br>
                                        <div class="online_ht"><img alt="Name" src="images/user.png">: Kỹ thuật</div>
                                    </div>
                                    <div class="online_ht"><img alt="Phone" src="images/phone.png">: O9O 476 5952
                                        <br><a href="mailto:service@vinaquips.com">service@vinaquips.com</a> </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>



        </div>
    </div>
@endsection
@section('footer')
 <script>
     $(document).ready(function(){
         /* This code is executed after the DOM has been completely loaded */

         var totWidth=0;
         var positions = new Array();

         $('#slides .slide').each(function(i){

             /* Traverse through all the slides and store their accumulative widths in totWidth */

             positions[i]= totWidth;
             totWidth += $(this).width();

             /* The positions array contains each slide's commulutative offset from the left part of the container */

             if(!$(this).width())
             {
                 alert("Please, fill in width & height for all your images!");
                 return false;
             }

         });

         $('#slides').width(totWidth);

         /* Change the cotnainer div's width to the exact width of all the slides combined */

         $('#menu ul li a').click(function(e,keepScroll){

             /* On a thumbnail click */

             $('li.menuItem').removeClass('act').addClass('inact');
             $(this).parent().addClass('act');

             var pos = $(this).parent().prevAll('.menuItem').length;

             $('#slides').stop().animate({marginLeft:-positions[pos]+'px'},450);
             /* Start the sliding animation */

             e.preventDefault();
             /* Prevent the default action of the link */


             // Stopping the auto-advance if an icon has been clicked:
             if(!keepScroll) clearInterval(itvl);
         });

         $('#menu ul li.menuItem:first').addClass('act').siblings().addClass('inact');
         /* On page load, mark the first thumbnail as active */



         /*****
          *
          *	Enabling auto-advance.
          *
          ****/

         var current=1;
         function autoAdvance()
         {
             if(current==-1) return false;

             $('#menu ul li a').eq(current%$('#menu ul li a').length).trigger('click',[true]);	// [true] will be passed as the keepScroll parameter of the click function on line 28
             current++;
         }

         // The number of seconds that the slider will auto-advance in:

         var changeEvery = 10;

         var itvl = setInterval(function(){autoAdvance()},changeEvery*1000);

         /* End of customizations */
     });
 </script>
@endsection
    