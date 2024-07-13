<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="fas fa-image"></i> @endsection
@section('c-title') {{ $estate->title }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.estates.index') }}">{{ __('Pregled nekretnina') }}</a>
    / <a href="{{ route('system.estates.preview', ['slug' => $estate->slug ]) }}">{{ $estate->title }}</a>
    / <a href="#">{{ __('Karakteristike') }}</a>
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
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('system.estates.google-map.update-features') }}" method="POST">
                    @csrf
                    {{ html()->hidden('id')->class('form-control')->value($estate->id) }}

                    <div class="row">
                        @foreach($features as $feature)
                            <div class="col-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $feature->value }}" name="features[]" id="feature-{{ $feature->id }}" @if($estate->hasFeature($feature->value)) checked @endif>
                                    <label class="form-check-label" for="feature-{{ $feature->id }}">
                                        {{ $feature->value }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
