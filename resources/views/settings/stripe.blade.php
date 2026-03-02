@extends('masterpage.layout')

@section('title')
    {{ __('create stripe setting') }}
@endsection

@section('mainConten')
    <section class="dash-container">
        <div class="dash-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Form stripe setting') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Form stripe setting') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card" id="stripe-sidenav">
                <div class="stripe-setting-wrap">
                    <form method="POST" action="{{ Route('stripe.store') }}" accept-charset="UTF-8">
                        @csrf
                        <div class="card-header p-3">
                            <h5>Stripe Settings</h5>
                        </div>
                        <div class="card-body p-3 pb-0">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="stripe_key" class="form-label">Stripe Publishable Key</label>
                                    <input class="form-control" placeholder="Enter Stripe Publishable Key" required="required"
                                        id="stripe_key" name="stripe_key" type="text"
                                        value="{{ $settings->where('key', 'stripe_key')->first()->value ?? '' }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="stripe_secret" class="form-label">Stripe Secret Key</label>
                                    <input class="form-control" placeholder="Enter Stripe Secret Key" required="required"
                                        id="stripe_secret" name="stripe_secret" type="password"
                                        value="{{ $settings->where('key', 'stripe_secret')->first()->value ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer p-3 d-flex justify-content-between flex-wrap" style="gap:10px">
                            <input class="btn btn-print-invoice btn-primary" type="submit" value="Save Changes">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
