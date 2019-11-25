@extends('home.layouts.index_page')
@section('content')


        <div class="main-right">
            <div class="form-group" style="margin-left: 30x">
                <h3 style="color:#0059b3">Danh sách câu trả lời </h3>
                <h4 style="color: red;">
                Câu hỏi: {{$question->question}}?</h4>
                <p>Thời gian tạo: {{ \Carbon\Carbon::createFromTimeStamp(strtotime($question->created_at))
                                ->diffForHumans()
                            }}</p>
            </div>

            <form method="post" action="{{url("user/session/create_answer/{$question->id}")}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/> 
                    <textarea type="text" name="answer" rows="3"
                    class="form-control" placeholder="Nội dung câu trả lời..." ></textarea>
                </div>
   
                <input type="submit" name="submit" value="Trả lời" class="btn btn-primary" 
                />
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