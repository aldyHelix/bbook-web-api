@extends('layouts.app')

@section('page-title', __('Quiz List'))

@section('content')
    @include('partials.messages')
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-lg-12">
                <div class="float-right">
                        <a href="{{ url('end-user/add') }}" class="btn btn-outline-primary">
                            <i class="feather icon-plus mr-2"></i>
                            @lang('Add Quiz')
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive" id="users-table-wrapper">
                <table class="table table-striped table-borderless">
                    <thead>
                    <tr>
                        <th class="min-width-100">@lang('No')</th>
                        <th class="min-width-100">@lang('Nama Materi')</th>
                        <th class="min-width-150">@lang('Question')</th>
                        <th class="min-width-150">@lang('Answer')</th>
                        <th class="min-width-150">@lang('Quiz Picture')</th>
                        <th class="min-width-150">@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($quizs))
                            @foreach($quizs as $no=>$d)
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>{{$d->materiQuiz->nama_materi}}</td>
                                    <td>{{$d->question}}</td>
                                    <td>{{$d->answer}}</td>
                                    <td>{{$d->is_picture_quiz}}</td>
                                    <td>
                                        <a href="{{ url('quiz/edit/'.$d->id) }}" class="btn btn-icon"
                                            title="@lang('Edit')" data-toggle="tooltip" data-placement="top">
                                                <i class="feather icon-edit"></i>
                                        </a>
                                        <a href="{{ url('quiz/delete/'.$d->id) }}" class="btn btn-icon"
                                            title="@lang('Delete')" data-toggle="tooltip" data-placement="top">
                                            <i class="feather icon-trash"></i>
                                        </a>
                                        <a href="{{ url('quiz/detail/'.$d->id) }}" class="btn btn-icon"
                                            title="@lang('Details')" data-toggle="tooltip" data-placement="top">
                                                <i class="feather icon-layers"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5"><em>@lang('No records found.')</em></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')

@stop
