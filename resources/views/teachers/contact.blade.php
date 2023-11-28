@extends('layouts.default')
@section('title', 'Liên hệ với sinh viên')

@section('header')
    @include('includes.header', [
        'name' => $dataTeacher->t_name,
        'img' => $dataTeacher->t_avt,
    ])
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .hover_time {
            display: none;
        }

        .message:hover+.hover_time {
            display: block;
        }

        .hover_time1 {
            display: none;
        }

        .message:hover+.hover_time1 {
            display: block;
        }
    </style>
@endsection

@section('sidebar')
    @include('includes.sidebarTeacher')
@endsection

@section('content')
    <div class="col-lg-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Liên hệ với sinh viên ></li>
            </ol>
        </nav>
        <div class="container row justify-content-around" style="margin: 0 auto;">

            <div class="contact col-lg-8 col-sm-12">
                <div class="messenger-body">

                    @if (count($dataMessage) == 0)
                        <div style="text-align:center">
                            <span>Chưa có tin nhắn nào với nhóm sinh viên này trước đây</span>
                        </div>
                    @else
                        @foreach ($dataMessage as $item)
                            @if ($item->chat_sender == 1)
                                <h6>{{ $item->name }}</h6>
                                <div style="display: flex; align-items: start;">
                                    <img src="{{ asset('storage/image/' . $item->avt) }}">
                                    <span class="message" style=" background-color:rgb(0, 81, 255)(0, 102, 255)">
                                        {{ $item->chat_message }} </span>
                                    <span class="hover_time">{{ substr($item->created_at, -8, 5) }}</span>

                                </div>
                            @else
                                <div style="display:flex;justify-content:flex-end">
                                    <span class="hover_time1">{{ substr($item->created_at, -8, 5) }}</span>
                                    <span class="message message1" style=" background-color:red"> {{ $item->chat_message }}
                                    </span>
                                </div>
                            @endif
                        @endforeach
                    @endif

                </div>
                <div class="messenger-footer d-flex justify-content-center">
                    <form action="{{ route('teacher.handlePostMessage') }}" method="post" style="width: 95%;">
                        @csrf
                        <label for="image-upload" class="attachment-icon">
                            <i class="bi bi-card-image"></i>
                        </label>
                        <input id="image-upload" type="file" class="attachment-input" style="display: none"
                            accept="image/*">
                        <label for="file-upload" class="attachment-icon">
                            <i class="bi bi-paperclip"></i>
                        </label>
                        <input id="file-upload" type="file" class="attachment-input" style="display: none">
                        <input class="invite" type="text" class="input-box" placeholder="Nhập tin nhắn..."
                            name="message">
                        <button class="" style="width: 5%; color: black !important;" type="submit"><i
                                class="bi bi-send"></i></button>
                    </form>
                </div>
                @if (Session::has('msg'))
                    <div style="text-align: center; color: red;">
                        <ul>
                            <li>{{ Session::get('msg') }}</li>
                        </ul>
                    </div>
                @endif
            </div>
            <button class="contact-hidden" data-bs-target="#flush-collapseOne5" data-bs-toggle="collapse"
                aria-expanded="false" aria-controls="flush-collapseOne"><i
                    class="bi bi-arrow-down-right-square"></i></button>
            <div id="flush-collapseOne5" class="accordion-collapse collapse col-lg-3 col-sm-12"
                data-bs-parent="#accordionFlushExample">
                <div class="your-message">
                    <div class="avatar-preview">
                        <img id="previewImage" src="{{ asset('storage/image/' . $dataGroup1[0]->group_avt) }}"
                            alt="">
                    </div>
                    <h5 class="text-center">Nhóm:{{ $dataGroup1[0]->group_number }}</h5>
                    <h5 class="text-center">{{ $dataGroup1[0]->group_name }}</h5>
                    <a style="margin-left: 20px;" href="{{ route('student.infoStudent') }}"><i
                            class="bi bi-person-square"></i>Trang
                        cá nhân</a> <br>
                    <div class="accordion" id="" style="margin-top: 10px; margin-left:20px;">
                        <button class="btn-expand" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne4" aria-expanded="false" aria-controls="flush-collapseOne">
                            File Phương tiện, file, liên kết
                        </button>
                        <div id="flush-collapseOne4" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <button class="button-invisible"><i class="bi bi-images"></i>File phương tiện</button>
                            <button class="button-invisible"><i class="bi bi-file-earmark-fill"></i>File</button>
                            <button class="button-invisible"><i class="bi bi-link-45deg"></i>Liên két</button>
                        </div>
                    </div> <br>
                    <div class="accordion" id="" style="margin-left: 20px;">
                        <button class="btn-expand" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne2" aria-expanded="false" aria-controls="flush-collapseOne">
                            Tùy chỉnh đoạn chat Chat
                        </button>
                        <div id="flush-collapseOne2" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample1">
                            <button class="button-invisible"><i class="bi bi-palette-fill"></i>Đổi chủ đề</button>
                            <button class="button-invisible"><i class="bi bi-emoji-heart-eyes-fill"></i>Thay đổi biểu
                                tượng
                                cảm xúc</button>
                            <button class="button-invisible"><i class="bi bi-snapchat"></i>Chỉnh sửa biệt danh</button>
                        </div>
                    </div> <br>
                    <div class="accordion" id="" style="margin-left: 20px;">
                        <button class="btn-expand" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne3" aria-expanded="false" aria-controls="flush-collapseOne">
                            Thành viên nhóm
                        </button>
                        <div id="flush-collapseOne3" class="accordion-collapse collapse d-flex"
                            data-bs-parent="#accordionFlushExample2">
                            @foreach ($dataMember as $item)
                                @if ($item->stu_status == 4)
                                    <img class="col-6 img" src="{{ asset('storage/image/' . $item->stu_avt) }}"
                                        alt="">
                                    <button class="button-invisible">{{ $item->stu_name }}</button>
                                @endif
                            @endforeach
                            {{-- <button class="button-invisible"><i class="bi bi-people-fill"></i>Nguyễn Viết Tuấn</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center;">
            <a class="request" href="{{ route('teacher.teacherChat') }}">Quay lại</a>
        </div>
    </div>
    <script>
        document.getElementById("image-upload").addEventListener("change", function(event) {
            const selectedImage = event.target.files[0];
            if (selectedImage) {
                console.log("Đã tải lên ảnh:", selectedImage);
            }
        });

        document.getElementById("file-upload").addEventListener("change", function(event) {
            const selectedFile = event.target.files[0];
            if (selectedFile) {
                console.log("Đã tải lên tệp đính kèm:", selectedFile);
            }
        });

        window.addEventListener('load', () => {
            const messengerBody = document.querySelector('.messenger-body');
            messengerBody.scrollTop = messengerBody.scrollHeight;
        });
    </script>
@stop
