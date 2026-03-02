@extends('masterpage.layout')

@section('title')
    {{ __('blogs') }}
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
                                <li class="breadcrumb-item">{{ __('Show blog') }}</li>

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
                        @permission('create-blog')
                            <a href="{{ Route('blog.create') }}" class="btn  btn-primary">{{ __('add') }}</a>
                        @endpermission
                        </div>
                        <div class="card-body table-border-style">
                            <div class="table-responsive">
                                <table class="table" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('email') }}</th>
                                            <th>{{ __('password') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>mdo</td>
                                            <td>
                                                @permission('edit-blog')
                                                <a href="#" class="btn btn-gradient-info">{{ __('update') }}</a>
                                                @endpermission

                                                @permission('delete-blog')
                                                <a href="#" class="btn btn-gradient-danger">{{ __('delete') }}</a>
                                                @endpermission
                                            </td>
                                        </tr>
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
