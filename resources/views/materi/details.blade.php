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
            <small>{{$materi->deskripsi}}</small>
            <hr>
            <p style="text-align: justify;">{{ $materi->fill_deskripsi}}</p>
            <div class="mt-1">
              <h6 class="mb-0">Dibuat :</h6>
              <p>{{ date_format(date_create($materi->created_at), "d-m-Y") }}</p>
            </div>
            <div class="mt-1">
              <h6 class="mb-0">QR:</h6>
              <small>QR dapat ditempatkan di Buku Cetak untuk di scan.</small>
              {!! QR::size(200)->generate($materi->qr) !!}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-start align-items-center mb-1">
              <div class="avatar mr-1">
                <img src="{{ $materi->gambar_materi != null ? $materi->getPhoto() : defaultPhoto() }}" alt="avtar img holder" height="45" width="45">
              </div>
              <div class="user-page-info">
                <h6 class="mb-0">{{ $materi->nama_materi }}</h6>
              </div>
            </div>
           <iframe src="{{$materi->link_materi}}" class="w-100 height-250"></iframe>
          </div>
        </div>
        @if(count($materi->kontenMateri) != 0)
        @foreach($materi->kontenMateri as $dt)
            <!-- Konten Lists -->
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3 mr-1">
                            <img height="100" width="auto" src="{{$dt->gambar_konten != null ? $dt->getPhoto() : defaultPhoto()}}">
                        </div>
                        <div class="col-sm-7">
                            {{$dt->description}}
                        </div>
                        <div class="col-sm-1">
                            <a data-toggle="modal" data-target="#editkonten{{$dt->id}}"><i class="feather icon-edit cursor-pointer" href="#"></i></a>
                            <hr>
                            <a class="danger" href="{{ url('konten/delete/'.$dt->id) }}"><i class="feather icon-trash cursor-pointer"></i></a>
                       </div>
                        <div class="modal fade text-left" id="editkonten{{$dt->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel17" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myModalLabel17">Tambah Konten</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['url' => 'konten/update/'.$dt->id , 'method' => 'PUT', 'id' => 'form', 'enctype'=>'multipart/form-data']) !!}
                                        <input type="hidden" value="{{$materi->id}}" name="dt[materi_id]">
                                        <div class="form-group text-center">
                                            <img height="100" width="auto" src="{{$dt->gambar_konten != null ? $dt->getPhoto() : defaultPhoto()}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="basicInputFile">Gambar Konten</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="gambar_konten">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Deskripsi</label>
                                            <textarea type="text" class="form-control input-solid" placeholder="Deskripsi" name="desc" value="{{$dt->description}}">{{$dt->description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Konten -->
        @endforeach
        @else
        <div class="card">
            <div class="card-header mb-1">
                <h4 class="card-title">No Konten Record Found</h4>
            </div>
        </div>
        @endif
      </div>
      <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-outline-primary mr-1 mb-1 block" data-toggle="modal" data-target="#addkonten"><i class="feather icon-plus" ></i> Add Konten</button>
                <button type="button" class="btn btn-outline-primary mr-1 mb-1 block" data-toggle="modal" data-target="#addquiz"><i class="feather icon-plus"></i> Add Quiz</button>
            </div>
        </div>
        @if(count($materi->quizMateri) != 0)
        @foreach($materi->quizMateri as $dt)
            <!-- Konten Lists -->
            <div class="card">
                <div class="card-body">
                    <p>{{$dt->question}}</p>
                    <ul class="list-group">
                        @if(count($dt->hasOption) != 0)
                        @foreach($dt->hasOption as $opt)
                            <li class="list-group-item d-flex justify-content-between align-items-center {{$opt->is_answer ? 'active' : ''}}"><span>{{$opt->option}}. {{$opt->description_option}}</span>
                                <span class="badge ">
                                <a data-toggle="modal" data-target="#delopt{{$dt->id}}"><i class="feather icon-edit cursor-pointer" href="#"></i></a>
                                <a data-toggle="modal" data-target="#editopt{{$dt->id}}"><i class="feather icon-trash cursor-pointer" href="#"></i></a>
                                </span>
                            </li>
                        @endforeach
                        @else
                        <li class="list-group-item">No Option Found</li>
                        @endif
                    </ul>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12 mr-1 text-center">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#addopt{{$dt->id}}"><i class="feather icon-plus"></i></button>
                                <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#editquiz{{$dt->id}}"><i class="feather icon-edit"></i></button>
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delquiz{{$dt->id}}"><i class="feather icon-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<!-- Modal edit quiz -->
<div class="modal fade text-left" id="editquiz{{$dt->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel17">Tambah Quiz</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form>
           <input type="hidden" value="{{$materi->id}} name=dt[materi_id]">
            <div class="form-group">
                <label for="basicInputFile">Gambar Quiz</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="header">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Question</label>
                <textarea type="text" class="form-control input-solid" placeholder="Deskripsi full" name="dt[description]"></textarea>
            </div>
            <div class="form-group">
                <label for="email">Answer</label>
                <textarea type="text" class="form-control input-solid" placeholder="Deskripsi full" name="dt[description]"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
        </div>
        </form>
        </div>
    </div>
</div>
            <!-- End Konten -->
        @endforeach
        @else
        <div class="card">
            <div class="card-header mb-1">
                <h4 class="card-title">No Quiz Record Found</h4>
            </div>
        </div>
        @endif
      </div>
    </div>
<div class="modal fade text-left" id="addkonten" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Tambah Konten</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'konten/insert', 'id' => 'form', 'enctype'=>'multipart/form-data']) !!}
                <input type="hidden" value="{{$materi->id}}" name="dt[materi_id]">
                <div class="form-group">
                    <label for="basicInputFile">Gambar Konten</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="gambar_konten">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Deskripsi</label>
                    <textarea type="text" class="form-control input-solid" placeholder="Deskripsi" name="desc"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade text-left" id="addquiz" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel17" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel17">Tambah Quiz</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form>
           <input type="hidden" value="{{$materi->id}} name=dt[materi_id]">
            <div class="form-group">
                <label for="basicInputFile">Gambar Quiz</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="inputGroupFile01" name="header">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Question</label>
                <textarea type="text" class="form-control input-solid" placeholder="Deskripsi full" name="dt[description]"></textarea>
            </div>
            <div class="form-group">
                <label for="email">Answer</label>
                <textarea type="text" class="form-control input-solid" placeholder="Deskripsi full" name="dt[description]"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
        </div>
        </form>
        </div>
    </div>
</div>
@stop
