@extends('masterpage.layout')

@section('title')
    {{ __('Service') }}
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
                                <li class="breadcrumb-item">{{ __('Show service') }}</li>

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
                                @if (CheckService())        
                            @permission('create-service')
                                <a href="#" class="btn btn-sm btn-primary btn-icon" title="{{ __('Create service') }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-ajax-popup="true"
                                    data-title="{{ __('Create Service') }}" data-url="{{ route('service.create') }}"
                                    data-size="lg"><i class="ti ti-plus"></i></a>
                            @endpermission
                             @endif
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>{{ __('name') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('price') }}</th>
                                            <th>{{ __('duration') }}</th>
                                            <th>{{ __('status') }}</th>
                                            <th>{{ __('image') }}</th>
                                            <th>{{ __('action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($service as $service)
                                            <tr>
                                                <td>{{ $service->name }}</td>
                                                <td>{{ $service->description }}</td>
                                                <td>{{ $service->price }}</td>
                                                <td>{{ $service->duration }}</td>
                                                <td>{{ $service->status }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/' . $service->image) }}" width="100px"
                                                        alt="">
                                                </td>
                                                <td style="display: flex">
                                                    @permission('edit-service')
                                                        <a href="#"
                                                            class="btn btn-gradient-info" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-ajax-popup="true"
                                                            data-title="{{ __('Create Service') }}"
                                                            data-url="{{ Route('service.edit', $service->id) }}"
                                                            data-size="lg">{{ __('update') }}</a>
                                                    @endpermission
                                         
                                                    @permission('delete-service')
                                                        <form action="{{ Route('service.destroy', $service->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return confirm('are you sure')"
                                                                class="btn btn-gradient-danger">{{ __('delete') }}</button>
                                                        </form>
                                                    @endpermission
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
