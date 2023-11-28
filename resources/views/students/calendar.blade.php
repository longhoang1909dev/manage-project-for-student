@extends('layouts.default')
@section('title', 'Lịch thống kê báo cáo')

@section('header')
    @include('includes.header', [
        'name' => $studentData->stu_name,
        'img' => $studentData->stu_avt,
    ])
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('sidebar')
    @include('includes.sidebar')
@endsection

@section('content')
    <div class="col-lg-10">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Lịch thống kêu báo cáo ></li>
            </ol>
        </nav>
        <div class="calendar container">
            <div class="select-date">
                <p>Chọn ngày và thời gian</p>
                <input type="datetime-local" id="currentDateTime" class="form-control"
                    style="margin-left: 15px;width: 200px;">
            </div>
            <table style="margin-bottom: 20px;">
                <tr>
                    <th>Ngày họp</th>
                    <th>Giờ bắt đầu</th>
                    <th>Giờ kết thúc</th>
                    <th>Địa điểm báo cáo</th>
                </tr>
            </table>
            <table>
                @foreach ($dataCalender as $item)
                <tr>
                    <td>{{$item->day}}</td>
                    <td>{{$item->stime}}</td>
                    <td>{{$item->etime}}</td>
                    <td><a href="" target="_blank">{{$item->link_meeting}}</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        function updateCurrentDateTime() {
            const currentDateTimeInput = document.getElementById('currentDateTime');
            const now = new Date();
            const utcTime = now.getTime() - (now.getTimezoneOffset() * 60000);
            const isoString = new Date(utcTime).toISOString().slice(0, 16);
            currentDateTimeInput.value = isoString;
        }
        updateCurrentDateTime();
        setInterval(updateCurrentDateTime, 1000); // 1000 ms = 1 giây
    </script>
@stop
