@extends('layouts.default')
@section('title', 'Tất cả giảng viên')

@section('header')
    @include('includes.header', [
        'name' => $studentData->stu_name,
        'img' => $studentData->stu_avt,
    ])
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection


@section('sidebar')
    @include('includes.sidebar')
@endsection

@section('content')
    <div class="infoAllTeacher col-lg-10" style="height: 600px;">
        {{-- <img src="../img/background-primary.png" alt=""> --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Tất cả giảng viên </li>
            </ol>
        </nav>
        <div class="text-center">
            <h5 style="margin-bottom: 20px;">Khoa công Nghệ Thông tin</h5>
            @foreach ($dataAllTeacher as $item)
                @if ($item->t_major == 'CNTT')
                    <div class="row">
                        <div class="d-flex justify-content-center col-lg-6 col-sm-6">
                            <img src="{{ asset('storage/image/' . $item->t_avt) }}" alt="" style="height: 30px">
                            <a href="{{ route('student.seeInfo', ['t_id' => $item->t_id]) }}">{{ $item->t_name }}</a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
    <div style="margin-top: 75px; text-align:center;">
        <a class="cancel" href="{{ route('student.dashboard') }}">Quay lại</a>
    </div>
@stop
