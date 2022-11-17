@extends('layouts.app')

@section('page-title', __('Materi'))
@section('page-heading', __('Materi Pra-Sejarah'))
@section('styles')
    <style>
      .img-fluid {
        text-align: center;
        /* max-height:100%; */
        max-width: 100%; !important
      }

      .item-button-icon {
        position: fixed;
        margin: auto;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        max-width: 100%;
        max-width: 100%;
      }

      .item {
        /* position: fixed; */
        margin: auto;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        max-width: 100%;
        max-width: 100%;
      }
      .card-content {
        text-align: center;
      }
    </style>
@endsection
@section('content')
    @include('partials.messages')
<section id="content-types">
    <div class="card-columns">
    @if(count($materis))
    @foreach($materis as $no=>$d)
        <div class="card position-static">
          @if($d->image != null )
          <img class="card-img-top img-fluid" src="{{ $d->getPhoto() }}">
          @else
          <img class="card-img-top img-fluid" src="{{ asset('uploads/konten/blank.png') }}">
          @endif
          <div class="card-body">
            <h4 class="card-title">{{$d->nama_materi}}</h4>
            <p class="card-text">{{$d->deskripsi}}</p>
            <div class="row text-center">
              <div class="col-xs-3 text-center item">
                urutan :
                <h1 class="font-weight-bolder">{{ $d->order ?? 0 }}</h1>
              </div>
              <div class="col-xs-3 text-center item">
                BAB :
                <h1 class="font-weight-bolder">{{ $d->bab ?? '-' }}</h1>
              </div>
              <div class="col-3 item-button-icon">
                <a href="{{ url('materi/edit/'.$d->id) }}" class="btn btn-icon"
                  title="@lang('Edit')" data-toggle="tooltip" data-placement="top">
                      <i class="feather icon-edit"></i>
                </a>
                <span class="btn btn-icon" data-toggle="modal" data-target="#delmateri{{$d->id}}">
                  <a title="@lang('Hapus')" data-toggle="tooltip" data-placement="top">
                    <i class="feather icon-trash"></i>
                  </a>
                </span>
              </div>
              <div class="col-xs-3 item">
                <a href="{{ url('materi/detail/'.$d->id) }}" class="btn btn-outline-primary waves-effect pull-right"> Lihat Detail</a>
              </div>
            </div>
          </div>
      </div>
      <!-- delete option -->
      <div class="modal fade text-left" id="delmateri{{$d->id}}" tabindex="-1" role="dialog"
          aria-labelledby="myModalLabel17" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title" id="myModalLabel17">Hapus Materi</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <p>Yakin akan menghapus materi ini?</p>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                          <a class="btn btn-danger" href="{{ url('materi/delete/'.$d->id) }}">HAPUS</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    @endforeach
    @else
    <div class="col-xl-4 col-md-6">
        <div class="card">
          <div class="card-header mb-1">
            <h4 class="card-title">No Record Found</h4>
          </div>
        </div>
    </div>
    @endif
</section>

@stop

@section('scripts')

@stop
