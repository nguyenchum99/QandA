@extends('admin.layouts.index')
@section('content')


        <div  style="margin-top: 25px;margin-left: 20px">
               {!!$pie->html() !!}
            
        </div>


{!! Charts::scripts() !!}

{!! $pie->script() !!}

@endsection