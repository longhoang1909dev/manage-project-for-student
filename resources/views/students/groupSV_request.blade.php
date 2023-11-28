@extends('layouts.default')
@section('title', 'Yêu cầu vào nhóm')

@section('header')
    @include('includes.header',[
        'name' => $studentData->stu_name,
        'img' => $studentData->stu_avt
    ])
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
@endsection

@section('sidebar')
    @include('includes.sidebar')
@endsection

@section('content')
    <div class="groups_request col-lg-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Nhóm của bạn > Yêu cầu vào nhóm</li>
            </ol>
        </nav>
        @if (count($dataStudentRequest) == 0 )
        <div id="loading-notJoin" style="margin-top: 8%;  margin-bottom: 360px">
            <h5>Không có sinh viên nào yêu cầu vào nhóm</h5>
            <div class="spinner">
                <span>L</span>
                <span>O</span>
                <span>A</span>
                <span>D</span>
                <span>I</span>
                <span>N</span>
                <span>G</span>
            </div>
        </div>
        @else
            
        <div class="d-flex list_request_title">
            <h5 style="width: 141px">Thông tin</h5>
            <h5>Lựa chọn</h5>
        </div>
        <div style="min-height: 360px;">
            @foreach ($dataStudentRequest as $item)
                
            <div class="d-flex list_request">
                    <p>{{$item->stu_name}}</p>
                    <a href="{{route('student.infoRequest',['stu_id' =>$item->stu_id])}}"><i class="bi bi-box-arrow-up-right"></i></a>
                    {{-- <i class="bi bi-box-arrow-up-right"></i> --}}
                    <button class="accept"><a href="{{route('student.handleRequestJoinGroup_accept',['id'=>$item->stu_id,'status'=> 1])}}">Duyệt</a></button>
                    <button class="reject"><a href="{{route('student.handleRequestJoinGroup_accept',['id'=>$item->stu_id,'status'=> 2])}}">Từ chối</a></button>
            </div>
            @endforeach
            
            
        </div>
        @endif
        <div class="d-flex justify-content-center mt-5">
            <a class="cancel px-5" href="{{ route('student.groupSV') }}">Quay lại</a>
        </div>

    </div>
@stop
