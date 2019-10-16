
@extends('home.layouts.index_page')
@section('content')


    <div class="row">
                            
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <center></center> <img src="{{URL::asset('/img/image.jpg')}}" alt="user">
            <input type="submit" class="btn nut" value="Thay ảnh đại diện">
        </center></div>
        
        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
            <span class="fa fa-user name" ></span>
            <p class="name">{{$user->name}}</p>
            
            <span class="fa fa-graduation-cap" ></span>
            <p class="number">
                @if($user->level == 1)
                    {{"Chức vụ: Admin"}}
                @else 
                    {{"Chức vụ: Thành viên"}}
                @endif
            </p>
            <span class="fa fa-question-circle-o" ></span>
            <p class="number">Tổng số câu hỏi: {{$question}}</p>
            <span class="fa fa-hourglass-half" ></span>
            <p class="number">Câu hỏi chưa được trả lời: 0</p>
            <span class="fa fa-history" ></span>
            <p class="reload">Lần cuối đặt câu hỏi: N/A</p>
        </div>
        
    </div>
</form>       
@endsection