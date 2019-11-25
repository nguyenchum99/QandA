
@extends('home.layouts.index_page')
@section('content')

<div class="main-right" style="margin-top: 25px;width: 100%">
    @foreach($noti as $l)
            <div class="card" style="margin-top: 15px">
                <div class="form-group" style="padding: 10px">
                    <p style="color: green;">Quản trị viên gửi thông báo: {{$l->notification}}</p>
                    <p >{{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                ->diffForHumans()
                    }}
                    </p>
                </div>
            </div>
    @endforeach 


    @foreach($question as $l)
      @if($l->user_id != Auth::user()->id)
            <div class="card" style="margin-top: 15px">
                <a href="{{url("user/session/list_question_active/{$l->id}")}}" >
                    <div class="row">  
                        <div class="col-sm-2"><center>
                            <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                            style="height: 40px;width:40px;border-radius: 50%; margin-top: 15px" >
                        </div></center>
                        <div class="col-sm-9" >
                            <p style="color: red;margin-top: 10px">{{$l->name}} đã tạo câu hỏi trong phiên hỏi đáp của bạn</p>
                            <p >{{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                                ->diffForHumans()
                            }}
                            </p>
                        </div>
                    </div></a>
            </div>
        @endif
    @endforeach 

    @foreach($answer as $l)
    @if($l->user_id != Auth::user()->id)
          <div class="card" style="margin-top: 15px">
              <a href="{{url("user/session/create_answer/{$l->id}")}}" >
                  <div class="row">  
                      <div class="col-sm-2"><center>
                          <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                          style="height: 40px;width:40px;border-radius: 50%; margin-top: 15px" >
                      </div></center>
                      <div class="col-sm-9" >
                          <p style="color: blue;margin-top: 10px">{{$l->name}} đã trả lời câu hỏi của bạn</p>
                          <p >{{ \Carbon\Carbon::createFromTimeStamp(strtotime($l->created_at))
                              ->diffForHumans()
                          }}
                          </p>
                      </div>
                  </div></a>
          </div>
      @endif
  @endforeach 
    

@endsection