@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Enter Account Details</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('userAccount') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Account Name</label>

                                <div class="col-md-6">
                                    <input id="accountName" type="text" class="form-control{{ $errors->has('accountName') ? ' is-invalid' : '' }}"
                                           name="accountName" required autofocus>

                                    @if ($errors->has('accountName'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('accountName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Account Number</label>

                                <div class="col-md-6">
                                    <input id="accountNumber" type="number" class="form-control{{ $errors->has('accountNumber') ? ' is-invalid' : '' }}"
                                           value="" name="accountNumber" required>

                                    @if ($errors->has('accountNumber'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('accountNumber') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
                                        <select name="bank" class="custom-select">
                                            <option selected>Select your bank</option>
                                            <option value="FirstBank">First Bank</option>
                                            <option value="GTBank">Guarranty Trust Bank</option>
                                            <option value="ZenithBank">Zenith Bank</option>
                                            <option value="AccessBank">Access Bank</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>

                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection