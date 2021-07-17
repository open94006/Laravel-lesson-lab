@extends('layouts.master')

@section('title', '詳細資料')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">詳細資料</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 text-right p-0">學號：</div>
                    <div class="col-md-5 p-0">{{ $student->no }}</div>
                </div>
                @isset($user->name)
                <div class="row">
                    <div class="col-md-5 text-right p-0">姓名：</div>
                    <div class="col-md-5 p-0">{{ $user->name }}</div>
                </div>
                @endisset
                <div class="row">
                    <div class="col-md-5 text-right p-0">電話：</div>
                    <div class="col-md-5 p-0">{{ $student->tel }}</div>
                </div>
                @isset($user->email)
                <div class="row">
                    <div class="col-md-5 text-right p-0">信箱：</div>
                    <div class="col-md-5 p-0">{{ $user->email }}</div>
                </div>
                @endisset
                @if( is_null($subject) || $subject == 'chinese' )
                <div class="row">
                    <div class="col-md-5 text-right p-0">國文：</div>
                    <div class="col-md-5 p-0">{{ $score->chinese }}</div>
                </div>
                @endif
                @if( is_null($subject) || $subject == 'english' )
                <div class="row">
                    <div class="col-md-5 text-right p-0">英文：</div>
                    <div class="col-md-5 p-0">{{ $score->english }}</div>
                </div>
                @endif
                @if( is_null($subject) || $subject == 'math' )
                <div class="row">
                    <div class="col-md-5 text-right p-0">數學：</div>
                    <div class="col-md-5 p-0">{{ $score->math }}</div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection