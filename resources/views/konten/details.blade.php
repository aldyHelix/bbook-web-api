@extends('layouts.app')

@section('page-title', __('Konten'))
@section('page-heading', __('Konten '.$konten->kontenMateri->nama_materi))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">@lang('Konten')</a>
    </li>
@stop

@section('content')

@include('partials.messages')
<section id="basic-media-object">
    <div class="row match-height">
      <div class="col-xl-6 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{$konten->kontenMateri->nama_materi}}</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <p>
                        {{$konten->kontenMateri->fill_deskripsi}}
                    </p>
                    <div class="media-list">
                        <div class="media">
                            <a class="media-left">
                                <img src="{{ $konten->getHeader() }}" alt="No Image"
                                height="64" width="64" />
                            </a>
                            <a class="media-left">
                                <img src="{{ $konten->getGambar1() }}" alt="No Image"
                                height="64" width="64" />
                            </a>
                            <a class="media-left">
                                <img src="{{ $konten->getGambar2() }}" alt="No Image"
                                height="64" width="64" />
                            </a>
                            <a class="media-left">
                                <img src="{{ $konten->getGambar3() }}" alt="No Image"
                                height="64" width="64" />
                            </a>
                            <a class="media-left">
                                <img src="{{ $konten->getGambar4() }}" alt="No Image"
                                height="64" width="64" />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>

    </div>
</section>
<section id="basic-media-object">
    <div class="row match-height">
        <div class="col-xl-12 col-lg-12">
            <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{$konten->kontenMateri->nama_materi}} Video Content</h4>
            </div>
            <div class="card-content">
                <div class="card-body">

                <div class="media-list">
                    <div class="media">
                        <div class="video-player" id="plyr-video-player">
                            <video width="640" controls>
                                <source src="{{$konten->video_stream}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@stop
