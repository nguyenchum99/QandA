@extends('admin.layouts.index')

@section('content')

        <div style ="width: 70%">

            {{-- thông báo lỗi --}}
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                
                    @foreach ($errors -> all() as $err)
                        {{$err}}<br>
                    @endforeach
                
                </div>
            @endif

            {{-- hiện thị sửa thành công --}}
            @if(session('thongbao'))

                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif


            <h2>Sửa nội  dung câu trả lời</h2>
            <form method="post" action="{{$answer->id}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>    
                    <input type="text" name="answer" 
                    class="form-control" placeholder="Sửa câu trả lời" value="{{$answer->answer}}"  />
                </div>

                <input type="submit" name="submit" value="Sửa" class="btn btn-primary" style="background-color: #737373"/>
            </form>
        </div>
    <div>

@endsection