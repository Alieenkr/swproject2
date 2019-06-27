<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- CSRF Token -->
    <meta name="csrf-token"
          content="Wy5NnX1zfVrIhHomfvgmJ15z4K0yrAlHijVPBiyz">
    <meta name="_token" content="Wy5NnX1zfVrIhHomfvgmJ15z4K0yrAlHijVPBiyz">

    <title>웹 코딩 페이지</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- 단축키 라이브러리 -->
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/keyboardjs/2.3.3/keyboard.min.js"></script>

    <!-- Scripts -->
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
        });

        window.Laravel = {
            "csrfToken": "Wy5NnX1zfVrIhHomfvgmJ15z4K0yrAlHijVPBiyz"
        }
    </script>
    <script>


        function saveText() {
            var saveText = myCodeMirror.getValue();
            var text = document.getElementById('text');
            text.innerHTML = saveText;
        }


    </script>
</head>
<body>
<div id="app">

    <script>
        var hash = window.location.hash;
        var isPlayMode = hash == '#play';
        var addToRs = function (txt) {
            $('#rs').append(txt + "\n");
        };

        var clearConsole = function () {
            $('#rs').empty();
        };
    </script>

    <style>
        .msg-modal {
            position: absolute;
            top: 50%;
            left: 50%;
            font-size: 20pt;
            transform: translateX(-50%) translateY(-50%);
            background-color: #DFDFDF;
            border: 20px solid gold;
        }
    </style>

    <style>

        /* 전체 레이아웃 */
        .code-container .code-views > div {
            display: none;
        }

        .code-container .code-views > div.active {
            display: block;
        }
    </style>


    <script>
        $(function () {
            $('.code-tabs ul li').click(
                function () {
                    var $clickedBtn = $(this);
                    var $codeContainer = $clickedBtn
                        .closest('.code-container');

                    $clickedBtn.siblings().removeClass('active');
                    $clickedBtn.addClass('active');

                    var type = $clickedBtn.data('type');

                    var $codeTabs = $codeContainer.find('.code-views');
                    $codeTabs.find('div').removeClass('active');
                    $codeTabs.find('div.code-view-' + type).addClass(
                        'active');
                });

            // 최초에 소스탭을 활성화 시킨다.
            // 감사합니다.
            $('.code-tabs ul li').eq(0).click();
        });
    </script>

    <style>
        .admin-btn {
            display: none;
        }
    </style>

    <script>
        var isLogined = true;
        var userEmail = '';
    </script>


    <script>
        var isAdmin = true;

        $(function () {
            if (isLogined == false) {
                $('.code-container').empty();
                $('.btns').empty();
            }

            if (isAdmin) {
                $('.admin-btn').show();
            }
        });
    </script>

    <div class="code-container">
		<nav class="nav navbar-default" style="margin-bottom:0px">
			<div class="nav navbar-header" style="margin-right:1100px">
				<a class="navbar-brand" href="/editpage2/{{$editorType}}">LET'S CODING</a>
			</div>
			<span class="nav">
			<div class="btn-group" style="margin-top:5px">
			@if(Auth::check())
				<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				{{ Auth::user()->nickname }}
				</button>
					<div class="dropdown-menu">
						<button class="dropdown-item" type="button"><a href="/logout">로그아웃</a></button>
				</div>
			</div>
			<ul class="btn-group" style="list-style-type:none; margin-top:5px;">
			  <li>
				  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					옵션 설정
				  </button>
				  <ul class="dropdown-menu dropdown-menu overlay-change font-change font-size-change " >
						<li><h6 class="dropdown-header">오버레이</h6></li>
						<li data-overlay="light-yellow" style="background-color:#fff9bc"><button class="dropdown-item" type="button">연노랑</button></li>
						<li data-overlay="light-green"  style="background-color: #ddefbd"><button class="dropdown-item" type="button">연녹색</button></li>
						<li data-overlay="dark-yellow" style="background-color:#fff693"><button class="dropdown-item" type="button">진노랑</button></li>
						<li data-overlay="dark-green" style="background-color: #adcc78"><button class="dropdown-item" type="button">진녹색</button></li>
						<div class="dropdown-divider"></div>

						<li><h6 class="dropdown-header">글씨체</h6></li>
						<li data-font="arial" style="font-family: 'Arial', 'Helvetica', 'sans-serif'"><button class="dropdown-item" type="button">ARIAL</button></li>
						<li data-font="times" style="font-family:'Times New Roman'"><button class="dropdown-item" type="button">TIMES NEW ROMAN</button></li>
						<li data-font="andale" style="font-family:'Andale Mono', 'AndaleMono','monospace'"><button class="dropdown-item" type="button">ANDALE MONO</button></li>
						<li data-font="dyslexie" style="font-family:'dyslexie', 'serif'"><button class="dropdown-item" type="button">DYSLEXIE</button></li>
						<div class="dropdown-divider"></div>

						<span class="font-size-change">
						<li><h6 class="dropdown-header">글씨크기</h6></li>
						<li data-size="2"><button class="dropdown-item" type="button">+2px</button></li>
						<li data-size="-2"><button class="dropdown-item" type="button">-2px</button></li>
						</span>
				  </ul>
			  </li>
			</ul>
			@endif
			</span>
		</nav>


        <!--<nav class="navbar navbar-default" style="margin-bottom:0px">
            <div class="navbar-header">
				<a class="navbar-brand" href="/editpage/{{$editorType}}">LET'S CODING</a>
				<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
			  </button>
			    <button type="button" class="navbar-toggle"
                        data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="#bs-example-navbar-collapse-1"
                        aria-expanded="false">
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
            </div>
			<div class="btn-group">
			  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
			  </button>
			 </div>
				  <div class="dropdown-menu dropdown-menu-right">
					<h6 class="dropdown-header">오버레이</h6>
						<button class="dropdown-item" type="button">Action</button>
						<button class="dropdown-item" type="button">Action</button>
						<button class="dropdown-item" type="button">Action</button>
						<button class="dropdown-item" type="button">Action</button>
					<div class="dropdown-divider"></div>
					<h6 class="dropdown-header">글씨체</h6>
						<button class="dropdown-item" type="button">Action</button>
						<button class="dropdown-item" type="button">Action</button>
						<button class="dropdown-item" type="button">Action</button>
						<button class="dropdown-item" type="button">Action</button>
					<div class="dropdown-divider"></div>
					<h6 class="dropdown-header">글씨크기</h6>
						<button class="dropdown-item" type="button">Action</button>
						<button class="dropdown-item" type="button">Action</button>
					<div class="dropdown-divider"></div>
				  </div>
				</div>
			</div>-->
            <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<span>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
								@if(!Auth::check())
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">접속하기<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="/login">로그인</a></li>
									<li><a href="/member_form">회원가입</a></li>
								@else
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->nickname }}<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="/logout">로그아웃</a></li>
								@endif
							</ul>
						</li>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">오버레이 설정<span class="caret"></span></a>
							<ul class="dropdown-menu overlay-change">
								<li data-overlay="light-yellow">연노랑</li>
								<li data-overlay="light-green">연녹색</li>
								<li data-overlay="dark-yellow">진노랑</li>
								<li data-overlay="dark-green">진녹색</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">폰트 설정<span class="caret"></span></a>
							<ul class="dropdown-menu font-change" style="padding:5px">
								<li data-font="arial" style="font-family: 'Arial', 'Helvetica', 'sans-serif'">ARIAL</li>
								<li data-font="times" style="font-family:'Times New Roman'">TIMES NEW ROMAN</li>
								<li data-font="andale" style="font-family:'Andale Mono', 'AndaleMono','monospace'">ANDALE MONO</li>
								<li data-font="dyslexie" style="font-family:'dyslexie', 'serif'">DYSLEXIE</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">글씨크기 설정<span class="caret"></span></a>
							<ul class="dropdown-menu font-size">
								<li data-size="increase">+5px</li>
								<li data-size="decrease">-5px</li>
							</ul>
						</li>
					</ul>
				</span>
				</div>
        </nav>-->
		<div class="compile-nav">
			<span class="code-tabs">
				@if(!Auth::check())
				<ul class="nav nav-pills nav-justified" style="background-color: white";>
				  <li data-type="source" class="nav-item dropdown">
					<h4><a href="/login" style="color:blue; font-weight:bold;">[로그인]</a> 혹은 <a href="/member_form"  style="color:blue; font-weight:bold;">[회원가입]</a> 을 진행해주세요.</h4>
				  </li>
				</ul>
				@else
				<ul class="nav nav-pills nav-justified" style="background-color: white">
				  <li data-type="source" class="nav-item dropdown">
					<!--<a class="nav-item nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">소스</a>-->
                    <div class="btn-group">
					<button class="btn nav-item nav-link" href="#" type="button">소스</button>
                    <button class="btn dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent" type="button"></button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuReference">
					  <a class="dropdown-item" href="/editpage2/html">HTML</a>
					  <div class="dropdown-divider"></div>
					  <a class="dropdown-item" href="/editpage2/java8">JAVA</a>
					</div>
                    </div>
				  </li>
				  <li data-type="console" class="nav-item">
					<a class="nav-item nav-link" href="#">콘솔</a>
				  </li>
				  <li data-type="render" class="nav-item">
					<a class="nav-item nav-link" href="#">프리뷰</a>
				  </li>
				  <li data-type="board" class="nav-item">
					<a class="nav-item nav-link" href="/board/{{$editorType}}" target="board">게시판</a>
				  </li>
				</ul>
				@endif
			</span>
		</div>
        <style>

            .code-view-render {
                height: 100%;
            }

            .render-iframe {
                width: 100%;
                height: 100%;
                border: 2px solid gold;
            }

            .code-view-board {
                height: 100%;
            }

            .board-iframe {
                width: 100%;
                height: 100%;
            }

            html, body, div#app, .code-container, .code-view-source {
                height: 100%;
            }

            .code-views {
                height: 80%;
            }

            body {
                overflow: hidden;
            }

			.compile-nav a{
				color : black;
			}

        </style>
        <div class="code-views">
            <div class="code-view-source">
                <form method="post" action="/code/save">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div><input type="text" class="form-control" placeholder="글 제목" value="{{$source->title ?? ''}}"
                                name="title" maxlength="50">
                    </div>
                    <textarea id="text" class="form-control" placeholder="글 내용" name="body"
                              style="display:none; overflow:scroll;"></textarea>

						@if(isset($source->body))
						<div style="background-color: yellow; width: 100%; font-size: 1.5em; height: 1000px;" class='source-viewer'>

						{{$source->body}}

						</div>
						@endif
                    <div id="source" ></div>
                    @if(Auth::check())
					<nav class="navbar fixed-bottom">
					<div class="play-btns">
                        <button type="button" class="btn btn-success btn-lg" onclick="execute()">실행</button>
                        <button type="button" class="btn btn-success btn-lg" onclick="format()">정렬</button>
                        <button type="button" class="btn btn-danger btn-lg"
                                onclick="myCodeMirrorDoc.undo();">뒤로가기
                        </button>
                        <button type="button" class=" btn btn-danger btn-lg"
                                onclick="myCodeMirrorDoc.redo();">앞으로가기
                        </button>
                        <input onclick="createHTMLDocument()" type="button"
                               class=" btn btn-info btn-lg" value="저장">
                        <!--<a href="#" id="link" download="Source.html"></a>-->
                        <button type="button"
                                class="btn btn-info" id="link" style="display:none"><a href="#" id="link_a"
                                                                                       download="file.{{$editorType}}">pc저장</a>
                        </button>
                        <button type="submit"
                                class="btn btn-info" id="link2" style="display:none" onclick="saveText()">
                            게시판저장
                        </button>
                    </div>
                    </nav>
                    @endif
                </form>

            </div>
            <div class="code-view-console">
                <pre id="rs"></pre>
                <button type="button" class="btn btn-primary btn-lg btn-block"
                        onclick="clearConsole();">콘솔 리셋
                </button>
            </div>
            <div class="code-view-render">
                <iframe name="render" class="render-iframe"></iframe>
            </div>
            <div class="code-view-board">
                <iframe name="board" class="board-iframe"></iframe>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <link rel='stylesheet prefetch'
          href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
    <script>

        var sourceId = '';
        var editorType = '{{$editorType}}';
        var langCode = editorType;
        var codeMirrorMode = '';
        var initSource = '';
        var type = '';

        if (langCode == 'html') {
            codeMirrorMode = "text/" + langCode;
            initSource += '<scr' + 'ipt src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js">';
            initSource += '</sc' + 'ript>';
            initSource += '\n<scr' + 'ipt src="https://cdnjs.cloudflare.com/ajax/libs/phaser/2.6.2/phaser.min.js">';
            initSource += '</sc' + 'ript>';
            initSource += '\n<scr' + 'ipt>';
            initSource += '\n\t';
            initSource += '// 여기에 자바스크립트 코드를 작성하세요.';
            initSource += '\n\tconsole.log("안녕!");\n</sc' + 'ript>';
            initSource += '\n\n<!-- 여기에 HTML 코드를 넣으세요. -->\n<div></div>';
        } else if (langCode == 'java8') {
            codeMirrorMode = 'text/x-java';
            initSource = 'class Main {\n\tpublic static void main(String[] args) {\n\t\tSystem.out.println("하이");\n\t}\n}';
        } else if (langCode == 'kotlin') {
            codeMirrorMode = 'text/x-kotlin';
            initSource = 'fun main(args: Array<String>) {\n\tprintln("Hello, World!")\n}';
        } else if (langCode == '') {
            initSource += '소스탭에서 editortype을 선택하세요.';
        }

        function createHTMLDocument() {

            var blob = new Blob(
                ['<!doctype html>', '<html><head><title>Blob Example</title><body>', myCodeMirror.getValue(), '</body></html>'],
                {type: type}
            );

            var url = URL.createObjectURL(blob);
            var link = document.getElementById('link');
            var link_a = document.getElementById('link_a');
            var link2 = document.getElementById('link2');

            link.style.display = "inline";
            link_a.setAttribute('href', url);
            link2.style.display = "inline";
        };
    </script>


    <style>
        body, pre, div {
            padding: 0;
            margin: 0;
        }

        pre#rs {
            font-family: Consolas, monospace;
            border: 5px dotted gray;
            min-height: 50px;
            background-color: black;
            color: white;
            padding: 10px;
            margin-top: 7px;
        }

        #source {
            margin-bottom: 5px;
        }

    </style>

    <link rel='stylesheet prefetch'
          href='//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>

    <!-- 에디터 코어 -->
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/codemirror.min.js'></script>
    <link rel='stylesheet prefetch'
          href='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/codemirror.min.css'>

    <!-- 에디터 테마 -->
    <!--<link rel='stylesheet prefetch'
        href='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/theme/ambiance.min.css'>-->
    <link rel='stylesheet prefetch' href='/theme/ambiance.css'>

    <!-- 에디터 힌트 -->
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/hint/show-hint.js'></script>
    <link rel='stylesheet prefetch'
          href='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/hint/show-hint.css'>
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/hint/html-hint.js'></script>
    <!-- 에디터 모드(CLIKE => 자바) -->
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/mode/clike/clike.min.js'></script>

    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/mode/css/css.min.js"></script>
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/mode/xml/xml.min.js"></script>
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/mode/javascript/javascript.min.js"></script>
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/mode/htmlmixed/htmlmixed.min.js"></script>

    <!-- 에디터 브라켓 매치 -->
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/edit/matchbrackets.min.js'></script>
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/edit/matchtags.min.js'></script>

    <!-- 에디터 풀스크린 -->
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/display/fullscreen.min.js'></script>
    <!-- 에디터 폴딩 -->
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/fold/foldcode.min.js'></script>
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/fold/xml-fold.min.js'></script>
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/fold/brace-fold.min.js'></script>
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/fold/comment-fold.min.js'></script>
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/fold/foldgutter.min.js'></script>
    <link rel='stylesheet prefetch'
          href='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/fold/foldgutter.min.css'>
    <script
            src='//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/fold/indent-fold.min.js'></script>

    <!-- 에디터 포매팅 -->
    <script src="//codemirror.net/2/lib/util/formatting.js"></script>

    <script
            src="//cdnjs.cloudflare.com/ajax/libs/codemirror/5.34.0/addon/selection/active-line.min.js"></script>

    <script>
        $(function () {
            if (sourceId) {
                loadSource(sourceId);
            }
        });

        var format = function () {

            var oldFrom = myCodeMirror.getCursor(true);
            var oldTo = myCodeMirror.getCursor(false);

            var range = getSelectedRange();
            myCodeMirror.autoFormatRange(range.from, range.to);

            myCodeMirror.setSelection(oldFrom, oldTo);
        };

        function getSelectedRange() {
            var start = myCodeMirror.firstLine(), end = myCodeMirror
                .lastLine();

            myCodeMirror.setSelection(CodeMirror.Pos(start, 0), CodeMirror
                .Pos(end, 0));

            return {
                from: myCodeMirror.getCursor(true),
                to: myCodeMirror.getCursor(false)
            };
        };

        var loadSource = function (sourceId) {
            $.get('/code/get/' + sourceId, {}, function (data) {
                myCodeMirror.setValue(data.body);
                startBody = data.startBody;

                if (data.history) {
                    data.history = JSON.parse(data.history);

                    myCodeMirrorDoc.setHistory(data.history);

                    if (isPlayMode) {
                        $('.msg-modal').removeClass('hide');
                        setTimeout(function () {
                            $('.msg-modal').addClass('hide');
                        }, 3000);

                        var myCodeMirrorDocSize = myCodeMirrorDoc.height;

                        for (var i = 0; i < myCodeMirrorDocSize; i++) {
                            myCodeMirrorDoc.undo();
                        }
                    }
                }
            }, 'json');
        };

        var myCodeMirror;
        var myCodeMirrorDoc;
        var defaultSource2 = '';
        if (initSource) {
            defaultSource2 = initSource;
        }

        var startBody = defaultSource2;

        var defaultSource = defaultSource2;

        $(function () {
            keyboardJS.bind('alt + 0', function (e) {
                clearConsole();
            });

            keyboardJS.bind('alt + enter', function (e) {
                execute();

                e.stopPropagation();
                e.preventDefault();
            });

            keyboardJS.bind('ctrl + enter', function (e) {
                execute();
            });

            keyboardJS.bind('ctrl + 1', function (e) {
                $('.code-tabs ul li').eq(0).click();
                myCodeMirror.focus();

                e.stopPropagation();
                e.preventDefault();
            });

            keyboardJS.bind('alt + 1', function (e) {
                $('.code-tabs ul li').eq(0).click();
                myCodeMirror.focus();
            });

            keyboardJS.bind('alt + ctrl + 1', function (e) {
                $('.code-tabs ul li').eq(0).click();
                myCodeMirror.focus();
            });

            keyboardJS.bind('ctrl + 2', function (e) {
                $('.code-tabs ul li').eq(1).click();
                myCodeMirror.focus();

                e.stopPropagation();
                e.preventDefault();
            });

            keyboardJS.bind('alt + 2', function (e) {
                $('.code-tabs ul li').eq(1).click();
            });

            keyboardJS.bind('alt + ctrl + 2', function (e) {
                $('.code-tabs ul li').eq(1).click();
                myCodeMirror.focus();
            });

            keyboardJS.bind('ctrl + 3', function (e) {
                $('.code-tabs ul li').eq(2).click();
                myCodeMirror.focus();

                e.stopPropagation();
                e.preventDefault();
            });

            keyboardJS.bind('alt + 3', function (e) {
                $('.code-tabs ul li').eq(2).click();
            });

            keyboardJS.bind('alt + ctrl + 3', function (e) {
                $('.code-tabs ul li').eq(2).click();
                myCodeMirror.focus();
            });

            var intentNo = 4;

            if (location.href.indexOf('&intentNo=2') != -1) {
                intentNo = 2;
            }

            myCodeMirror = CodeMirror(document.getElementById('source'), {
                // 라인 보이기
                lineNumbers: true,
                undoDepth: 9999999,
                matchBrackets: true,
                matchTags: true,
                value: defaultSource,
                mode: codeMirrorMode,
                theme: 'ambiance',
                indentUnit: intentNo,
                tabSize: intentNo,
                indentWithTabs: true,
                lineWrapping: true,
                foldGutter: true,
                extraKeys: {
                    "Ctrl-Q": function (cm) {
                        cm.foldCode(cm.getCursor());
                    },
                    "Ctrl-Space": "autocomplete"
                },
                gutters: ["CodeMirror-linesourceIds",
                    "CodeMirror-foldgutter"],
                styleActiveLine: true,
            });

            myCodeMirrorDoc = myCodeMirror.getDoc();
        });

        var addExecuteLog = function () {
            var url = location.pathname;

            $.post('/code/saveExecuteLog', {
                'url': url
            }, function (data) {

            }, 'json');
        };

        var compileExecute = function () {
            addExecuteLog();

            $('#rs').empty().append('로딩...');
            $
                .post(
                    '/' + langCode + '/execute',
                    {
                        body: myCodeMirror.getValue(),
                    },
                    function (data) {
                        if (data.execute.resultCode == 1) {
                            $('#rs')
                                .empty()
                                .append(
                                    data.compile.output
                                        .trim() != '' ? data.compile.output
                                            .trim()
                                        : data.execute.output
                                            .trim());
                        } else {
                            $('#rs').empty().append(
                                data.execute.output);
                        }
                    }, 'json');
        };

        var htmlExecute = function () {
            addExecuteLog();

            var form = document.htmlRenderForm;

            form.body.value = myCodeMirror.getValue();
            form.submit();
        };

        var execute = null;

        if (langCode == 'html') {
            execute = htmlExecute;
        } else {
            execute = compileExecute;
        }

        var showSource = function () {
            var form = document.sourceForm;

            form.body.value = myCodeMirror.getValue();
            form.submit();
        }

        var save = function () {
            if (!confirm('정말 저장하시겠습니까?')) {
                return false;
            }

            var url = '/code/save';

            if (sourceId) {
                url += '/' + sourceId;
            }

            var history = '';

            if (isAdmin) {
                history = JSON.stringify(myCodeMirrorDoc.getHistory());
            }

            $.post(url, {
                body: myCodeMirror.getValue(),
                startBody: startBody,
                history: history,
                langCode: langCode
            }, function (data) {
                location.href = '/' + langCode + '/' + data.id;
            }, 'json');
        };

        var deleteSource = function () {
            if (!confirm('정말 삭제하시겠습니까?')) {
                return false;
            }

            var url = '/code/delete';

            if (sourceId) {
                url += '/' + sourceId;
            }

            $.post(url, {
                body: myCodeMirror.getValue(),
            }, function (data) {
                location.href = '/' + langCode;
            }, 'json');
        };

        var fork = function () {
            if (!confirm('정말 포크하시겠습니까?')) {
                return false;
            }

            var url = '/code/fork';

            if (sourceId) {
                url += '/' + sourceId;
            }

            $.post(url, {
                body: myCodeMirror.getValue(),
            }, function (data) {
                location.href = '/' + langCode + '/' + data.id;
            }, 'json');
        };
    </script>

    <style>

        @font-face {
            font-family: dyslexie;
            src: url("/theme/dyslexie.woff") format("opentype");
        }

        form {
            width: 100%;
            height: 100%;
        }

        ul > li {
            cursor: pointer;
        }

        #source, #source > .CodeMirror-wrap {
            height: 100%;
        }

        .code-view-console, #rs {
            height: 100%;
        }

        #source{
            height: 550px;
            /*overflow:scroll;*/
        }

        #source .cm-comment {
            color: white !important;
            font-weight: bold;
        }

        #source pre.CodeMirror-line {
            padding-left: 20px;
        }
    </style>
    <form name="htmlRenderForm" action="/code/render/html" target="render" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="body">
    </form>

    <script>
        $(document).ready(function(){

            $("#source *").css('fontFamily', "dyslexie");
            $("#source *").css('font-size', "20px");


            var $fontChange = $(".font-change");
            var $overlayChange = $(".overlay-change");
            var $fontSizeChange = $(".font-size-change");

            $fontChange.find('li').on("click",function(){

                var type = $(this).data("font");
                var css = {};

                console.log(type);

                switch (type) {
                    case "arial":
                        css.fontFamily = "Arial, Helvetica, sans-serif";
                        break;
                    case "times":
                        css.fontFamily = "\"Times New Roman\", Times, serif";
                        break;
                    case "andale":
                        css.fontFamily = "Andale Mono, AndaleMono, monospace";
                        break;
                    case "dyslexie":
                        css.fontFamily = "dyslexie";
                        break;
                    default:
                        console.error("wrong type")
                }

                $("#source *").css(css);

            });

            $overlayChange.find("li").on('click', function() {
                var overlay = $(this).data("overlay");
                var css = {};

                switch (overlay) {
                    case "light-yellow":
                        css.backgroundColor = "#fff9bc";
                        break;
                    case "light-green":
                        css.backgroundColor = "#ddefbd";
                        break;
                    case "dark-yellow":
                        css.backgroundColor = "#fff693";
                        break;
                    case "dark-green":
                        css.backgroundColor = "#adcc78";
                        break;
                    default:
                        console.error("wrong type")
                }

                $("#source *").css(css);
            })

            $fontSizeChange.on('click', 'li', function () {
                var size = parseInt($(this).data('size'));
                var source = $("#source *");
                var currentSize = parseInt(source.css('font-size').replace(/[^0-9]*/g, ''));

                currentSize += size;

                source.css({
                    fontSize: currentSize + "px"
                });
            })
        })

    </script>
</body>
</html>
