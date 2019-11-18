@extends('home.layouts.index_page')
@section('content')


        <div class="main-right">
            <div class="form-group" style="margin-left: 30x;color: #000000">
                <h3><b>Danh sách câu trả lời </b></h3>
                <p style="color: #e63900;font-size: 16px;"><b>
                Câu hỏi: {{$question->question}}?</b></p>
                <p>Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($question->created_at))
                                ->diffForHumans()
                            }}</p>
            </div>

            <form method="post" action="{{url("user/session/create_answer/{$question->id}")}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <h4>Tạo câu trả lời </h4>    
                    <textarea type="text" name="answer" rows="3"
                    class="form-control" placeholder="Nội dung câu trả lời..." ></textarea>
                </div>
   
                <input type="submit" name="submit" value="Trả lời" class="btn btn-primary" 
                style="background-color:#a6a6a6; color:#000000"/>
            </form>
      

   
    @foreach($list as $l)
                <div class="content"  style="margin-top: 15px;background: #ffffff;border-radius: 10px">
                    {{-- hiện thị nội dung câu hỏi --}}
                        <div class="row">
                            <div class="col-sm-2">
                            <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                            style="height:70px;width:70px;margin-top:10px;border-radius: 50%" ></div>
                            <div class="col-sm-7" style="background-color: #ffffff">
                            <p class="title" style="color:red;">Trả lời: {{$l->answer}}</p>
                            <p>Đăng bởi: {{$l->name}}</p>
                            <p>Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                    ->diffForHumans()}}</p>

                            </div>
                     </div>
            </div>

    @endforeach
</div>
@endsection