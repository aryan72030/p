@extends('masterpage.layout')

@section('title')
    {{ __('create roles') }}
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
                                <h4 class="m-b-10">{{ __('Form roles') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ Route('role.index') }}">{{ __('Roles') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Form Roles') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Form Roles') }}</h5>
                        </div>
                        <div class="card-body">
                            <form class="validate-me" action="{{ Route('role.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-end">{{ __('name') }}</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" value="" name="name" placeholder="Enter name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label text-lg-end">{{ __('Permission') }}</label>
                                    <div class="col-lg-6">
                                        @foreach ($premision as $dis)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permission[]"
                                                    id="checkbox-{{ $dis->id }}" value="{{ $dis->name }}">
                                                <label class="form-check-label" for="checkbox-{{ $dis->id }}">
                                                    {{ $dis->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        @error('permission')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-4 col-form-label"></div>
                                    <div class="col-lg-6">
                                        <input type="submit" name="save" class="btn btn-primary" value="Submit">
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
