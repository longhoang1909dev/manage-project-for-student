@extends('layouts.default')
@section('title', 'Hàng chờ')

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
    <div class="register_wait search col-lg-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Danh sách sinh viên > hàng chờ</li>
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

        @if (count($dataStudentRequest) == 0)
            <div id="loading-notJoin" style="margin-top: 10%;">
                <h5>Chưa có sinh viên nào yêu cầu vào nhóm của bạn</h5>
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
                <tr>
                    <th style="text-align: center">Tên sinh viên</th>
                    <th style="text-align: center">Mã số sinh viên</th>
                    <th style="text-align: center">Email</th>
                    <th style="text-align: center">Đề tài tham gia</th>
                    <th style="text-align: center">Chuyên ngành</th>
                    <th style="text-align: center">Lựa chọn</th>
                </tr>

            </table>
            <div style="max-height: 400px; overflow: auto;">
                <table class="container">
                    @foreach ($dataStudentRequest as $item)
                        <tr>
                            <td>{{ $item->stu_name }}</td>
                            <td>{{ $item->MSSV }}</td>
                            <td>{{ $item->stu_email }}</td>
                            <td>{{ $item->p_name }}</td>
                            <td>{{ $item->stu_major }}</td>
                            <td>
                                <button class="invite"><a
                                        href="{{ route('teacher.handleRequestJoinProject', ['id' => $item->stu_id, 'status' => 1]) }}">Duyệt</a></button>
                                <button class="invite"><a
                                        href="{{ route('teacher.handleRequestJoinProject', ['id' => $item->stu_id, 'status' => 2]) }}">Từ
                                        chối</a></button>
                                <button class="cancel" style="padding: 7px 10px; background: #c8b6f2">
                                    <a href="{{ route('teacher.infoStudent', ['stu_id' => $item->stu_id]) }}">Xem thông
                                        tin</i></a>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        @endif

    </div>
@stop
