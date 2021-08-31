@extends('layouts.app')
@section('content')
    <style>
        .input-group {
            width: 66%;
            padding: 11px !important;
        }

    </style>
    <div class="container">

        <div class="row">
            <div class="col">
                <div>
                    <h1>Edit User</h1>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('updateUser') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $data->id }}">
            <div class="row">
                <div class="col text-center">
                    <div class="col-md-6 col-xs-6">
                        <div class="input-group">
                            <span class="input-group-addon">Email:&nbsp;</span>
                            <input type="text" class="form-control" name="email" value="{{ $data->email }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <div class="col-md-6 col-xs-6">
                        <div class="input-group">
                            <span class="input-group-addon">Phone:&nbsp;</span>
                            <input type="text" class="form-control" name="phone" value="{{ $data->phone }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <div class="col-md-6 col-xs-6">
                        <div class="input-group">
                            <span class="input-group-addon">Provider:&nbsp;</span>
                            <select name="provider_1" id="provider_1">
                                <option value="1" {{ $data->provider == 1 ? 'selected' : '' }}>Verizon</option>
                                <option value="2" {{ $data->provider == 2 ? 'selected' : '' }}>AT&T</option>
                                <option value="3" {{ $data->provider == 3 ? 'selected' : '' }}>T-Mobile</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <div class="col-md-6 col-xs-6">
                        <div class="input-group">
                            <span class="input-group-addon">Custom Email:&nbsp;</span>
                            <input type="text" class="form-control" name="custom_email" value="{{ $data->custom_email }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <div class="col-md-6 col-xs-6">
                        <div class="input-group">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active_1" {{ $data->is_active == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="is_active">Is Active</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col text-center">
                    <div class="col-md-6 col-xs-6">
                        <div class="input-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>




        </form>





    </div>



@endsection
