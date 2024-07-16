<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="fas fa-image"></i> @endsection
@section('c-title') {{ __('Slider') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="#"> {{ __('Pregled svih postova') }} </a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.slider.index') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    <a href="{{ route('system.slider.create') }}">
        <button class="pm-btn btn pm-btn-success">
            <i class="fas fa-plus"></i>
            <span>{{ __('Unesite') }}</span>
        </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @include('admin.layout.snippets.filters.filter-header', ['var' => $slides])
        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('admin.layout.snippets.filters.filters_header')
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($slides as $slide)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $slide->title ?? ''}} </td>
                    <td> {{ $slide->description ?? ''}} </td>
                    <td> <a href="{{ $slide->link }}">{{ __('Više informacija') }}</a> </td>

                    <td class="text-center">
                        <a href="{{ route('system.slider.delete', ['id' => $slide->id ]) }}" title="{{ __('Više informacija') }}">
                            <button class="btn btn-danger btn-xs">{{ __('Obrišite') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @include('admin.layout.snippets.filters.pagination', ['var' => $slides])
    </div>

@endsection

