@extends('layouts.app')

@section('page-title', __('User'))
@section('page-heading', __('User List'))

@section('content')
    @include('partials.messages')
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-lg-12">
                <div class="float-right">
                        <a href="{{ url('end-user/add') }}" class="btn btn-outline-primary">
                            <i class="feather icon-plus mr-2"></i>
                            @lang('Add User')
                        </a>
                    </div>
                </div>
            </div>

            <div class="table-responsive" id="users-table-wrapper">
                <table class="table table-striped table-borderless">
                    <thead>
                    <tr>
                        <th class="min-width-100">@lang('No')</th>
                        <th class="min-width-100">@lang('Name')</th>
                        <th class="min-width-150">@lang('Username')</th>
                        <th class="min-width-150">@lang('Email')</th>
                        <th class="min-width-150">@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                            @if(count($users))
                                @foreach ($users as $no=>$d)
                                    <tr>
                                        <td>{{$no+1}}</td>
                                        <td>{{$d->name}}</td>
                                        <td>{{$d->username}}</td>
                                        <td>{{$d->email}}</td>
                                        <td>
                                            <a href="{{ url('end-user/edit/'.$d->id) }}" class="btn btn-icon"
                                                title="@lang('Edit')" data-toggle="tooltip" data-placement="top">
                                                    <i class="feather icon-edit"></i>
                                            </a>
                                            <a href="{{ url('end-user/delete/'.$d->id) }}" class="btn btn-icon"
                                                title="@lang('Delete')" data-toggle="tooltip" data-placement="top">
                                                <i class="feather icon-trash"></i>
                                            </a>
                                            <a href="{{ url('end-user/answer/'.$d->id) }}" class="btn btn-icon"
                                                title="@lang('Answer')" data-toggle="tooltip" data-placement="top">
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
