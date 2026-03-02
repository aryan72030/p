@extends('masterpage.layout')

@section('title')
    {{ __('create email setting') }}
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
                                <h4 class="m-b-10">{{ __('Form email setting') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ __('Home') }}</a></li>
                             
                                <li class="breadcrumb-item">{{ __('Form email setting') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="email-sidenav">
                <div class="email-setting-wrap ">
                    <form method="POST" action="{{ Route('email.store') }}" accept-charset="UTF-8" id="mail-form">
                        @csrf
                        <div class="card-header p-3">
                            <h5>Email Settings</h5>
                        </div>
                        <div class="card-body p-3 pb-0">
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="mail_mailer" class="form-label">{{ __('Mail Driver') }}
                                    </label>
                                    <input class="form-control" placeholder="Enter Mail Mailer" required="required"
                                        id="mail_mailer" name="mail_mailer" type="text"
                                        value="{{ $settings->where('key', 'mail_mailer')->first()->value ?? '' }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mail_host" class="form-label">{{ __('Mail Host') }}</label>
                                    <input class="form-control" placeholder="Enter Mail Host" id="mail_host"
                                        name="mail_host" type="text" value="{{ $settings->where('key', 'mail_host')->first()->value ?? '' }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mail_port" class="form-label">{{ __('Mail Port') }}</label>
                                    <input class="form-control" placeholder="Enter Mail Port" required="required"
                                        id="mail_port" name="mail_port" type="text"
                                        value="{{ $settings->where('key', 'mail_port')->first()->value ?? '' }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mail_username" class="form-label">{{ __('Mail Username') }}</label>
                                    <input class="form-control" placeholder="Enter Mail Username" required="required"
                                        id="mail_username" name="mail_username" type="text"
                                        value="{{ $settings->where('key', 'mail_username')->first()->value ?? '' }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mail_password" class="form-label">{{ __('Mail Password') }}</label>
                                    <input class="form-control" placeholder="Enter Mail Password" required="required"
                                        id="mail_password" name="mail_password" type="password"
                                        value="{{ $settings->where('key', 'mail_password')->first()->value ?? '' }}">
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="mail_encryption" class="form-label">{{ __('Mail Encryption') }}</label>
                                    <input class="form-control" placeholder="Enter Mail Encryption" required="required"
                                        id="mail_encryption" name="mail_encryption" type="text"
                                        value="{{ $settings->where('key', 'mail_encryption')->first()->value ?? '' }}">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="mail_address" class="form-label">{{ __('Mail From Address') }}</label>
                                    <input class="form-control" placeholder="Enter Mail From address" required="required"
                                        id="mail_address" name="mail_address" type="text"
                                        value="{{ $settings->where('key', 'mail_address')->first()->value ?? '' }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="mail_name" class="form-label">{{ __('Mail From Name') }}</label>
                                    <input class="form-control" placeholder="Enter From Name" required="required"
                                        id="mail_name" name="mail_name" type="text"
                                        value="{{ $settings->where('key', 'mail_name')->first()->value ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer p-3 d-flex justify-content-between flex-wrap "style="gap:10px">

                            <input class="btn btn-print-invoice  btn-primary" type="submit" value="Save Changes">
                        </div>
                    </form>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </section>
@endsection




