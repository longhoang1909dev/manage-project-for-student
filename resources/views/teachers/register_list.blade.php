@extends('layouts.default')
@section('title', 'Danh sách sinh viên')

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
    <div class="register_list search col-lg-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Danh sách sinh viên</li>
            </ol>
        </nav>
        <div>
            <div style="float: left;">
                <a class="btn_list_register" href="{{ route('teacher.register_list') }}">Danh sách sinh viên</a>
                <a class="invite" href="{{ route('teacher.register_wait') }}">Hàng chờ</a>
            </div>
            <form class="container" style="margin-bottom: 10px">
                <input placeholder="Nhập từ khóa muốn tìm kiếm" required="" pattern=".*\S.*" type="search"
                    class="input invite" id="search">
                <span class="caret"></span>
            </form>
        </div>

        @if (count($dataStudentRegis) == 0)
            <div id="loading-notJoin" style="margin-top: 10%;">
                <h5>Chưa có sinh viên nào đăng kí đề tài của bạn</h5>
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
        @else
            <table class="container">
                <tr style="border-bottom: unset;">
                    <th style="text-align: center">Tên sinh viên</th>
                    <th style="text-align: center">Email</th>
                    <th style="text-align: center">MSSV</th>
                    <th style="text-align: center">Đề tài tham gia</th>
                    <th style="text-align: center">Chuyên ngành </th>
                    <th style="text-align: center">Trạng thái </th>
                    <th style="text-align: center">Lựa chọn</th>
                </tr>
            </table>
            <div style="max-height: 500px; overflow: auto;">
                <table class="container">
                    @foreach ($dataStudentRegis as $item)
                        <tr>
                            <td>{{ $item->stu_name }} </td>
                            <td>{{ $item->stu_email }}</td>
                            <td>{{ $item->MSSV }}</td>
                            <td>{{ $item->p_name }}</td>
                            <td>{{ $item->stu_major }}</td>
                            <td>
                                @if ($item->stu_status == 4)
                                    Đã có nhóm <br>
                                    @if ($item->stu_leader == 1)
                                        (nhóm trưởng)
                                    @endif
                                @elseif ($item->stu_status == 3)
                                    Đang tham gia nhóm
                                @elseif($item->stu_status == 2)
                                    Chưa vào nhóm
                                @endif
                            </td>
                            <td>
                                <button class="invite" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Xóa</button>
                                <button class="cancel" style="padding: 7px 10px;">
                                    <a href="{{ route('teacher.infoStudent', ['stu_id' => $item->stu_id]) }}">Xem thông
                                        tin</i></a>
                                </button>
                                @if ($item->stu_leader != 1 && $item->stu_status == 4)
                                    <button class="invite"><a href="#">Chuyển nhóm</a></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <!-- Modal -->
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" style="top: 20vh">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cảnh báo!</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <Label style="padding: 0.375rem 0px;">
                                    bạn có chắc muốn xóa sinh viên ra khỏi đồ án ?
                                </Label>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn comeback" data-bs-dismiss="modal">Hủy bỏ</button>
                                <button class="btn cancel" type="button" data-bs-toggle="modal" style="background: #dd4848;"
                                    data-bs-target="#exampleModal"><a
                                        href="{{ route('teacher.deleteStudent', ['stu_id' => $item->stu_id]) }}">Xóa</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
        @endif

    </div>
@stop
