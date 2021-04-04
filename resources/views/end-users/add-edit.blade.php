@extends('layouts.app')

@section('page-title', __('User'))
@section('page-heading', $edit ? 'Edit '.$users->name : __('Add User'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ url('/') }}">@lang('User')</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __($edit ? 'Edit' : 'Add') }}
    </li>
@stop

@section('content')

@include('partials.messages')

@if ($edit)
    {!! Form::open(['url' => 'end-user/update/'.$users->id , 'method' => 'PUT', 'id' => 'form']) !!}
@else
    {!! Form::open(['url' => 'end-user/insert', 'id' => 'form']) !!}
@endif


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    @lang('End User')
                </h5>
                <p class="text-muted">
                    @lang('Tambahkan User App untuk login user')
                </p>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control input-solid" placeholder="Name" name="dt[name]" value="{{ $edit ? $users->name : old('name') }}" required>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control input-solid" placeholder="Username" name="dt[username]" value="{{ $edit ? $users->username : old('username') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control input-solid" placeholder="Email" name="dt[email]" value="{{ $edit ? $users->email : old('email') }}" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="department">Password</label>
                    <input type="password" class="form-control input-solid" placeholder="insert New / Current Password" name="dt[password]" required>
                </div>
            </div>
        </div>
    </div>
</div>


<button type="submit" class="btn btn-primary">
    {{ __($edit ? 'Update' : 'Create') }}
</button>

@stop
