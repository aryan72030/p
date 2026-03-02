@extends('masterpage.layout')

@section('title')
    {{ __('historys') }}
@endsection

@section('mainConten')
    <section class="dash-container">
        <div class="dash-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Basic Tables') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Show history') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Basic Table') }}</h5>
                            <span class="d-block m-t-5">{{ __('use class') }} <code>{{ __('table') }}</code>
                                {{ __('inside table element') }}</span>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>{{ __('transaction id') }}</th>
                                            <th>{{ __('duration') }}</th>
                                            <th>{{ __('amount') }}</th>
                                            <th>{{ __('payment method') }}</th>
                                            <th>{{ __('start date') }}</th>
                                            <th>{{ __('end date') }}</th>
                                            <th>{{ __('status') }}</th>
                                            <th>{{ __('invoice') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($history as $history)
                                            <tr>
                                                <td>{{$history->transaction_id ?? "No paymant"}}</td>
                                                <td>{{$history->duration}}</td>
                                                <td>{{$history->amount}}</td>
                                                <td>{{$history->payment_method}}</td>
                                                <td>{{$history->start_date->format('d M Y') }}</td>
                                                <td>{{$history->end_date->format('d M Y') }}</td>
                                                 <td>{{$history->status}}</td>
                                                 <td>
                                                    @if ($history->payment_method=="stripe")
                                                        <a href="{{ $history->invoice }}" class="btn btn-gradient-info" >{{ __('invoice') }}</a>
                                                    @else
                                                    {{ __('not paymant') }} 
                                                    @endif    
                                                 </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
