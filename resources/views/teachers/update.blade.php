@extends('layouts.default')
@section('title', 'Cập nhật đồ án')

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
                <li class="breadcrumb-item active" aria-current="page">Cập nhật đồ án </li>
            </ol>
        </nav>
        <div class="search update">
            <div>
                <div style="float: left;">
                    <a class="btn_list_register">Đồ án hiện có</a>
                    <a class="invite" href="{{ route('teacher.update_new') }}">Tạo đồ án mới</a>
                </div>
                <form class="container" style="margin-bottom: 10px">
                    <input placeholder="Nhập từ khóa muốn tìm kiếm" required="" pattern=".*\S.*" type="search"
                        class="input invite" id="search">
                    <span class="caret"></span>
                </form>
            </div>

            @if (count($dataProject) == 0)
                <div id="loading-notJoin" style="margin-top: 10%; clear: both; padding-top: 5%;">
                    <h5>Hiện tại bạn chưa có đồ án nào</h5>
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
                        <th style="text-align: center">STT</th>
                        <th style="text-align: center">Tên đề tài</th>
                        <th style="text-align: center">Yêu cầu</th>
                        <th style="text-align: center">Chuyên ngành</th>
                        <th style="text-align: center">Số lượng thành viên</th>
                        @if (count($dataOptional) != 0)
                            @foreach ($dataOptional as $item)
                                <th style="text-align: center">{{ $item->p_title_o }}</th>
                            @endforeach

                        @endif
                        <th style="text-align: center">Lựa chọn</th>
                    </tr>

                </table>
                <div style="max-height: 330px; overflow: auto;">
                    <table class="container">
                        @foreach ($dataProject as $key => $item)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $item->p_name }}</td>
                                <td>{{ $item->p_request }}</td>
                                <td>{{ $item->p_major }}</td>
                                <td>{{ $item->p_quantity }}</td>
                                @foreach ($dataOptional as $item1)
                                    @if ($item1->p_id == $item->p_id)
                                        <td>{{ $item1->p_request_o }}</td>
                                    @endif
                                @endforeach
                                <td>
                                    <button class="invite" style="padding: 10px 15px;" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Xóa</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="top: 20vh">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cảnh báo!</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <Label style="padding: 0.375rem 0px; width:100%">
                                bạn có chắc chắn muốn xóa đồ án này
                            </Label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn comeback" data-bs-dismiss="modal">Hủy bỏ</button>
                                <a href="{{route('teacher.deleteProject',['p_id'=>$item->p_id])}}">
                                    <button class="invite" style="padding: 10px 15px;">
                                        Xóa</button>
                                </a>
                                
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @stop
