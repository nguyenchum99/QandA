@extends('admin.layouts.index')
@section('content')


        <div  style="margin-top: 30px;margin-left: 20px">
            <h4>Câu hỏi: {{$question->question}} ?</h4>
               {!!$pie->html() !!}
        </div>


{!! Charts::scripts() !!}

{!! $pie->script() !!}

@endsection