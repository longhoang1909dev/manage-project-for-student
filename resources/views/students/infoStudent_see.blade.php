@if (Session::has('id'))
    @extends('layouts.default')
    @section('title', 'Chỉnh sửa thông tin cá nhân')

    @section('css')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @endsection

    @section('header')
        @include('includes.header', [
            'name' => $studentData->stu_name,
            'img' => $studentData->stu_avt,
        ])
    @endsection
@else
    @extends('layouts.default')
    @section('title', 'Chỉnh sửa thông tin cá nhân')

    @section('css')
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @endsection

    @section('header')
        @include('includes.header', [
            'name' => $dataTeacher->t_name,
            'img' => $dataTeacher->t_avt,
        ])
    @endsection
@endif


@section('sidebar')
    @include('includes.sidebarTeacher')
@endsection

@section('content')
    <form class="form-infoS" action="{{ route('student.updateInfoStudent') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- @method('PUT') --}}
        <div class="groups col-lg-10" style="margin: 0 auto; margin-top: 15px;">
            {{-- <img src="../img/background-primary.png" alt=""> --}}
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Chỉnh sửa thông tin cá nhân</li>
                </ol>
            </nav>
            <div class="text-center">
                <div class="info_img">
                    <label for="file-input">
                        <img src="{{ asset('storage/image/' . $dataStudentRequest->stu_avt) }}" alt=""
                            id="image" name="stu_avt">
                    </label>
                </div>
                <h5
                    style="margin-top: 10px; background: #8EACCD; padding: 3px 3px; display:inline-block; border-radius: 5px;">
                    {{ $dataStudentRequest->stu_name }}</h5>
            </div>
            <div class="row justify-content-evenly" style="margin: 30px 0px; ">
                <div class="col-5"
                    style="padding-right: calc(var(--bs-gutter-x) * .5);
                padding-left: calc(var(--bs-gutter-x) * .5);
                 border: 1px solid rgb(106, 89, 89); background: white;
                 border-radius: 10px;">
                    <h4 class="">Thông tin cá nhân</h4>
                    <div class="d-flex flex-column align-item-end" style="">
                        <textarea name="stu_desc_change" id="js-textarea" cols="10" rows="10"
                            style="outline: none; border: none; width: 100%; height: 90px; padding: 10px; color:black" disabled>{{ $dataStudentRequest->stu_desc }}</textarea>
                    </div>

                </div>
                <div class="col-5" style="border-radius: 10px ;border: 1px solid rgb(106, 89, 89); background: white;">
                    <h4>Kỹ năng cá nhân</h4>
                    <div class="row" style="">
                        {{-- @if (count($dataStudentRequestDetail) == 0)
                            <label class="ms-3">Chưa có kỹ năng bạn có muốn thêm</label>
                            <div class="progress col-9" role="progressbar" aria-label="Info example" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-info text-dark" style="width: 0%">0%</div>
                            </div>
                        @else
                            @foreach ($dataStudentRequestDetail as $item)
                                <div class="col-6 text-start">
                                    <label class="ms-3">{{ $item->stu_skill }}</label>
                                    <div class="progress col-9" role="progressbar" aria-label="Info example"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar bg-info text-dark"
                                            style="width: {{ $item->stu_skill_detail }}%">
                                            {{ $item->stu_skill_detail }}%</div>
                                    </div>
                                </div>
                            @endforeach
                        @endif --}}
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gy-3" style="">
                <div class="col-lg-5 col-xl-5 input_info d-flex justify-content-between" style="">
                    <div style="width: 85%; text-align: start;">
                        <label for="" style="width: 100px;">Họ và tên: </label>
                        <input type="text" value="{{ $dataStudentRequest->stu_name }}" disabled style="color: black">
                    </div>


                </div>
                <div class="col-lg-5 col-xl-5 input_info d-flex justify-content-between" style="">
                    <div style="width: 85%; text-align: start;">
                        <label for="" style="width: 100px;">Số điện thoại: </label>
                        <input type="text" value="0{{ $dataStudentRequest->stu_phone }}" disabled style="color: black">
                    </div>

                </div>
                <div class="col-lg-5 col-xl-5 input_info d-flex justify-content-between" style="">
                    <div style="width: 85%; text-align: start;">
                        <label for="" style="width: 100px;">Email: </label>
                        <input type="text" value="{{ $dataStudentRequest->stu_email }}" disabled style="color: black">
                    </div>

                </div>
                <div class="col-lg-5 col-xl-5 input_info d-flex justify-content-between" style="">
                    <div style="width: 85%; text-align: start;">
                        <label for="" style="width: 100px;">Ngày Sinh: </label>
                        <input type="date" value="{{ $dataStudentRequest->stu_born }}" disabled style="color: black">
                    </div>

                </div>
                <div class="col-lg-5 col-xl-5 input_info d-flex justify-content-between" style="">
                    <div style="width: 85%; text-align: start;">
                        <label for="" style="width: 100px;">Khoa: </label>
                        <input type="text" value="{{ $dataStudentRequest->stu_major }}" disabled style="color: black">
                    </div>
                </div>
                <div class="col-lg-5 col-xl-5 input_info d-flex justify-content-between" style="">
                    <div style="width: 85%; text-align: start;">
                        <label for="" style="width: 100px;">MSSV: </label>
                        <input type="text" value="{{ $dataStudentRequest->MSSV }}" disabled style="color: black">
                    </div>
                </div>
                <div class="col-lg-5 col-xl-5 input_info d-flex justify-content-between" style="height: 41px;">
                    <div style="width: 85%; text-align: start;">
                        <label for="" style="width: 100px;">NickName: </label>
                        <input type="text" value="{{ $dataStudentRequest->stu_nickname }}" disabled
                            style="color: black">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('js')
@endsection
