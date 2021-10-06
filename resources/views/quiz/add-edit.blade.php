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
    {!! Form::open(['url' => 'quiz/update/'.$quiz->id , 'method' => 'PUT', 'id' => 'form' ]) !!}
@else
    {!! Form::open(['url' => 'quiz/insert', 'id' => 'form']) !!}
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
			<div class="col-sm-6">
                <div class="form-group">
                    <label for="name">Pertanyaan</label>
                    <input type="text" class="form-control input-solid" placeholder="Nama Materi" name="dt[question_text]" value="{{ $edit ? $quiz->question_text : old('question_text') }}" required>
                </div>
                <div class="form-group">
                    <label for="department">Jawaban</label>
                    {{-- <input type="text" class="form-control input-solid" placeholder="Jawaban" name="dt[answer]" value="{{ $edit ? $quiz->answer : old('answer') }}"> --}}
					<select class="form-control input-solid" name="dt[answer]" id="option">
						<option value="A" {{ $edit ? ($quiz->answer == 'A' ? 'selected' : '') : ''}}>A</option>
						<option value="B" {{ $edit ? ($quiz->answer == 'B' ? 'selected' : '') : ''}}>B</option>
						<option value="C" {{ $edit ? ($quiz->answer == 'C' ? 'selected' : '') : ''}}>C</option>
						<option value="D" {{ $edit ? ($quiz->answer == 'D' ? 'selected' : '') : ''}}>D</option>
						<option value="E" {{ $edit ? ($quiz->answer == 'E' ? 'selected' : '') : ''}}>E</option>
				   </select>
                </div>
				<div class="form-group">
                    <label for="department">Point</label>
                    <input type="number" class="form-control input-solid" placeholder="Nilai Poin Benar" name="dt[point]" value="{{ $edit ? $quiz->point : old('point') }}">
                </div>
                <div class="form-group">
                    <label for="department">Urutan</label>
                    <input type="number" class="form-control input-solid" placeholder="Urutan Materi" name="dt[order]" value="{{ $edit ? $quiz->order : old('order') }}">
                </div>
			</div>
			<div class="col-sm-6">
				<div class="form-group">
                    <label for="department">Jawaban A</label>
                    <input type="text" class="form-control input-solid" placeholder="Text jawaban A" name="dt[text_option_a]" value="{{ $edit ? $quiz->text_option_a : old('text_option_a') }}">
                </div>
				<div class="form-group">
                    <label for="department">Jawaban B</label>
                    <input type="text" class="form-control input-solid" placeholder="Text jawaban B" name="dt[text_option_b]" value="{{ $edit ? $quiz->text_option_b : old('text_option_b') }}">
                </div>
				<div class="form-group">
                    <label for="department">Jawaban C</label>
                    <input type="text" class="form-control input-solid" placeholder="Text jawaban C" name="dt[text_option_c]" value="{{ $edit ? $quiz->text_option_c : old('text_option_c') }}">
                </div>
				<div class="form-group">
                    <label for="department">Jawaban D</label>
                    <input type="text" class="form-control input-solid" placeholder="Text jawaban D" name="dt[text_option_d]" value="{{ $edit ? $quiz->text_option_d : old('text_option_d') }}">
                </div>
				<div class="form-group">
                    <label for="department">Jawaban E</label>
                    <input type="text" class="form-control input-solid" placeholder="Text jawaban E" name="dt[text_option_e]" value="{{ $edit ? $quiz->text_option_e : old('text_option_e') }}">
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