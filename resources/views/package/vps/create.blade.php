@extends('layout')

@section('title', 'VPS Packages | Create')

@push('styles')
@endpush

@section('content')
    <section>
        <div class="section-body">
            <div class="card">
                <div class="card-head">
                    <header>Create a VPS package</header>
                    <div class="tools">
                        <a class="btn btn-default btn-ink" onclick="history.go(-1);return false;">
                            <i class="fa fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>
                {{ Form::open(['route' => 'vpsPackage.store', 'class' => 'form form-validate', 'role' => 'form', 'novalidate']) }}
                    @include('package.vps.partials.form')
                {{ Form::close() }}
            </div><!--end .card -->
        </div>
    </section>
@stop

@push('scripts')
<script src="{{ asset('js/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/libs/jquery-validation/dist/additional-methods.min.js') }}"></script>
@endpush