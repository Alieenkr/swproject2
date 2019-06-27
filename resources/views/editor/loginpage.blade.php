@extends('layouts.app')

@section('content')
    <style>
        .back {
            width: 100%;
            margin-top: 10px;
        }
		
    </style>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    @if(count($errors->any()) > 0)
        <div class="errors">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
        </div>
    @endif
    <!-- Modal -->


	<nav class="nav navbar-default" style="margin-bottom:0px;">
            <div class="navbar-header">
                <a class="navbar-brand" href="#" onclick="location.href='/editpage2/html'" style="font-size:20px;">LET'S CODING</a>
			</div>
	</nav>
    <div class="container">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="jumbotran" style="padding-top: 20px;">
                <form method="post" action="/login">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <h3 style="text-align: center;">로그인</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{$id ?? ''}}" placeholder="아이디" name="id"
                               maxlength="20">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="비밀번호" name="pw" maxlength="20">
                    </div>
                    <input type="submit" class="btn btn-primary form-control" value="로그인" style="margin-bottom:10px">
					<input onclick="location.href='/member_form'" type="button" class="btn btn-primary form-control" value="회원가입">
                    <input type="button" class="btn btn-primary back" value="뒤로가기" onclick="location.href='/editpage/html'">
                </form>
            </div>
        </div>

        <!-- Button trigger modal -->

    </div>
    <!-- Button trigger modal -->

        <!-- Button trigger modal -->




    <script>
        /*$(document).ready(function() {
            var errors = $(".errors");
            var modalButton = $(".error-modal");

            init();

            function init() {
                errors.find("div").each(function(idx, elem){
                    $("#exampleModal").find(".modal-body").append("<div class='alert alert-danger'>" + elem + "</div>");
                });

                modalButton.trigger('click');
            }
        });*/

    </script>

@endsection
