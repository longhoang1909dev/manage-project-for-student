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
    <link rel="stylesheet" href="{{ asset('css/animation.css') }}">
    <style>
        table tr td:first-child {
            width: 35% !important;
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
                <li class="breadcrumb-item active" aria-current="page">Danh sách nhóm Chat</li>
            </ol>
        </nav>
        @if (count($dataGroup) == 0)
            <div id="loading-notJoin" style="margin-top: 10%;">
                <h5>Chưa có sinh viên tạo nhóm</h5>
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
            {{-- <select onchange="window.location.href=this.options[this.selectedIndex].value; "
                style="background-color: unset; border: none; outline: none; width: 11%;">
                @foreach ($dataGroup as $item)
                    <option value="{{ route('teacher.handleChat', ['group_id' => $item->group_id]) }}">Nhóm số:
                        {{ $item->group_number }}</option>
                @endforeach

            </select> --}}

            <div class="d-flex justify-content-center align-items-center" style="height: 60vh;">
                <table style="width: 72%">
                    @foreach ($a as $item)
                        <tr>
                            <td style="">{{ $item->p_name }}</td>
                            @foreach ($dataGroup as $item2)
                                @if ($item->p_id == $item2->p_id)
                                    <td class="d-flex flex-wrap" style="padding: unset; width: unset; height: 100%; background: unset;">
                                            <div class="invite" style="margin: 0px 5px 10px 0px;">
                                                <a
                                                    href="{{ route('teacher.handleChat', ['group_id' => $item2->group_id]) }}">Nhóm
                                                    số:
                                                    {{ $item2->group_number }}</a>
                                            </div>
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </table>
            </div>
    </div>
    @endif
    </div>
@stop
