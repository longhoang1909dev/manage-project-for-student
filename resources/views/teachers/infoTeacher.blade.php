@extends('layouts.default')
@section('title', 'Thông tin giảng viên')


@section('header')
    @include('includes.header', [
        'name' => $dataTeacher->t_name,
        'img' => $dataTeacher->t_avt,
    ])
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('sidebar')
    @include('includes.sidebarTeacher')
@endsection

@section('content')
    <div class="groups col-lg-10 infoTeacher">
        {{-- <img src="../img/background-primary.png" alt=""> --}}
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Thông tin giảng viên > {{ $dataTeacher->t_name }}</li>
            </ol>
        </nav>
        <div class="row justify-content-start">
            <div class="text-center col-lg-3" style="">
                <div class="info_img">
                    <input type="file" id="file-input" style="display: none">
                    <label for="file-input">
                        <img src="{{ asset('storage/image/' . $dataTeacher->t_avt) }}" alt="" id="image">
                    </label>
                </div>
                <h5
                    style="margin-top: 10px; background: #8EACCD; padding: 3px 3px; display:inline-block; border-radius: 5px;">
                    {{ $dataTeacher->t_name }}</h5>
            </div>
            <div class="col-lg-6">
                <p class="fw-bold">Thông tin nổi bật</p>
                @foreach ($dataTeacher_ost as $item)
                    <p><i class="bi bi-award"></i>{{ $item->t_ost }}.</p>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-evenly" style="margin: 30px 10px;">
            <div class="col-5" style=" padding:unset; border: 1px solid rgb(106, 89, 89); background: white;">
                <form action="" method="" style="padding: 0px 12px;">
                    <h4 class="">Thông tin cá nhân</h4>
                    <div class="d-flex flex-column align-item-end" style="">
                        <textarea name="" id="js-textarea" cols="10" rows="10"
                            style="outline: none; border: none; width: 100%; height: 90px; padding: 10px; color:black">{{ $dataTeacher->t_desc }}</textarea>
                        <i class="bi bi-pencil-square" role="button" id="edit-textarea" style="text-align: end;"></i>
                        <i class="fa-solid fa-paper-plane" type="submit" id="send-textarea"
                            style="display: none; text-align: end; margin: 0.5rem;"></i>
                    </div>
                </form>
            </div>
            <div class="col-5" style="border: 1px solid rgb(106, 89, 89); background: white;">
                <h4>Kỹ năng cá nhân</h4>
                <div class="row" style="">
                    @foreach ($dataTeacher_skill as $item)
                        <div class="col-6 text-start">
                            <label class="ms-3">{{ $item->t_skill }}</label>
                            <div class="progress col-9" role="progressbar" aria-label="Info example" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-info text-dark" style="width: {{ $item->t_skill_detail }}%">
                                    {{ $item->t_skill_detail }}%</div>
                            </div>
                        </div>
                    @endforeach

                    <i class="bi bi-pencil-square text-end"></i>
                </div>
            </div>
        </div>
        <div class="row justify-content-center gy-3" style="">
            <div class="col-4 input_info d-flex justify-content-between" style="">
                <div>
                    <label for="" style="width: 100px;">Họ và tên: </label>
                    <input type="text" value="{{ $dataTeacher->t_name }}">
                </div>
                <i class="bi bi-pencil-square"></i>

            </div>
            <div class="col-4 input_info d-flex justify-content-between" style="">
                <div>
                    <label for="" style="width: 100px;">Số điện thoại: </label>
                    <input type="text" value="{{ $dataTeacher->t_phone }}">
                </div>
                <i class="bi bi-pencil-square"></i>
            </div>
            <div class="col-4 input_info d-flex justify-content-between" style="">
                <div>
                    <label for="" style="width: 100px;">Email: </label>
                    <input type="text" value="{{ $dataTeacher->t_email }}">
                </div>
                <i class="bi bi-pencil-square"></i>
            </div>
            <div class="col-4 input_info d-flex justify-content-between" style="">
                <div>
                    <label for="" style="width: 100px;">Ngày Sinh: </label>
                    <input style="width: 50%;" type="date" value="{{ $dataTeacher->t_born }}">
                </div>
                <i class="bi bi-pencil-square"></i>
            </div>
            <div class="col-4 input_info d-flex justify-content-between" style="">
                <div>
                    <label for="" style="width: 100px;">Khoa: </label>
                    <input type="text" value="{{ $dataTeacher->t_major }}">
                </div>
                <i class="bi bi-pencil-square"></i>
            </div>
            <div class="col-4 input_info d-flex justify-content-between" style="">
                <div>
                    <label for="" style="width: 100px;">NickName: </label>
                    <input type="text" value="{{ $dataTeacher->t_nickname }}">
                </div>
                <i class="bi bi-pencil-square"></i>
            </div>
        </div>
        <div style="margin-top: 55px; text-align:center;">
            <a class="cancel" href="{{ route('teacher.TE_dashboard') }}">Quay lại</a>
        </div>
    </div>
    </div>
    <script>
        const input = document.querySelector('input');
        const image = document.getElementById('image');

        input.addEventListener('change', () => {
            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    image.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@stop
