@extends('layout')

@section('title', 'Order')

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header class="text-capitalize">all orders</header>
                </div>
                <div class="card-body">
                    <table id="dt_vps_order" class="table order-column hover" data-source="{{ route('order.vps.list') }}" data-details-source="{{ route('component.order.vps.details') }}">
                        <thead>
                        <tr>
                            <th>
                                <i class="md md-view-stream"></i>
                            </th>
                            <th>CUSTOMER</th>
                            <th>DATE</th>
                            <th>CPU</th>
                            <th>RAM</th>
                            <th>DISK</th>
                            <th>TRAFFIC</th>
                            <th>CREATED BY</th>
                            <th>APPROVED BY</th>
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
<link href="{{ asset('css/libs/DataTables/extensions/dataTables.colVis.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/libs/DataTables/extensions/dataTables.tableTools.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
<script src="{{ asset('js/libs/DataTables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset('js/pages/dt_vps_order.min.js') }}"></script>
@endpush