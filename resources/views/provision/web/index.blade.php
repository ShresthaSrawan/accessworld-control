@extends('layout')

@section('title', 'Vps Provision')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all web provisions</header>
                </div>
                <div class="card-body">
                    <table id="dt_web_provision" class="table order-column hover" data-source="{{ route('provision.web.list') }}" data-details-source="{{ route('component.provision.web.details') }}">
                        <thead>
                        <tr>
                            <th>
                                <i class="md md-view-stream"></i>
                            </th>
                            <th>Customer</th>
                            <th>Domain</th>
                            <th>Provisioned By</th>
                            <th>Server Domain Id</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@push('styles')
<link href="{{ asset('css/libs/DataTables/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('js/libs/DataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_web_provision.min.js') }}"></script>
@endpush