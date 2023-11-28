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
        <h5>Bạn cần đăng kí đồ án để có thể tham gia group <a href="{{ route('student.register') }}" style="color: blueviolet">Đăng ký đồ án</a></h5>
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
@endsection
