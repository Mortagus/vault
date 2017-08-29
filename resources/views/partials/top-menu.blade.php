@section('top-menu')
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Benji's First Laravel Project</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('flex-index') }}">CSS: Flex</a></li>
                    <li><a href="{{ route('bootstrap_ex-index') }}">Css: Bootstrap</a></li>
                    <li><a href="{{ route('jquery_ex-index') }}">Js: jQuery</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>
@endsection