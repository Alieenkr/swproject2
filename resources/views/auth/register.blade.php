@extends('layouts.app')

@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
	<nav class="nav navbar-default" style="margin-bottom:0px;">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" onclick="location.href='/editpage2/html'" style="font-size:20px;">LET'S CODING</a>
			</div>
	</nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">회원가입</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('nickname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">닉네임</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="nickname" value="{{ old('nickname') }}" required autofocus>

                                {{--@if ($errors->has('nickname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nickname') }}</strong>
                                    </span>
                                @endif--}}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">이메일</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                {{--@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif--}}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('login_id') ? ' has-error' : '' }}">
                            <label for="login_id" class="col-md-4 control-label">아이디</label>

                            <div class="col-md-6">
                                <input id="login_id" type="text" class="form-control" name="login_id" value="{{ old('login_id') }}" required>

                               {{-- @if ($errors->has('login_id'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('login_id') }}</strong>
                                </span>
                                @endif--}}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">비밀번호</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                {{--@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif--}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">비밀번호 확인</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    회원가입
                                </button>
								<h5 style="margin-top:5px;">가입 완료시 로그인 페이지 이동</h5>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
