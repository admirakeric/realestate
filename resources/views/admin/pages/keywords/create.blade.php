@extends('admin.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') @if(isset($create)) {{ __('Unos instance') }} @else {{ $instance->name }} @endif @endsection
@section('ph-short')
    {{__('Uredite instancu (vrijednost) šifarnika: ')}} <span class="text-info">{{ $keyword }}</span>

    @if(isset($edit))
        | <a href="{{ route('system.settings.keywords.delete-instance', ['id' => $instance->id ]) }}">{{ __('Obrišite instancu') }}</a>
    @endif
@endsection

@section('ph-navigation')
    / <a href="#"> .. </a>
    / <a href="{{ route('system.settings.keywords.preview-instances', ['key' => $key]) }}">{{ __('Instance šifarnika') }}</a>
    @if(isset($create))
        / <a href="#">{{ __('Unos instance') }}</a>
    @else
        / <a href="#">{{ $instance->name }}</a>
    @endif
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <div class="row">
            <div class="col-md-12">
                @if(isset($create))
                    {!! Form::open(array('route' => 'system.settings.keywords.save-instance', 'method' => 'post', 'id' => 'js-form')) !!}
                    {!! Form::hidden('type', $key, ['class' => 'form-control', 'id' => 'type']) !!}
                @elseif(isset($edit))
                    {!! Form::open(array('route' => 'system.settings.keywords.update-instance', 'method' => 'put', 'id' => 'js-form')) !!}
                    {!! Form::hidden('id', $instance->id, ['class' => 'form-control', 'id' => 'id']) !!}
                    {!! Form::hidden('type', $instance->type, ['class' => 'form-control', 'id' => 'type']) !!}
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name"> <b>{{ __('Naziv šifarnika') }}</b> </label>
                                    {!! Form::text('name', $instance->name ?? '', ['class' => 'form-control required', 'id' => 'name', 'aria-describedby' => 'nameHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="nameHelp" class="form-text text-muted"> {{ __('Puno ime i prezime') }} </small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="value"> <b>{{ __('Vrijednost') }}</b> </label>
                                    {!! Form::text('value', $instance->value ?? '', ['class' => 'form-control', 'id' => 'value', 'aria-describedby' => 'valueHelp', isset($preview) ? 'readonly' : '']) !!}
                                    <small id="valueHelp" class="form-text text-muted"> {{ __('Specijalna vrijednost šifarnika') }} </small>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mt-2">
                                    <label for="description"> <b>{{ __('Opis šifarnika') }}</b> </label>
                                    {!! Form::textarea('description', $instance->description ?? '', ['class' => 'form-control', 'id' => 'description', 'aria-describedby' => 'descriptionHelp', isset($preview) ? 'readonly' : '', 'style' => 'height:80px;']) !!}
                                    <small id="descriptionHelp" class="form-text text-muted"> {{ __('Kratki opis šifarnika') }} </small>
                                </div>
                            </div>
                        </div>

                        @if(!isset($preview))
                            <div class="row mt-3 mb-4">
                                <div class="col-md-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-sm btn-secondary"> <b>{{__('Ažurirajte informacije')}}</b> </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                {!! Form::close(); !!}
            </div>
        </div>
    </div>
@endsection
