<div class="sanpham">
	<h1><i class="fa fa-list"></i> Danh Sách Sản Phẩm {{ $name }}</h1>
	<hr>
	<div class="clearfix"></div>
	@foreach($msp as $item)
    @if($item['status']==0)
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
        <div class="sp">
            <div class="img">
                <img src="{{ url('assets/image/upload/'.$item['image']) }}" class="img-responsive" alt="{{ $item['name'] }}">
            </div>
            <p>{{ $item['name'] }}</p>
            <a href="{{ url('chi-tiet/'.$item['id'].'-'.$item['slug'].'') }}.html" title="Xem Chi Tiết"><i class="fa fa-hand-o-right"></i></a>
        </div> <!-- end sp -->
    </div>
    @endif
    @endforeach

	{{ $sp->render() }}
</div>