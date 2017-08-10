@extends('website.index')
@section('title','Meteo Template')
@section('slide')
<div class="header">
    <div class="container">
        <div class="row">
            <div id="carousel-id" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-id" data-slide-to="0" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
                </ol>
                <div class="carousel-inner">
                @foreach($slide as $item)
                    @if($item['status'] == 0)
                        @if($item['id'] == 1)
                        <div class="item active">
                            <img src="{{ url('assets/image/upload/'.$item['image']) }}" alt="slider">
                        </div>
                        @else
                        <div class="item">
                            <img src="{{ url('assets/image/upload/'.$item['image']) }}" alt="slider">
                        </div>
                        @endif
                    @endif
                @endforeach
                </div>
                <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div> <!-- end carousel -->
        </div> <!-- end row -->
    </div> <!-- end container -->
</div>
    @endsection
    @section('content')

        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
            <div class="hang">
                <h1><i class="fa fa-plus-square-o"></i> Trần Xuyên Sáng</h1>
                <hr>
                @foreach($txs as $item)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="sp">
                        <div class="img">
                            <img src="{{ url('assets/image/upload/'.$item['image']) }}" class="img-responsive" alt="{{ $item['name'] }}">
                        </div>
                        <p>{{ $item['name'] }}</p>
                        <a href="{{ url('chi-tiet/'.$item['id'].'-'.$item['slug'].'') }}.html" title="Xem Chi Tiết"><i class="fa fa-eye"></i></a>
                    </div> <!-- end sp -->
                </div>
                @endforeach
                <div class="text-right">
                    <a href="{{ url('danh-muc/6-tran-xuyen-sang') }}.html"><i class="fa fa-info"></i> Read More</a>
                </div>
            </div> <!-- end hang -->
            <div class="hang">
                <h1><i class="fa fa-plus-square-o"></i> Sàn Epoxy</h1>
                <hr>
                @foreach($epoxy as $item)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="sp">
                        <div class="img">
                            <img src="{{ url('assets/image/upload/'.$item['image']) }}" class="img-responsive" alt="{{ $item['name'] }}">
                        </div>
                        <p>{{ $item['name'] }}</p>
                        <a href="{{ url('chi-tiet/'.$item['id'].'-'.$item['slug'].'') }}.html" title="Xem Chi Tiết"><i class="fa fa-eye"></i></a>
                    </div> <!-- end sp -->
                </div>
                @endforeach
                <div class="text-right">
                    <a href="{{ url('danh-muc/7-san-epoxy') }}.html"><i class="fa fa-info"></i> Read More</a>
                </div>
            </div> <!-- end hang -->
            <div class="hang">
                <h1><i class="fa fa-plus-square-o"></i> Tranh 3D</h1>
                <hr>
                @foreach($tranh as $item)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="sp">
                        <div class="img">
                            <img src="{{ url('assets/image/upload/'.$item['image']) }}" class="img-responsive" alt="Image">
                        </div>
                        <p>{{ $item['name'] }}</p>
                        <a href="{{ url('chi-tiet/'.$item['id'].'-'.$item['slug'].'') }}.html" title="Xem Chi Tiết"><i class="fa fa-eye"></i></a>
                    </div> <!-- end sp -->
                </div>
                @endforeach
                <div class="text-right">
                    <a href="{{ url('danh-muc/8-tranh-3d') }}.html"><i class="fa fa-info"></i> Read More</a>
                </div>
            </div> <!-- end hang -->
            <div class="hang">
                <h1><i class="fa fa-plus-square-o"></i> Sàn Công Nghiệp</h1>
                <hr>
                @foreach($san as $item)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="sp">
                        <div class="img">
                            <img src="{{ url('assets/image/upload/'.$item['image']) }}" class="img-responsive" alt="Image">
                        </div>
                        <p>{{ $item['name'] }}</p>
                        <a href="{{ url('chi-tiet/'.$item['id'].'-'.$item['slug'].'') }}.html" title="Xem Chi Tiết"><i class="fa fa-eye"></i></a>
                    </div> <!-- end sp -->
                </div>
                @endforeach
                <div class="text-right">
                    <a href="{{ url('danh-muc/9-san-cong-nghiep') }}.html"><i class="fa fa-info"></i> Read More</a>
                </div>
            </div> <!-- end hang -->

        </div>
    </div> <!-- end row -->
</div> <!-- end container -->
@endsection