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

        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('system.estates.save-new-image') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ html()->hidden('id')->class('form-control')->value($estate->id) }}

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                {{ html()->label(__('Odaberite fotografiju'))->for('photo_uri')->class('bold') }}
                                <input name="file_uri" class="form-control form-control-sm mt-3" id="file_uri" type="file">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col" width="60px" CLASS="text-center">#</th>
                        <th scope="col">First</th>
                        <th scope="col" width="120px" class="text-center">{{ __('Akcije') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $counter = 1; @endphp
                    @foreach($estate->imagesRel as $imageRel)
                        <tr>
                            <th scope="row" width="60px" CLASS="text-center">{{ $counter++ }}.</th>
                            <td>{{ $imageRel->fileRel->file ?? '' }}</td>
                            <td class="text-center">
                                <a href="{{ route('system.estates.delete-new-image', ['id' => $imageRel->id ]) }}">
                                    <button class="btn btn-dark btn-xs">{{ __('Obrišite') }}</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
