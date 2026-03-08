@extends('masterpage.layout')

@section('title')
    {{ __('Language Translation') }}
@endsection

@section('mainConten')
    <section class="dash-container">
        <div class="dash-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Language Translation') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Language Translation') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Manage Translations') }}</h5>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Language Name') }}</th>
                                            <th>{{ __('Language Code') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($languages as $language)
                                            <tr>
                                                <td>{{ $language->language_name }}</td>
                                                <td>{{ $language->language_code }}</td>
                                                <td>
                                                    <a href="{{ route('language-translation.edit', $language->language_code) }}" class="btn btn-gradient-info">{{ __('Edit Translations') }}</a>
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
