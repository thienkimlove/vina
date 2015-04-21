<div class="client_box">
    <div class="container">
        <div class="row">
            <div class="grid_12">
                <div class="items">
                    @for( $i = 1; $i < 11; $i ++)
                    <span class="not-items"><a href="#"><img src="{{url('images/client'. $i . '.jpg')}}" alt=""></a></span>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>