@extends('layouts.app')

@section('page-title', __('Konten'))
@section('page-heading', $edit ? 'Edit '.$kontens->kontenMateri->nama_materi : __('Add Konten'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">@lang('Konten')</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __($edit ? 'Edit' : 'Add') }}
    </li>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {!! Form::open(['url' => 'konten/update/'.$kontens->id , 'method' => 'PUT', 'id' => 'form', 'enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['url' => 'konten/insert', 'id' => 'form', 'enctype'=>'multipart/form-data']) !!}
@endif


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    @lang('Konten')
                </h5>
                <p class="text-muted">
                    @lang('Tambahkan Konten dalam Materi')
                </p>
            </div>
            <div class="col-md-9">
            <div class="form-group">
                    <label for="work_scheme">@lang('Materi')</label>
                    <select class="form-control" name="dt[materi_id]" required>
                      <option value="">-- select --</option>
                      @foreach ($materis as $d)
                        <option value="{{ $d->id }}" {{ $edit ? ($d->id == $kontens->materi_id ? 'selected' : '') : '' }}>{{ $d->nama_materi }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="basicInputFile">Gambar Header</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" name="header">
                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="basicInputFile">Gambar 1</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="gambar_1">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="basicInputFile">Gambar 2</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile03" name="gambar_2">
                        <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="basicInputFile">Gambar 3</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile04" name="gambar_3">
                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="basicInputFile">Gambar 4</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile05" name="gambar_4">
                        <label class="custom-file-label" for="inputGroupFile05">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="department">Video Link</label>
                    <input type="text" class="form-control input-solid" placeholder="Link Video untuk ditampilkan" name="dt[video_stream]" required>
                </div>
                <div class="form-group">
                    <label for="email">Deskripsi</label>
                    <textarea type="text" class="form-control input-solid" placeholder="Deskripsi full" name="dt[description]"></textarea>
                </div>
            </div>
        </div>
    </div>
</div>


<button type="submit" class="btn btn-primary">
    {{ __($edit ? 'Update' : 'Create') }}
</button>

@stop
