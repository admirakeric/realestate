<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="fas fa-image"></i> @endsection
@section('c-title') {{ $estate->title }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.estates.index') }}">{{ __('Pregled nekretnina') }}</a>
    / <a href="{{ route('system.estates.preview', ['slug' => $estate->slug ]) }}">{{ $estate->title }}</a>
    / <a href="#">{{ __('Fotografije') }}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.estates.index') }}" title="{{ __('Pregled svih nekretnina') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>

    <a href="{{ route('system.estates.preview', ['slug' => $estate->slug ]) }}">
        <button class="pm-btn btn pm-btn-info">
            <i class="fas fa-chevron-left"></i>
            <span>{{ __('Nazad') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        {{ html()->hidden('id')->id('estate-id')->class('form-control')->value($estate->id) }}

        {{ html()->hidden('latitude')->id('latitude')->class('form-control')->value($estate->latitude) }}
        {{ html()->hidden('longitude')->id('longitude')->class('form-control')->value($estate->longitude) }}
        <div class="row">
            <div class="col-md-12" style="height: 420px" id="change-map">

            </div>

        </div>
    </div>
@endsection
