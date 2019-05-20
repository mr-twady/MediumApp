@extends('layouts.master')

@section('content')

    <single-article-component :base-Url="'{{url('/')}}'" :post-id="{{$postId}}"></single-article-component>

@stop
