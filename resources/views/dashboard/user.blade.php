@extends('layouts.app-user')

@section('page-title', __('Dashboard'))

@section('content')
    @include('partials.messages')
<div class="content-body">
    Selamat Datang di BBOOK
    <br>
    {{Auth::user()->name}}
</div>
@stop

@section('scripts')

@stop
