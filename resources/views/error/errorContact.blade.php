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
        <h5>Bạn cần đăng kí đồ án và tham gia nhóm để có thể thảo luận<a href="{{ route('student.register') }}" style="color: blueviolet">Đăng ký đồ án</a></h5>
        <div class="spinner">
            <span>L</span>
            <span>E</span>
            <span>T</span>
            <span> </span>
            <span>G</span>
            <span>O</span>
            {{-- <span>G</span> --}}
        </div>
    </div>
@endsection
