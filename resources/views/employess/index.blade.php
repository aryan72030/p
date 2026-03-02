@extends('masterpage.layout')

@section('title')
    {{ __('Employess') }}
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
                                <li class="breadcrumb-item">{{ __('Show employees') }}</li>

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
                                {{ __('inside table
                                                                                                element') }}</span>

                            @if (checkEmployee())
                                @permission('create-employees')
                                    <a href="{{ Route('employes.create') }}" class="btn  btn-primary">{{ __('add') }}</a>
                                @endpermission
                            @endif
                        </div>

                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('email') }}</th>
                                            <th>{{ __('roles') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>

                                                {{-- <td><img style="width:  ;" src=""></td> --}}
                                                <td style="display: flex">
                                                    @permission('edit-employees')
                                                        <a href="{{ Route('employes.edit', $user->id) }}"
                                                            class="btn btn-gradient-info">{{ __('update') }}</a>
                                                    @endpermission

                                                    @permission('delete-employees')
                                                        <form action="{{ Route('employes.destroy', $user->id) }}"
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
