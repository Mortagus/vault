<h1>Movie Selector - Listing</h1>
<hr>

@if ($success === true)
    <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> The given path is valid !
    </div>
@endif

@if (!empty($errors))
    <div class="alert alert-danger fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>FAIL !</strong> The given path is <strong>NOT</strong> valid !
        <ul>
            @foreach ($errors as $err_msg)
                <li>{{ $err_msg }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="form-inline" action="{{ route('refresh-movies') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="folder-path">Folder Path:</label>
        <input class="form-control" type="text" id="folder-path" name="folderPath" placeholder="C:/..."
               value="{{ $selectedFolderPath }}">
    </div>
    <button type="submit" class="btn btn-default">Read</button>
</form>
<hr>

@if (!empty($movieCollection))
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>File Name</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($movieCollection as $index => $fileName)
            <tr>
                <td>
                    {{ ($index + 1) . '. ' . print_r($fileName, true) }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif