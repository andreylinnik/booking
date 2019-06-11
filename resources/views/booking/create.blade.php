@extends('layouts.app')
@section('content')
    <h1>Create a cabinet account</h1>
        <form autocomplete="off" enctype="multipart/form-data" method="post" action="">
            <div class="form-group">
                <label class="mb-2">Title:</label>
                <input type="text" id="text" class="form-control" value="" class="form-control" name="data[mobile]">
            </div>
            <div class="form-group">
                <label class="mb-2">Start time:</label>
                <input type="text" id="text" class="form-control" value="" class="form-control" name="data[mobile]">
            </div>
            <div class="form-group">
                <label class="mb-2">End time:</label>
                <input type="text" id="text" class="form-control" value="" class="form-control" name="data[mobile]">
            </div>
            <button class="btn btn-info">To book</button>
        </form>
    </div>
@endsection
