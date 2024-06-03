@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-calendar"></i> @endsection
@section('c-title') {{ __('Kalendar') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="#">{{ __('Kalendar aktivnosti') }}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.dashboard') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper border-0">
        <div class="calendar-wrapper">
            <div class="calendar">

            </div>
        </div>
    </div>
@endsection
