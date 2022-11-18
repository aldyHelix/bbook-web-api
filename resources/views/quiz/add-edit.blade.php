@extends('layouts.app')

@section('page-title', __($edit ? 'Edit Quiz' : 'Add Quiz'))

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
    {!! Form::open(['url' => 'quiz/update/'.$quiz->id , 'method' => 'PUT', 'id' => 'form', 'enctype'=>'multipart/form-data' ]) !!}
@else
    {!! Form::open(['url' => 'quiz/insert', 'id' => 'form', 'enctype'=>'multipart/form-data']) !!}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
			<div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Judul</label>
                    <input type="text" class="form-control input-solid" placeholder="Nama Materi" name="dt[header]" value="{{ $edit ? $quiz->header : old('header') }}" required>
                </div>
                <div class="form-group">
                    <label for="basicInputFile">Gambar Materi</label>
                    <div class="custom-file">
                        <input type="file" class="form-control custom-file-input" id="inputGroupFile02" name="gambar">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Pertanyaan</label>
                    <input type="text" class="form-control input-solid" placeholder="Nama Materi" name="dt[question]" value="{{ $edit ? $quiz->question : old('question') }}" required>
                </div>
                <div class="form-group">
                    <label for="department">Jawaban</label>
                    {{-- <input type="text" class="form-control input-solid" placeholder="Jawaban" name="dt[answer]" value="{{ $edit ? $quiz->answer : old('answer') }}"> --}}
					<select class="form-control input-solid" name="dt[answer_index]" id="option">
						<option value="0" {{ $edit ? ($quiz->answer == 'A' ? 'selected' : '') : ''}}>A</option>
						<option value="1" {{ $edit ? ($quiz->answer == 'B' ? 'selected' : '') : ''}}>B</option>
						<option value="2" {{ $edit ? ($quiz->answer == 'C' ? 'selected' : '') : ''}}>C</option>
						<option value="3" {{ $edit ? ($quiz->answer == 'D' ? 'selected' : '') : ''}}>D</option>
						<option value="4" {{ $edit ? ($quiz->answer == 'E' ? 'selected' : '') : ''}}>E</option>
				   </select>
                </div>
				<div class="form-group">
                    <label for="department">Bab</label>
                    <input type="number" class="form-control input-solid" placeholder="Bab" name="dt[bab]" value="{{ $edit ? $quiz->bab : old('bab') }}">
                </div>
                <div class="form-group">
                    <label for="department">Urutan</label>
                    <input type="number" class="form-control input-solid" placeholder="Urutan Materi" name="dt[order]" value="{{ $edit ? $quiz->order : old('order') }}">
                </div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
                    <label for="department">Jawaban A</label>
                    <input type="text" class="form-control input-solid" placeholder="Text jawaban A" name="dt[option_a]" value="{{ $edit ? $quiz->option_a : old('option_a') }}">
                </div>
				<div class="form-group">
                    <label for="department">Jawaban B</label>
                    <input type="text" class="form-control input-solid" placeholder="Text jawaban B" name="dt[option_b]" value="{{ $edit ? $quiz->option_b : old('option_b') }}">
                </div>
				<div class="form-group">
                    <label for="department">Jawaban C</label>
                    <input type="text" class="form-control input-solid" placeholder="Text jawaban C" name="dt[option_c]" value="{{ $edit ? $quiz->option_c : old('option_c') }}">
                </div>
				<div class="form-group">
                    <label for="department">Jawaban D</label>
                    <input type="text" class="form-control input-solid" placeholder="Text jawaban D" name="dt[option_d]" value="{{ $edit ? $quiz->option_d : old('option_d') }}">
                </div>
				<div class="form-group">
                    <label for="department">Jawaban E</label>
                    <input type="text" class="form-control input-solid" placeholder="Text jawaban E" name="dt[option_e]" value="{{ $edit ? $quiz->option_e : old('option_e') }}">
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

@section('scripts')

@stop
