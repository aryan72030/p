@extends('masterpage.layout')

@section('title')
    {{ __('Roles') }}
@endsection


@section('mainConten')
    <section class="dash-container">
        <div class="dash-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h4 class="m-b-10">{{ __('Basic Roles Tables') }}</h4>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item">{{ __('Role') }}</li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>{{ __('Basic Roles Table') }}</h5>
                            <span class="d-block m-t-5">{{ __('use class ') }}<code>{{ __('table') }}</code>
                                {{ __('inside table
                                                                                                                                element') }}</span>
                            @permission('create-roles')
                            <a href="{{ Route('role.create') }}" class="btn btn-primary">{{ __('add') }}</a>
                            @endpermission
                        </div>

                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('permission') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($role as $role)
                                            <tr>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    @foreach ($role->permissions->pluck('name')->toArray() as $array_item)
                                                        <li>{{ $array_item }}</li>
                                                    @endforeach
                                                </td>
                                                   <td style="display: flex">
                                                @permission('edit-roles')
                                             
                                                    <a href="{{ Route('role.edit', $role->id) }}"
                                                        class="btn btn-gradient-info">{{ __('update') }}</a>
                                               
                                                @endpermission

                                                @permission('delete-roles')
                                              
                                                    <form action="{{ Route('role.destroy', $role->id) }}" method="post">
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
@endsection
