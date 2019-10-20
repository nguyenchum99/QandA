
@extends('home.layouts.index_page')
@section('content')


<div class="main-right">
       
    @foreach($list as $l)
        <div class="box">
                <div class="row">  
                    <div class="col-md-2">
                        <img src="{{URL::asset('/img/q-and-a.jpg')}}" alt="image" style="height: 75px;width:75px;margin-top:10px" >
                    </div>
                    <div class="col-md-10 box-right"><a href="#" >
                        <p class="title" style="color: red">{{$l->name_session}}
                        <p>Chủ tọa: Phạm Thảo Nguyên</p>
                        <p class="time">Đã đóng: 20 ngày trước</p>
                        <p>Số câu hỏi: 10 câu</p>
                        </a>
                    </div>
                </div>
        </div>

    @endforeach

        <div aria-label="Page navigation">
                {{$list->links()}}
        </div>
       
</div>

@endsection