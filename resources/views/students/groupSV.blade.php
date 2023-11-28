@extends('layouts.default')
@section('title', 'Nhóm của bạn')

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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Nhóm của bạn</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between">
            <div class="alert" style="padding: unset">
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
                <button class="cancel" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Rời
                    nhóm</button>
                {{-- <button class="cancel mb-4 ">Rời nhóm</button> --}}
            </div>
        </div>
        <div class="mx-3 row">
            <div class="col-lg-8 col-sm-12 history-update">
                <p>
                    <img class="avatar me-4 img" src="{{ asset('storage/image/' . $dataGroup->group_avt) }}"
                        alt="">{{ $dataGroup->group_name }}
                </p>
                <p class="fw-bold"><i class="bi bi-clock-history"></i>Lịch sử cập nhật</p>
                <ul
                    style="height: 300px; overflow-x: auto; box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); background: #ededed;
                border: 1px solid #f68d8d;">
                    @if (count($dataUpdateFile) == 0)
                        <li>Chưa có lịch sử cập nhật</li>
                    @else
                        @foreach ($dataUpdateFile as $item)
                            <li><i class="bi bi-file-earmark-arrow-up"></i>{{ $item->stu_name }} đã tải lên
                                {{ $item->file }}
                            </li>
                        @endforeach

                    @endif
                </ul>

            </div>
            <div class="col-lg-4 col-sm-12 d-flex flex-column align-items-center" style="width: 280px; margin-top: 64px;">
                <p class="fw-bold" style="text-align: center;">Đánh giá của giảng viên</p>
                @if (count($dataScoreGroup) == 0)
                    <tr>Chưa có điểm đánh giá từ giảng viên</tr>
                @else
                    <table id="groupSV" style="width: 365px;">
                        <tr>
                            <td>Ngày</td>
                            <td>Điểm đánh giá</td>
                        </tr>
                        @foreach ($dataScoreGroup as $item)
                            <tr>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->rate_score }}</td>
                            </tr>
                        @endforeach
                @endif

                </table>
            </div>
            <div class="d-flex flex-wrap justify-content-center"
                style="    gap: 20px 40px;
                margin-left: 60px;
                margin-top: 50px;">
                <a class="request" href="{{ route('student.groupSV_update') }}">Cập nhật tiến độ nhóm</a>
                <a class="request" href="{{ route('student.groupSV_detail') }}">Xem thông tin nhóm</a>
                <a class="request" href="{{ route('student.groupSV_request') }}">Các yêu cầu vào nhóm</a>
            </div>
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
                                bạn có chắc muốn xóa sinh viên ra khỏi đồ án ?
                            </Label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="background: #6c757d;" class="btn comeback"
                                data-bs-dismiss="modal">Hủy bỏ</button>
                            <button class="btn cancel" type="button" data-bs-toggle="modal" style="background: #dd4848;"
                                data-bs-target="#exampleModal"><a href="{{ route('student.leaveGroup') }}">Rời
                                    nhóm</a></button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@stop
