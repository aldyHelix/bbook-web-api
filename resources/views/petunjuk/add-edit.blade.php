@extends('layouts.app')

@section('page-title', __($edit ? 'Edit Petunjuk' : 'Add Petunjuk'))

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
    {!! Form::open(['url' => 'petunjuk/update/'.$petunjuk->id , 'method' => 'PUT', 'id' => 'form' ]) !!}
@else
    {!! Form::open(['url' => 'petunjuk/insert', 'id' => 'form']) !!}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
			<div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Kode Petunjuk</label>
                    <input type="text" class="form-control input-solid" placeholder="Kode Petunjuk" name="dt[kode_petunjuk]" value="{{ $edit ? $petunjuk->kode_petunjuk : old('kode_petunjuk') }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Nama Petunjuk</label>
                    <input type="text" class="form-control input-solid" placeholder="Nama Petunjuk" name="dt[nama_petunjuk]" value="{{ $edit ? $petunjuk->nama_petunjuk : old('nama_petunjuk') }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Judul</label>
                    <input type="text" class="form-control input-solid" placeholder="Judul Petunjuk" name="dt[header]" value="{{ $edit ? $petunjuk->header : old('header') }}" required>
                </div>
                <div class="form-group">
                    <label for="department">Urutan</label>
                    <input type="number" class="form-control input-solid" placeholder="Urutan Materi" name="dt[order]" value="{{ $edit ? $petunjuk->order : old('order') }}">
                </div>
                <div class="form-group">
                    <label for="email">Deskripsi</label>
                    <textarea type="text" id='deskripsi' class="form-control input-solid editor" name="dt[description]">
                        {!! $edit ? htmlspecialchars($petunjuk->description ): old('description') !!}
                    </textarea>
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

@section('scripts2')
<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
<script>
   var deskripsi = document.getElementById("deskripsi");
     CKEDITOR.replace(deskripsi,{
     language:'en-gb'
   });
   CKEDITOR.config.allowedContent = true;
</script>
    <script src="{{ asset(('mix-assets/js/scripts/editors/editor-quill.js')) }}"></script>
@endsection
