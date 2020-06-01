@extends('layouts.app')

@section('page-title', __('Konten Materi'))
@section('page-heading', __('Konten Materi Pra-Sejarah'))
@section('content')
    @include('partials.messages')
    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-lg-12">
                <div class="float-right">
                        <a href="{{ url('konten/add') }}" class="btn btn-outline-primary">
                            <i class="feather icon-plus mr-2"></i>
                            @lang('Add Konten')
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
                        <th class="min-width-150">@lang('Header')</th>
                        <th class="min-width-150">@lang('Deskripsi')</th>
                        <th class="min-width-150">@lang('Action')</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(count($konten))
                            @foreach($konten as $no=>$d)
                                <tr>
                                    <td>{{$no+1}}</td>
                                    <td>{{$d->kontenMateri->nama_materi }}</td>
                                    <td><img src="{{ $d->getPhoto() }}" style="max-width: 42px;" class="round"></td>
                                    <td>{{$d->description}}</td>
                                    <td>
                                        <a href="{{ url('konten/edit/'.$d->id) }}" class="btn btn-icon"
                                            title="@lang('Edit')" data-toggle="tooltip" data-placement="top">
                                                <i class="feather icon-edit"></i>
                                        </a>
                                        <a href="{{ url('konten/delete/'.$d->id) }}" class="btn btn-icon"
                                            title="@lang('Delete')" data-toggle="tooltip" data-placement="top">
                                            <i class="feather icon-trash"></i>
                                        </a>
                                        <a href="{{ url('konten/detail/'.$d->id) }}" class="btn btn-icon"
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
