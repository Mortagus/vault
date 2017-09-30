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

<div id="toolbar">
    <button id="remove" class="btn btn-danger" disabled>
        <i class="glyphicon glyphicon-remove"></i> Delete
    </button>
</div>
<table id="movieCollection"
       data-toolbar="#toolbar"
       data-search="true"
       data-show-refresh="true"
       data-show-toggle="true"
       data-show-columns="true"
       data-show-export="true"
       data-detail-view="true"
       data-detail-formatter="detailFormatter"
       data-minimum-count-columns="2"
       data-show-pagination-switch="true"
       data-pagination="true"
       data-id-field="id"
       data-page-list="[10, 25, 50, 100, ALL]"
       data-show-footer="false"
       data-side-pagination="server"
       data-url="/examples/bootstrap_table/data"
       data-response-handler="responseHandler">
</table>
