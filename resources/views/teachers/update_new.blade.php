@extends('layouts.default')
@section('title', 'Tạo nhóm mới')

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
    <div class="col-lg-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"> Cập nhật đồ án > Tạo đồ án mới</li>
            </ol>
        </nav>
        @if (Session::has('success'))
            <div>
                <ul>
                    <li>{{ Session::get('success') }}</li>
                </ul>
            </div>
        @endif
        <div class="register_create container update_new">
            <h5>Giảng viên: {{ $dataTeacher->t_name }}</h5>
            <form method="POST" action="{{ route('teacher.handleCreate') }}" enctype="multipart/form-data">
                @csrf
                <label for="">Tên giảng viên:</label>
                <input class="invite" type="text" value="{{ $dataTeacher->t_name }}"> <br>
                <label for="">Yêu cầu: </label>
                <input class="invite" type="text" name="p_request"> <br>
                <label for="">Tên đề tài: </label>
                <input class="invite" type="text" name="p_name"><br>
                <label for="">Số lượng thành viên: </label>
                <input class="invite" type="text" name="p_quantity"><br>
                <label for="">Chuyên ngành: </label>
                <input class="invite" type="text" name="p_major"><br>
                @if (count($dataOptional) != 0)
                @foreach ($dataOptional as $item)
                <label for="">{{$item->p_title_o}}</label>
                <input class="invite" type="text" name="" value="{{$item->p_request_o}}"><br>
                @endforeach
                @endif
                <div  class="cancel" style="background: #c8b6f2; display: inline-block;" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    role="button">Thêm lựa chọn</div>
                <div style="text-align:center; margin-top: 20px;">
                    <button type="submit" class="invite">Tạo đồ án</button>
                </div>

            </form>
        </div>
        <div class="d-flex justify-content-around" style="clear: both">
            <div class="d-flex justify-content-center mt-5">
                <a class="cancel px-5" href="{{ route('teacher.update') }}">Quay lại</a>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{route('teacher.handleNewOption')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content" style="top: 20vh; text-align: center;">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm lựa chọn</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div style="text-align: start; margin-bottom: 10px;">
                            {{-- <label for="requirement" style="margin-right: 6px;">Yêu cầu: </label> --}}
                            <input style="border-radius: 5px;" class="invite mb-2" type="text" id="requirement" name="title_o" placeholder="Nhập tiêu đều"><br>
                            <input style="border-radius: 5px;" class="invite" type="text" id="requirement" name="request_o" placeholder="Nhập lựa chọn"><br>
                        </div>
                    </div>
                    {{-- <i class="bi bi-plus-circle" id="add-requirement"></i> --}}
    
                    <div class="modal-footer">
                        <button type="button" class="btn comeback" data-bs-dismiss="modal">Quay lại</button>
                        <button type="submit" class="btn request">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        // const addBtn = document.getElementById('add-requirement');
        // const modalBody = document.querySelector('.modal-body');

        // addBtn.addEventListener('click', () => {
        //     const newDiv = document.createElement('div');
        //     newDiv.style.textAlign = 'start';
        //     newDiv.style.marginBottom = '10px';

        //     const label = document.createElement('label');
        //     label.setAttribute('for', 'requirement');
        //     label.textContent = 'Yêu cầu:';
        //     label.style.marginRight = '10px';

        //     const input = document.createElement('input');
        //     input.setAttribute('type', 'text');
        //     input.setAttribute('class', 'invite');
        //     input.setAttribute('id', 'requirement');
        //     input.setAttribute('name', 'requirement');
        //     input.setAttribute('style',  'outline: none; width: 85%;');

        //     newDiv.appendChild(label);
        //     newDiv.appendChild(input);
        //     modalBody.appendChild(newDiv);
        // });
    </script>

@stop
