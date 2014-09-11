@extends('layouts.master')

@section('content')

	<h2>Hello, {{ Auth::user()->username }}</h2>

@stop