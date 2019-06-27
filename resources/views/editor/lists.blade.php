<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Created</th>
        </tr>
        </thead>
        <tbody>

        @if(Auth::check() !== false)


            @if(count($sources) > 0)

                @foreach($sources as $source)
                    <tr>
                        <th scope="row">{{$source->id}}</th>
                        <td><a href="/{{$editorType}}/{{$source->id}}">{{$source->title}}</a></td>
                        <td>{{$source->created_at}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">게시물이 존재하지 않습니다.</td>
                </tr>
            @endif

        @else
            <tr>
                <td colspan="3">게시물을 확인하려면 로그인을 해주세요</td>
            </tr>
        @endif

        </tbody>
    </table>
    <button onclick="location.href='/editpage2/html'" type="button" class="btn btn-outline-dark">메인페이지 이동</button>
</div>
