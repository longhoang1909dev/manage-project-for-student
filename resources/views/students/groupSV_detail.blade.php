@extends('layouts.default')
@section('title', 'Xem thông tin nhóm')

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
    <div class="groups_detail col-lg-10" style="position: relative;">
        {{-- <img class="img-background" src="../img/background-primary.png" alt="" style="position: absolute;"> --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Nhóm của bạn > Xem thông tin nhóm</li>
            </ol>
        </nav>
        <div class="d-flex" style="clear: both;">
            <div class="p-3"
                style="margin:0 auto; width: 60% ;box-shadow: 0px 7px 4px 0px rgba(0, 0, 0, 0.25);
                 border: 1px solid rgba(0, 0, 0, 0.20); background: white;">
                <ul class="row">
                    <p class="col-4">Ảnh Đại diện</p>
                    <img class="col-8 img" style="width: 60px; height: 60px;"
                        src="{{ asset('storage/image/' . $dataGroup->group_avt) }}" alt="">
                </ul>
                <ul class="row">
                    <p class="col-4">Tên nhóm: </p>
                    <p class="col-8">{{ $dataGroup->group_name }}</p>
                </ul>
                <ul class="row">
                    <p class="col-4">Tên đề tài: </p>
                    <p class="col-8">{{ $dataGroup->p_name }}</p>
                </ul>
                <ul class="row">
                    <p class="col-4">Giảng Viên: </p>
                    <p class="col-8">{{ $dataGroup->t_name }}</p>
                </ul>
                <ul class="row">
                    <p class="col-4">Thành viên nhóm: </p>
                    <div class="col-8">
                        @foreach ($memberGroup as $item)
                            @if ($item->stu_status == 4)
                                <ul class="row d-flex align-items-center">
                                    <img class="col-3 img" src="{{ asset('storage/image/' . $item->stu_avt) }}"
                                        alt="">
                                    <li class="col-5">{{ $item->stu_name }}</li>
                                    @if ($item->stu_leader != 1)
                                        @if ($item->stu_id != $studentData->stu_id)
                                            <button class="invite col-4" type="button" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Xóa khỏi nhóm</button>
                                            {{-- <a href="{{route('student.leaveGroup1',['stu_id' => $item->stu_id])}}"><button class="cancel mb-4 ">xóa khỏi nhóm</button></a> --}}
                                        @endif
                                    @endif
                                </ul>
                            @endif
                        @endforeach

                    </div>
                </ul>
                <ul class="row">
                    <p class="col-4">Nhóm số: </p>
                    <p class="col-8">{{ $dataGroup->group_number }}</p>
                </ul>
                <ul class="row">
                    <p class="col-4">Điểm số trung bình: </p>
                    <p class="col-8">10</p>
                </ul>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <a class="cancel px-5" href="{{ route('student.groupSV') }}">Quay lại</a>
        </div>
        <!-- Modal -->
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="top: 20vh">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cảnh báo!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <Label style="padding: 0.375rem 0px;">
                                bạn có chắc muốn xóa ra khỏi nhóm ?
                            </Label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn comeback" data-bs-dismiss="modal">Hủy bỏ</button>
                            <button class="btn cancel" type="button" data-bs-toggle="modal" style="background: #dd4848;"
                                data-bs-target="#exampleModal"><a
                                    href="{{ route('student.leaveGroup1', ['stu_id' => $item->stu_id]) }}">xóa
                                    khỏi nhóm</a></button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@stop
