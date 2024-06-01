@extends('admin.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main')  @endsection
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


@section('c-icon') <i class="fas fa-key"></i> @endsection
@section('c-title') @if(isset($create)) {{ __('Unos instance') }} @else {{ $instance->name }} @endif @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.settings.keywords') }}"> {{ __('Lista šifarnika') }} </a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.settings.keywords') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    @if(isset($edit))
        <a href="{{ route('system.settings.keywords.delete-instance', ['id' => $instance->id]) }}">
            <button class="pm-btn btn pm-btn-success">
                <i class="fas fa-trash"></i>
                <span>{{ __('Obrišite') }}</span>
            </button>
        </a>
    @endif
@endsection


<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <div class="row">
            <div class="col-md-12">
                @if(isset($create))
                    <form action="{{ route('system.settings.keywords.save-instance') }}" method="POST">
                    @csrf
                    {{ html()->hidden('keyword')->class('form-control')->id('keyword')->value($key) }}
                @elseif(isset($edit))
                    <form action="{{ route('system.settings.keywords.update-instance') }}" method="POST">
                    @csrf
                    {{ html()->hidden('keyword')->class('form-control')->id('keyword')->value($instance->keyword) }}
                    {{ html()->hidden('id')->class('form-control')->id('keyword')->value($instance->id) }}
                @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Naziv šifarnika'))->for('value') }}</b>
                                        {{ html()->text('value')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($instance) ? $instance->value : ''))->isReadonly(isset($preview)) }}
                                        <small id="valueHelp" class="form-text text-muted"> {{ __('Naziv instance') }} </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <b>{{ html()->label(__('Vrijednost'))->for('special_value') }}</b>
                                        {{ html()->text('special_value')->class('form-control form-control-sm mt-1')->maxlength(100)->value((isset($instance) ? $instance->special_value : ''))->isReadonly(isset($preview)) }}
                                        <small id="valueHelp" class="form-text text-muted"> {{ __('Specijalna vrijednost šifarnika') }} </small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mt-2">
                                        <b>{{ html()->label(__('Opis šifarnika'))->for('description') }}</b>
                                        {{ html()->textarea('description')->class('form-control form-control-sm')->maxlength(2000)->value((isset($instance) ? $instance->description : ''))->style('height:160px')->required()->isReadonly(isset($preview)) }}
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
                </form>
            </div>
        </div>
    </div>
@endsection
