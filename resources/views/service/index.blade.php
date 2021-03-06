@extends('layout')

@section('title', 'Service')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>All Services</header>
                    <div class="tools">
                        @if(auth()->user()->can('save.content'))
                            <a href="{{ route('service.create') }}" class="btn btn-primary">
                                <i class="md md-add"></i>
                                Add
                            </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th width="60%">Name</th>
                            <th width="20%" class="text-center">Active</th>
                            <th width="15%" class="text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @each('service.partials.table', $services, 'service')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop

@push('scripts')
@endpush