@extends('layout')

@section('title', 'Vps Provision')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all vps provisions</header>
                </div>
                <div class="card-body">
                    <table id="dt_vps_provision" class="table order-column hover" data-source="{{ route('provision.vps.list') }}" data-details-source="{{ route('component.provision.vps.details') }}">
                        <thead>
                        <tr>
                            <th>
                                <i class="md md-view-stream"></i>
                                <span class="hidden">Info</span>
                            </th>
                            <th>Customer</th>
                            <th>Operating System</th>
                            <th>Provisioned By</th>
                            <th>Virtual Machine</th>
                            <th>Ip</th>
                            <th>Mac</th>
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
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/libs/DataTables/TableTools.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('js/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_vps_provision.min.js') }}"></script>
@endpush