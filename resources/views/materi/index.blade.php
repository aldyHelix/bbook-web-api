@extends('layouts.app')

@section('page-title', __('Materi'))
@section('page-heading', __('Materi Pra-Sejarah'))

@section('content')
    @include('partials.messages')
<section id="content-types">
    <div class="row match-height">
    @if(count($materis))
    @foreach($materis as $no=>$d)
      <div class="col-xl-4 col-md-6">
        <div class="card">
          <div class="card-header mb-1">
            <h4 class="card-title">{{$d->nama_materi}}</h4>
            <div>
                <a href="{{ url('materi/edit/'.$d->id) }}" class="btn btn-icon"
                    title="@lang('Edit')" data-toggle="tooltip" data-placement="top">
                        <i class="feather icon-edit"></i>
                </a>
                <span class="btn btn-icon" data-toggle="modal" data-target="#delmateri{{$d->id}}"><a title="@lang('Hapus')" data-toggle="tooltip" data-placement="top"><i class="feather icon-trash"></i></a></span>
            </div>
          </div>
          <div class="card-content">
            @if($d->image != null )
            <img class="img-fluid" src="{{ $d->getPhoto() }}">
            @else
            <img class="img-fluid" src="{{ asset('uploads/konten/blank.png') }}">
            @endif
            <div class="card-body">
              <p class="card-text">{{$d->deskripsi}}</p>
            </div>
          </div>
          <div class="card-footer text-muted">
            <span class="float-left">Updated {{ Helpers::time_elapsed_string($d->updated_at)}}</span>
            <span class="float-right">
              <a href="{{ url('materi/detail/'.$d->id) }}" class="card-link">More Details <i class="fa fa-angle-right"></i></a>
            </span>
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
