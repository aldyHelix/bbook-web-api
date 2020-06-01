@extends('layouts.app')

@section('page-title', __('Materi'))
@section('page-heading', $edit ? 'Edit '.$materis->nama_materi : __('Add Materi'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">@lang('Materi')</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __($edit ? 'Edit' : 'Add') }}
    </li>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {!! Form::open(['url' => 'materi/update/'.$materis->id , 'method' => 'PUT', 'id' => 'form', 'enctype'=>'multipart/form-data' ]) !!}
@else
    {!! Form::open(['url' => 'materi/insert', 'id' => 'form', 'enctype'=>'multipart/form-data']) !!}
@endif


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    @lang('Materi')
                </h5>
                <p class="text-muted">
                    @lang('Tambahkan Materi')
                </p>
                @if ($edit)
                <p>
                    <img class="img-fluid" src="{{ $materis->getPhoto() }}">
                </p>
                @else
                <p>
                    <img class="img-fluid" src="{{ defaultPhoto() }}">
                </p>
                @endif
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="name">Nama Materi</label>
                    <input type="text" class="form-control input-solid" placeholder="Nama Materi" name="dt[nama_materi]" value="{{ $edit ? $materis->nama_materi : old('nama_materi') }}" required>
                </div>
                <div class="form-group">
                    <label for="basicInputFile">Gambar Materi</label>
                    <div class="custom-file">
                        <input type="file" class="form-control custom-file-input" id="inputGroupFile02" name="gambar">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="department">Video Link</label>
                    <input type="text" class="form-control input-solid" placeholder="Link Video untuk ditampilkan" name="dt[video_link_materi]" value="{{ $edit ? $materis->video_link_materi : old('video_link_materi') }}">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Deskripsi</label>
                            <input type="text" class="form-control input-solid" placeholder="Deskripsi Singkat" name="dt[deskripsi]" value="{{ $edit ? $materis->deskripsi : old('deskripsi') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="department">Kode QR</label>
                            <input type="text" class="form-control input-solid" placeholder="insert kode untuk dijadikan QR" name="dt[qr]" value="{{ $edit ? $materis->qr : old('qr') }}" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Full Deskripsi</label>
                    <textarea type="text" class="form-control input-solid" placeholder="Deskripsi full" name="dt[fill_deskripsi]">{{ $edit ? $materis->fill_deskripsi : old('fill_deskripsi') }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">
    {{ __($edit ? 'Update' : 'Create') }}
</button>
</form>
@stop
