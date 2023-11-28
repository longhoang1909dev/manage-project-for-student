@extends('layouts.default')
@section('title', 'Theo dõi tiến trình')

@section('header')
    @include('includes.header', [
        'name' => $dataTeacher->t_name,
        'img' => $dataTeacher->t_avt,
    ])
@endsection


@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
@endsection

@section('sidebar')
    @include('includes.sidebarTeacher')
@endsection

@section('content')
    <div class="groups col-lg-10 monitor_groups">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Theo dõi tiến trình > Nhóm số
                    {{ $dataGroup->group_number }}</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between" style="margin-bottom: -30px;">
            <div class="alert">
                <p class="fw-bold">Chào mừng giảng viên {{ $dataTeacher->t_name }} đến với {{ $dataGroup->group_name }}</p>
            </div>
        </div>
        <div class="mx-3 row">
            <div class="col-md-9 col-sm-12 history-update" style="padding: unset;">
                <h6 class=" fw-bold">
                    <img class="avatar me-4 img" src="{{ asset('storage/image/' . $dataGroup->group_avt) }}"
                        alt="Avatar groups">Nhóm {{ $dataGroup->group_number }}
                </h6>
                <div style="height: 480px;">
                    <table>
                        <tr>
                            <th><i class="bi bi-clock-history"></i>Lịch sử cập nhật</th>
                            <th><i class="bi bi-upload"></i>Người tải lên</th>
                            <th><i class="bi bi-chat-dots"></i>Bình luận</th>
                            <th><i class="bi bi-calendar-range"></i>Thời gian</th>
                        </tr>
                    </table>
                    <div style="max-height: 330px; overflow: auto;">
                        <table>
                            @foreach ($dataFile as $item)
                                <tr style="">
                                    <td>
                                        <i class="bi bi-file-earmark-arrow-up"></i>{{ $item->file }}<i
                                            class="fa-regular fa-circle-down"></i>
                                    </td>
                                    <td>
                                        {{ $item->stu_name }}
                                    </td>
                                    <td>
                                        {{ $item->file_title }}
                                    </td>
                                    <td>
                                        {{ $item->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="d-flex flex-wrap justify-content-around monitor_group">
                    <a class="request" href="{{ route('teacher.monitor_process') }}">Quay lại</a>
                    <button class="request" id="modal_monitor">Đưa ra thông báo</button>
                    <button class="request" data-bs-toggle="modal" data-bs-target="#staticBackdrop3">Đánh giá tiến
                        độ</button>
                </div>

                {{-- Active --}}
                <div id="modal_up" class="text-center" style="display: none;margin-top: 15px; margin-right:28px;">
                    <button class="request" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">Đặt lịch họp </button>
                    <button class="request" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Đưa ra thông
                        báo</button>
                </div>

                {{-- Modal Alert --}}
                <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="{{ route('teacher.set_meeting', ['group_id' => $dataGroup->group_id]) }}"
                            method="post">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Chọn ngày họp</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="mb-4">
                                        <label for="meeting-date" class="col-form-label">Địa điểm họp</label>
                                        <input type="text" class="form-control d-inline-block" style="width: 75%;"
                                            name="link" id="meeting-date" style="outline: none;">
                                    </div>
                                    <div class="mb-4">
                                        <label for="meeting-date" class="col-form-label">Chọn ngày họp</label>
                                        <input type="date" class="form-control d-inline-block" style="width: unset;"
                                            name="date" id="meeting-date" style="outline: none;">
                                    </div>
                                    <div class="mb-4">
                                        <label for="start-time" class="col-form-label">Chọn giờ họp</label>
                                        <input type="time" class="form-control d-inline-block" style="width: unset;"
                                            name="stime" id="start-time" style="outline: none;">
                                        <i class="bi bi-chevron-double-right"></i>
                                        <input type="time" class="form-control d-inline-block" style="width: unset;"
                                            name="etime" id="end-time" style="outline: none;">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="request">Đưa ra lịch họp</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Modal Meeting --}}
                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('teacher.set_noti', ['group_id' => $dataGroup->group_id]) }}"
                                method="POST">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Đặt Thông báo</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="text-align: center;">
                                    <textarea id="" cols="50" rows="5" class="form-control d-inline-block" style="width: unset;"
                                        placeholder="Hãy đưa ra một vài thông báo cho nhóm ...." style="outline: none;" name="long"></textarea>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="request">Đưa ra thông báo</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                {{-- Modal Evaluate --}}
                <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('teacher.set_score', ['group_id' => $dataGroup->group_id]) }}"
                                method="POST" style="margin: unset;">
                                @csrf
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Đánh giá điểm cho nhóm
                                        {{ $dataGroup->group_number }}</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div>
                                        <label for="">Điểm số</label>
                                        <input type="text" class="form-control d-inline-block" placeholder="VD: 9đ"
                                            name="score">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="request">Đánh giá</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 about_monitor">
                <div class="mt-4">
                    <h6 class="fw-bold">Giới thiệu</h6>
                    <p>Nhóm em làm về đề tài {{ $dataGroup->p_name }}</p>
                    <p><i class="bi bi-activity"></i>Tiến trình</p>
                    <p><i class="bi bi-journal-album"></i>Ghi chú</p>
                    <p id="show_people"><i class="bi bi-people-fill"></i>Thành viên</p>
                    <p class="d-none">
                        @foreach ($memberGroup as $item)
                            <img class="img mb-2" src="{{ asset('storage/image/' . $item->stu_avt) }}" alt="">
                            {{ $item->stu_name }} <br>
                        @endforeach
                    </p>
                </div>
                <div class="mt-4">
                    <h6 class="fw-bold">Đóng góp</h6>
                    <p><img src="./img/avatar.png" alt="">Hoàng Hải Long</p>
                    <p><img src="./img/avatar.png" alt="">Nguyễn Viết Tuấn</p>
                </div>
                <div class="mt-4">
                    <h6 class="fw-bold">Kiểu File</h6>
                    <p><i class="bi bi-filetype-pdf"></i>PDF</p>
                    <p><i class="bi bi-filetype-png"></i>PNG</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        const modal_monitor = document.getElementById('modal_monitor')
        const modal_up = document.getElementById("modal_up");
        modal_monitor.addEventListener("click", function() {
            modal_up.style.display = modal_up.style.display === "none" ? "block" : "none";
        });

        const peopleFill = document.querySelector('#show_people');
        const people = document.querySelector('.d-none');
        peopleFill.addEventListener('click', function() {
            people.classList.toggle('d-none');
        })
    </script>
@stop
