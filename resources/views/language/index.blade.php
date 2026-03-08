@extends('masterpage.layout')

@section('title')
    {{ __('Language') }}
@endsection

@section('mainConten')
    <section class="dash-container">
        <div class="dash-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Languages') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Show language') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Languages') }}</h5>
                            <a href="#" class="btn btn-sm btn-primary btn-icon" title="{{ __('Create language') }}"
                                data-bs-toggle="tooltip" data-bs-placement="top" data-ajax-popup="true"
                                data-title="{{ __('Create Language') }}" data-url="{{ route('language.create') }}"
                                data-size="lg"><i class="ti ti-plus"></i></a>
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="pc-dt-simple">
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
                                                <td style="display: flex">
                                                    <a href="#" class="btn btn-gradient-info" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" data-ajax-popup="true"
                                                        data-title="{{ __('Edit Language') }}"
                                                        data-url="{{ Route('language.edit', $language->id) }}"
                                                        data-size="lg">{{ __('Update') }}</a>
                                                    <form action="{{ Route('language.destroy', $language->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Are you sure?')" class="btn btn-gradient-danger">{{ __('Delete') }}</button>
                                                    </form>
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
    @include('masterpage.modal')
@endsection
