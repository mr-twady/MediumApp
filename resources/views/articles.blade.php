@extends('layouts.master')

@section('content')

<!-- Begin Site Title
================================================== -->
<div class="container">
	<div class="mainheading">
		<h1 class="sitetitle">MediumApp</h1>
		<p class="lead">
			Built by Dunsin Olubobokun, for Mind Valley Application
		</p>
	</div>
<!-- End Site Title
================================================== -->

	<!-- Begin List Posts
	================================================== -->
	<section class="recent-posts">
		<div class="section-title">
			<h2><span>All Stories</span></h2>
		</div>
		<div class="card-columns listrecent">

			<articles-component :base-Url="'{{url('/')}}'"></articles-component>

		</div>
	</section>
	<!-- End List Posts
	================================================== -->

	@include('layouts.footer')

</div>
<!-- /.container -->

@stop
