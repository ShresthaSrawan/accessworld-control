@extends('layout')

@section('title', 'Users')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all users</header>
                    <div class="tools">
                        <a class="btn btn-primary ink-reaction" href="{{ route('user.create') }}">
                            <i class="md md-person-add"></i>
                            Add
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="dt_user" class="table order-column hover" data-source="{{route('user.list')}}">
                        <thead>
                        <tr>
                            <th>
                                <i class="md md-info"></i>
                            </th>
                            <th>Avatar</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@push('styles')
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/TableTools.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_user.min.js') }}"></script>
@endpush
