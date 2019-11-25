
@extends('home.layouts.index_page')
@section('content')

<div class="main-right" style="margin-top: 25px;width: 100%">
    @foreach($question as $l)
      @if($l->user_id != Auth::user()->id)
            <div class="card" style="margin-top: 15px">
                <a href="{{url("user/session/list_question_active/{$l->id}")}}" >
                    <div class="row">  
                        <div class="col-sm-2"><center>
                            <img src="{{URL::asset('/img/avatars/'.$l->avatar)}}" alt="image"
                            style="height: 50px;width:50px;border-radius: 50%;margin-top: 5px" >
                        </div></center>
                        <div class="col-sm-9" style="margin-top: 5px">
                            <p style="color: red">{{$l->name}} đã tạo câu hỏi trong phiên hỏi đáp của bạn</p>
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
                          style="height: 50px;width:50px;border-radius: 50%;margin-top: 5px" >
                      </div></center>
                      <div class="col-sm-9" style="margin-top: 5px">
                          <p style="color: blue">{{$l->name}} đã trả lời câu hỏi của bạn</p>
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