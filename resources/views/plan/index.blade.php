@extends('masterpage.layout')

@section('title')
    {{ __('Plans') }}
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
                                <li class="breadcrumb-item">{{ __('Show plan') }}</li>

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
                            @permission('create-plan')
                            <a href="{{ Route('plan.create') }}" class="btn  btn-primary">{{ __('add') }}</a>
                            @endpermission
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Title') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Free/Paid') }}</th>
                                            <th>{{ __('duration') }}</th>
                                            <th>{{ __('Max Employess') }}</th>
                                            <th>{{ __('Max service') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plan as $plan)
                                            <tr>
                                                <td>{{ $plan->title }}</td>
                                                <td>{{ $plan->description }}</td>
                                                <td>{{ $plan->plan_type }}</td>
                                                <td>{{ $plan->duration }}</td>
                                                <td>{{ $plan->max_employees }}</td>
                                                <td>{{ $plan->max_service }}</td>
                                                <td style="display: flex">
                                                    @permission('edit-plan')
                                                        <a href="{{ Route('plan.edit', $plan->id) }}"
                                                            class="btn btn-gradient-info">{{ __('update') }}</a>
                                                    @endpermission

                                                    @permission('delete-plan')
                                                        <form action="{{ Route('plan.destroy', $plan->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-gradient-danger"
                                                                onclick="return confirm('are you sure')">{{ __('delete') }}</button>
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
@endsection
