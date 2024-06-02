<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="fas fa-address-card"></i> @endsection
@section('c-title') {{ __('Stranice') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="#"> {{ __('Pregled svih stranica') }} </a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.single-pages.index') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('admin.layout.snippets.filters.filters', ['var' => $pages])

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
            @foreach($pages as $page)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $page->categoryRel->value ?? ''}} </td>
                    <td> {{ $page->title ?? ''}} </td>

                    <td class="text-center">
                        <a href="{{ route('system.single-pages.edit', ['id' => $page->id ]) }}" title="{{ __('Više informacija') }}">
                            <button class="btn btn-dark btn-xs">{{ __('Uredite') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


