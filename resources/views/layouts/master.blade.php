<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{url('assets/img/favicon.ico')}}">
<title>@yield('title')</title>
<!-- Bootstrap core CSS -->
<link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- Fonts -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="{{url('assets/css/mediumish.css')}}" rel="stylesheet">
</head>
<body>

    <div id="app">

        @include('layouts.top-navigation')

        @yield('content')

    </div>

<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{url('assets/js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/ie10-viewport-bug-workaround.js')}}"></script>
<script type="text/javascript" src="{{mix('js/app.js')}}"></script>
@stack('scripts')
</body>
</html>
