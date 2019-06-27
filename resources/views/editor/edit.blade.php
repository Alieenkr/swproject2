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

<div class="errors">
    @if($errors->any() === false)
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
</div>
<div class="container">
    <form action="/code/save/{{@$source->id}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="title" name="title"
                   value="{{@$source->title}}">
        </div>
        <div class="form-group">
            <label for="selectBox">Language</label>
            <select class="form-control" id="selectBox" name="langCode">
                <option value="java8">java8</option>
                <option value="html">html</option>
            </select>
        </div>
        <div class="form-group">
            <label for="textareaBox">Code</label>
            <textarea class="form-control" id="textareaBox" rows="10" name="body">{{@$source->body}}</textarea>
        </div>
        <div>
            <input type="submit" value="Save" class="btn btn-primary">
            <input type="button" value="Back" class="btn btn-warning" onclick="location.href='/board/java8'">
        </div>
    </form>
</div>
