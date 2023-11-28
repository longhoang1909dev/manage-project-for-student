@extends('layouts.default')
@section('title', 'Đăng ký đồ án')

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
    <div class="register search col-lg-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Đăng ký đồ án</li>
            </ol>
        </nav>
        <form class="container" style="margin-bottom: 10px">
            <input placeholder="Nhập từ khóa muốn tìm kiếm" required="" pattern=".*\S.*" type="search"
                class="input invite" id="search">
            <span class="caret"></span>
        </form>
        <table class="container">
            <tr>
                <th style="text-align: center">Tên giảng viên</th>
                <th style="text-align: center">Tên đề tài</th>
                <th style="text-align: center">Yêu cầu</th>
                <th style="text-align: center">Lĩnh vực</th>
                <th style="text-align: center">Số lượng thành viên</th>
                <th style="text-align: center">Lựa chọn</th>
            </tr>
        </table>
        <div style="max-height: 400px; overflow: auto;">
            <table class="container">
                @foreach ($allProject as $item)
                    <tr>
                        <td>{{ $item->t_name }}</td>
                        <td>{{ $item->p_name }}</td>
                        <td>{{ $item->p_request }}</td>
                        <td>{{ $item->p_major }}</td>
                        <td>{{ $item->p_quantity }}</td>
                        <td><a
                                href="{{ route('student.requestJoinProject', ['p_id' => $item->p_id, 't_id' => $item->t_id]) }}"><button
                                    class="invite" type="submit">Tham gia nhóm</button></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
@stop
