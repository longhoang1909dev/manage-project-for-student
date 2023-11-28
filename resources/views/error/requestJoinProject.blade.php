@extends('layouts.default')
@section('title', '')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('header')
    @include('includes.header', [
        'name' => $studentData->stu_name,
        'img' => $studentData->stu_avt,
    ])
@endsection

@section('sidebar')
    @include('includes.sidebar')
@endsection

@section('content')
    <div id="loading-notJoin" style="margin-top: 10%;">
        <h5>Đã gửi yêu cầu cho giảng viên</h5>
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
    <div style="text-align: center">
        <a href="{{route('student.cancel')}}">
            <h5 style="text-align: center" class="invite d-inline-block">Hủy yêu cầu</h5>
        </a>
    </div>
@endsection