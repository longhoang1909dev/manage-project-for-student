@extends('layouts.default')
@section('title', 'Cập nhật tiến độ nhóm')

@section('header')
    @include('includes.header', [
        'name' => $studentData->stu_name,
        'img' => $studentData->stu_avt,
    ])
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
@endsection

@section('sidebar')
    @include('includes.sidebar')
@endsection

@section('content')
    <div class="groups col-lg-10">
        {{-- <img src="../img/background-primary.png" alt=""> --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Nhóm của bạn > Cập nhật tiến độ nhóm</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between">
            <div class="alert">
                <p class="fw-bold">Chào mừng, {{ $studentData->stu_name }}</p>
                <p class="fw-bold">Thông báo của giảng viên: </p>
                @if ($dataNotiGroup == null)
                    <p>Chưa có thông báo từ giảng viên</p>
                @else
                    <p class="fw-bold">{{ $dataNotiGroup->created_at }} <span style="font-weight: initial;">:
                            {{ $dataNotiGroup->rate_noti }}</span> </p>
                @endif
            </div>
            <div class="d-flex flex-column me-5 align-items-end">
                <button class="cancel mb-4 ">Rời nhóm</button>
            </div>
        </div>
        <div class="mx-3" style="padding: 10px; height: 320px; background: #ededed; border-radius: 8px;">
            <div class="d-flex justify-content-between">
                <p class="fw-bold">File của bạn</p>
                <div>
                    <button class="btn-invisible">Truy Cập</button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn-invisible btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Thêm File mới
                    </button>

                    <!-- Modal -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="top: 20vh">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm file</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <Label
                                            style="border-radius: var(--bs-border-radius); 
                                            border: 1px solid #dee2e6; background-color: whitesmoke;
                                            width: 19%; text-align:center; padding: 0.375rem 0px;">
                                            Tiêu đề
                                        </Label>
                                        <input type="text" class="form-control" style="width: 80%; display:inline-block;"
                                            name="file_title">
                                        <input type="file" class="form-control" id="dokumen" required=""
                                            name="file_upload" style="margin-top: 10px; outline:none;">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn comeback" data-bs-dismiss="modal">Quay
                                            lại</button>
                                        <button type="submit" class="btn request">Cập nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div style="margin-top: 10px;">
                <ul
                    style=" border: 1px solid #a19494; padding: unset; 
                margin: 0px 25px; border-radius: 3px; overflow: auto; height: 250px;">
                    @foreach ($dataFile as $item)
                        <li style="margin: unset; margin-top: calc(var(--borderWidth-thin, max(1px, 0.0625rem))*-1);">
                            <div
                                style="display: grid; grid-template-columns: 30% 25% 20% 15%;
                             border-top: 1px solid #a19494; border-radius: 3px; 
                             padding: 5px 10px; margin: unset">
                                <a href="{{ asset('storage/file/' . $item->file) }}" target=”_blank”> <i
                                        class="bi bi-file-earmark-arrow-up-fill"></i>{{ $item->file }}</a>

                                <p style="margin: unset; padding-top: 2px;">{{ $item->file_title }}</p>
                                <p style="margin: unset; padding-top: 2px;">{{ $item->created_at }}</p>
                                <a href="{{ route('student.dowload', ['file_name' => $item->file]) }}"
                                    style="color: black !important;"><i class="fa-solid fa-download"
                                        style="color: black !important;"></i>Tải xuống</a>
                            </div>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-5">
            <a class="cancel px-5" href="{{ route('student.groupSV') }}">Quay lại</a>
        </div>

    </div>
@stop
