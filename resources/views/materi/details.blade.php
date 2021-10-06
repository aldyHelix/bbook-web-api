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
<li class="breadcrumb-item active">Detail</li>
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
                {{-- <div class="mt-1">
                    <h6 class="mb-0">QR:</h6>
                    <small>QR dapat ditempatkan di Buku Cetak untuk di scan.</small>
                    {!! QR::size(200)->generate($materi->qr_code) !!}
                </div> --}}
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-start align-items-center mb-1">
                    <div class="avatar mr-1">
                        <img src="{{ $materi->image != null ? $materi->getPhoto() : asset('uploads/konten/blank.png') }}"
                            alt="avtar img holder" height="45" width="45">
                    </div>
                    <div class="user-page-info">
                        <h6 class="mb-0">{{ $materi->nama_materi }}</h6>
                    </div>
                </div>
                {{-- <iframe src="" class="w-100 height-250"></iframe> --}}
                {!!$materi->getYoutubeID() ? '<iframe src="//www.youtube.com/embed/'.$materi->getYoutubeID().'" class="w-100 height-250"></iframe>' : 'Video tidak ditemukan'!!}
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-outline-primary mr-1 mb-1 block" data-toggle="modal"
                    data-target="#addvideo"><i class="feather icon-plus"></i> Tambah Video</button>
            </div>
        </div>
        @if(count($materi->materiVideo) != 0)
        @foreach($materi->materiVideo as $dt)
        <div class="card">
            <div class="card-body">
                <p>{{$dt->order}} | {{$dt->video_name}}</p>
                <hr>
                {!!$dt->getYoutubeID() ? '<iframe src="//www.youtube.com/embed/'.$materi->getYoutubeID().'" class="w-100 height-250"></iframe>' : 'Video tidak ditemukan'!!}
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-12 mr-1 text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#editvideo{{$dt->id}}"><i class="feather icon-edit"></i></button>
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delvideo{{$dt->id}}"><i class="feather icon-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade text-left" id="editvideo{{$dt->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel17" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel17">Edit Video</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => 'materi-video/update/'.$dt->id , 'id' => 'form', 'method'=>'put']) !!}
                            <input type="hidden" value="{{$dt->materi_id}}" name=dt[materi_id]">
                            <div class="form-group">
                                <label for="email">Nama video</label>
                                <input type="text" class="form-control input-solid" placeholder="Nama Video . . ." value="{{$dt->video_name}}"
                                    name="dt[video_name]">
                            </div>
                            <div class="form-group">
                                <label for="email">Video url</label>
                                <input type="text" class="form-control input-solid" placeholder="Url Video . . ." value="{{$dt->video_url}}"
                                    name="dt[video_url]">
                            </div>
                            <div class="form-group">
                                <label for="email">Urutan</label>
                                <input type="number" min="1" value="{{$dt->order}}" class="form-control input-solid" placeholder="Urutan . . ."
                                    name="dt[order]">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- quiz delete -->
            <div class="modal fade text-left" id="delvideo{{$dt->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel17" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel17">Hapus Gambar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin akan menghapus video ini?</p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                <a class="btn btn-danger" href="{{ url('materi-video/delete/'.$dt->id) }}">HAPUS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @else
            <div class="card">
                <div class="card-header mb-1">
                    <h4 class="card-title">Tidak Ada Video Lainnnya</h4>
                </div>
            </div>
        @endif
    </div>
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-outline-primary mr-1 mb-1 block" data-toggle="modal"
                    data-target="#addimage"><i class="feather icon-plus"></i> Tambah gambar</button>
            </div>
        </div>
        @if(count($materi->materiImage) != 0)
        @foreach($materi->materiImage as $dt)
        <!-- Konten Lists -->
        <div class="card">
            <div class="card-body">
                <p>{{$dt->order}} | {{$dt->image_name}}</p>
                <hr>
                @if($dt->image_url != null )
                    <img class="img-fluid" src="{{ $dt->getPhoto() }}">
                @else
                    <img class="img-fluid" src="{{ asset('uploads/konten/blank.png') }}">
                @endif
                <p>{{$dt->description}}</p>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm-12 mr-1 text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-info" data-toggle="modal" data-target="#editimage{{$dt->id}}"><i class="feather icon-edit"></i></button>
                            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#delimage{{$dt->id}}"><i class="feather icon-trash"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal fade text-left" id="editimage{{$dt->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel17" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel17">Edit Gambar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['url' => 'materi-image/update/'.$dt->id , 'id' => 'form', 'method'=>'put', 'enctype'=>'multipart/form-data']) !!}
                            <input type="hidden" value="{{$dt->materi_id}}" name=dt[materi_id]">
                            <div class="form-group">
                                <label for="email">Nama Gambar</label>
                                <input type="text" class="form-control input-solid" placeholder="Nama Gambar . . ." value="{{$dt->image_name}}"
                                    name="dt[image_name]">
                            </div>
                            <div class="form-group">
                                <label for="email">Gambar</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control custom-file-input" id="inputGroupFile02" name="gambar">
                                    <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Urutan</label>
                                <input type="number" min="1" value="{{$dt->order}}" class="form-control input-solid" placeholder="Urutan . . ."
                                    name="dt[order]">
                            </div>
                            <div class="form-group">
                                <label for="email">Deskripsi</label>
                                <textarea type="text" class="form-control input-solid" placeholder="Deskripsi . . ."
                                    name="dt[description]">{{$dt->description}}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- quiz delete -->
            <div class="modal fade text-left" id="delimage{{$dt->id}}" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel17" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel17">Hapus Gambar</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin akan menghapus gambar ini?</p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Tidak</button>
                                <a class="btn btn-danger" href="{{ url('materi-image/delete/'.$dt->id) }}">HAPUS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end add quiz option -->
            @endforeach
            @else
            <div class="card">
                <div class="card-header mb-1">
                    <h4 class="card-title">Tidak Ada Gambar</h4>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Konten Materi</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="full-wrapper">
                                    <div id="full-container">
                                        {!! Form::open(['url' => 'materi/update/content/'.$materi->id , 'method' => 'PUT', 'id' => 'form', 'enctype'=>'multipart/form-data' ]) !!}
                                            <div class="editor">
                                                <div class="form-group">
                                                    <textarea type="text" id='konten' class="form-control input-solid editor" name="dt[konten]">
                                                        {!! $materi->konten !!}
                                                    </textarea>    
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">
                                                Save
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left" id="addvideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel17">Tambah Video</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['url' => 'materi-video/insert', 'id' => 'form']) !!}
				<input type="hidden" value="{{$materi->id}}" name=dt[materi_id]">
				<div class="form-group">
					<label for="email">Video Name</label>
					<input type="text" class="form-control input-solid" placeholder="Video Name . . ."
						name="dt[video_name]">
				</div>
				<div class="form-group">
					<label for="email">Video Url</label>
					<textarea type="text" class="form-control input-solid" placeholder="Url Video . . ."
						name="dt[video_url]"></textarea>
				</div>
                <div class="form-group">
					<label for="email">Urutan</label>
					<input type="number" min="1" value="1" class="form-control input-solid" placeholder="Urutan . . ."
						name="dt[order]">
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Simpan</button>
			</div>
			</form>
		</div>
	</div>
    </div>
    <div class="modal fade text-left" id="addimage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel17">Tambah Gambar</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				{!! Form::open(['url' => 'materi-image/insert', 'id' => 'form', 'enctype'=>'multipart/form-data']) !!}
				<input type="hidden" value="{{$materi->id}}" name=dt[materi_id]">
				<div class="form-group">
					<label for="email">Nama Gambar</label>
					<input type="text" class="form-control input-solid" placeholder="Nama Gambar . . ."
						name="dt[image_name]">
				</div>
				<div class="form-group">
					<label for="email">Gambar</label>
					<div class="custom-file">
                        <input type="file" class="form-control custom-file-input" id="inputGroupFile02" name="gambar">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
				</div>
                <div class="form-group">
					<label for="email">Urutan</label>
					<input type="number" min="1" value="1" class="form-control input-solid" placeholder="Urutan . . ."
						name="dt[order]">
				</div>
                <div class="form-group">
					<label for="email">Deskripsi</label>
					<textarea type="text" class="form-control input-solid" placeholder="Deskripsi . . ."
						name="dt[description]"></textarea>
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
    @stop
    @section('scripts2')
        <script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
        <script>
        var konten = document.getElementById("konten");
            CKEDITOR.replace(konten,{
            language:'en-gb'
        });
        CKEDITOR.config.allowedContent = true;
        </script>
            <script src="{{ asset(('mix-assets/js/scripts/editors/editor-quill.js')) }}"></script>
    @endsection