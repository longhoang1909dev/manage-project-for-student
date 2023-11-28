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
        <h5>Bạn đã đăng ký đồ án <a href="{{ route('student.groupSV') }}" style="color: blueviolet">Nhóm của bạn</a></h5>
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
