@extends('layouts.master')

@section('title', '編輯資料')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="m-0">編輯個人資料</h4>
            </div>
            <div class="card-body">
                @isset($msg)
                <div class="alert alert-success" role="alert">
                    {{ $msg ?? '沒有任何訊息' }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endisset

                <form
                    action="{{ action([App\Http\Controllers\SchoolController::class, 'update'] , ['student_no' => $student->no]) }}"
                    method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label>信箱</label>
                        <input type="email" class="form-control" name="email" value="{{ $student->user->email }}"
                            disabled>
                    </div>

                    <div class="form-group">
                        <label for="name">姓名：</label>
                        <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            name="name" value="{{ $student->user->name }}">
                        @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="tel">電話：</label>
                        <input type="text" class="form-control {{ $errors->has('tel') ? 'is-invalid' : '' }}" name="tel"
                            value="{{ $student->tel }}">
                        @if ($errors->has('tel'))
                        <div class="invalid-feedback">
                            <strong>{{ $errors->first('tel') }}</strong>
                        </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-1">
                            <button type="submit" class="btn btn-primary btn-block">
                                修改
                            </button>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ url('/show') }}" class="btn btn-danger btn-block">
                                返回
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop