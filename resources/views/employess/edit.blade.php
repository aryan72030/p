@extends('masterpage.layout')

@section('title')
    {{ __('create emplyess') }}
@endsection

@section('mainConten')
    <section class="dash-container">
        <div class="dash-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Form employees') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Form Components') }}</li>
                                <li class="breadcrumb-item">{{ __('Form Validation') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Form employees') }}</h5>
                        </div>
                        <div class="card-body">
                            <form class="validate-me" action="{{ Route('employes.update', $update->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-end">{{ __('name') }}</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" value="{{ $update->name }}"
                                            name="name" placeholder="Enter name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-end">{{ __('Email') }}</label>
                                    <div class="col-lg-6">
                                        <input type="email" name="email" id="email" value="{{ $update->email }}"
                                            class="form-control" placeholder="Enter email"
                                            data-bouncer-message="The domain portion of the email address is invalid (the portion after the @).">
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-end">{{ __('Select Roles') }}</label>
                                    <div class="col-lg-6">
                                        <select class="form-control" name="role" id="select">
                                            <option>select Roles</option>
                                            @foreach ($role as $role)
                                                <option
                                                    value="{{ $role->name }}"{{ $update->role == $role->name ? 'selected' : '' }}>
                                                    {{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <div class="col-lg-4 col-form-label"></div>
                                    <div class="col-lg-6">
                                        <input type="submit" name="save" class="btn btn-primary" value="update">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- [ Form Validation ] end -->
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>
@endsection
