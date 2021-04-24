@extends('layouts.app')

@section('page-title', __('Materi Detail'))
@section('page-heading', 'Materi Details '.$materi->nama_materi)
@section('mystyle')
{{-- Page Css files --}}
<link rel="stylesheet" href="{{ asset('mix-assets/css/pages/users.css') }}">
@endsection
@section('breadcrumbs')
<li class="breadcrumb-item">
    <a href="{{ url('/materi') }}">@lang('Materi')</a>
</li>
<li class="breadcrumb-item active">Details</li>
@stop

@section('content')
@include('partials.messages')
<div class="row">
    <div class="col-lg-3 col-12">
        <div class="card">
            <div class="card-header">
                <h4>Materi</h4>
            </div>
            <div class="card-body">
                <small>{{$materi->header}}</small>
                <hr>
                <div class="mt-1">
                    <h6 class="mb-0">Dibuat :</h6>
                    <p>{{ date_format(date_create($materi->created_at), "d-m-Y") }}</p>
                </div>
                <div class="mt-1">
                    <h6 class="mb-0">QR:</h6>
                    <small>QR dapat ditempatkan di Buku Cetak untuk di scan.</small>
                    {!! QR::size(200)->generate($materi->qr_code) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-start align-items-center mb-1">
                    <div class="avatar mr-1">
                        <img src="{{ $materi->image != null ? $materi->getPhoto() : defaultPhoto() }}"
                            alt="avtar img holder" height="45" width="45">
                    </div>
                    <div class="user-page-info">
                        <h6 class="mb-0">{{ $materi->nama_materi }}</h6>
                    </div>
                </div>
                {{-- <iframe src="{{$materi->video_stream}}" class="w-100 height-250"></iframe> --}}
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-outline-primary mr-1 mb-1 block" data-toggle="modal"
                    data-target="#addquiz"><i class="feather icon-plus"></i> Add Quiz</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-12">
        <div class="card">
            <div class="card-header">
              <h4 class="card-title">Konten Materi</h4>
              <button type="button" class="btn btn-outline-primary mr-1 mb-1" data-toggle="modal"
                    data-target="#addquiz"></i> Save</button>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12">
                    <div id="full-wrapper">
                      <div id="full-container">
                        <div class="editor">
                          {{$materi->description}}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@stop
@section('mystyle')

@endsection