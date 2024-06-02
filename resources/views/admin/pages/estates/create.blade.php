<!-- Extendamo layout za admin portal -->
@extends('admin.layout.layout')

@section('c-icon') <i class="fas fa-building"></i> @endsection
@section('c-title') @if(isset($createVar)) {{ __('Unos nekretnine') }} @else @endif @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.estates.index') }}">{{ __('Pregled nekretnina') }}</a>
    @if(isset($createVar))
        / <a href="#">{{ __('Unos nekretnine') }}</a>
    @else

    @endif
@endsection
@section('c-buttons')
    <a href="{{ route('system.estates.index') }}" title="{{ __('Pregled svih nekretnina') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>

    @if(isset($previewVar))
        <a href="{{ route('system.estates.edit', ['slug' => $estate->slug ]) }}">
            <button class="pm-btn btn pm-btn-success">
                <i class="fas fa-edit"></i>
                <span>{{ __('Uredite') }}</span>
            </button>
        </a>
        <a href="{{ route('system.estates.delete', ['slug' => $estate->slug ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endif
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="@if(isset($previewVar)) col-md-9 @else col-md-12 @endif">
                @if(isset($createVar))
                    <form action="{{ route('system.estates.save') }}" method="POST">
                @elseif(isset($editVar))
                    <form action="{{ route('system.estates.update') }}" method="POST">
                    {{ html()->hidden('id')->class('form-control')->value($estate->id) }}
                @endif
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Naslov nekretnine'))->for('title') }}</b>
                                {{ html()->text('title')->class('form-control form-control-sm mt-1')->required()->maxlength(150)->value(isset($estate) ? $estate->title : '')->isReadonly(isset($previewVar)) }}
                                <small id="titleHelp" class="form-text text-muted">{{ __('Naziv za nekretninu') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Kategorija'))->for('category') }}</b>
                                {{ html()->select('category', $categories)->class('form-control form-control-sm mt-1')->required()->value(isset($estate) ? $estate->category : '')->disabled(isset($previewVar)) }}
                                <small id="categoryHelp" class="form-text text-muted">{{ __('Kategorija kojoj nekretnina pripada') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Prodaja ili iznajmljivanje'))->for('purpose') }}</b>
                                {{ html()->select('purpose', $purposes)->class('form-control form-control-sm mt-1')->required()->value(isset($estate) ? $estate->purpose : '')->disabled(isset($previewVar)) }}
                                <small id="purposeHelp" class="form-text text-muted">{{ __('Da li je nekretnina na prodaju ili se iznajmljuje') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Izdvojeno'))->for('sponsored') }}</b>
                                {{ html()->select('sponsored', $sponsored)->class('form-control form-control-sm mt-1')->required()->value(isset($estate) ? $estate->sponsored : '')->disabled(isset($previewVar)) }}
                                <small id="sponsoredHelp" class="form-text text-muted">{{ __('Da li je nekretnina izdvojena?') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Objavljeno'))->for('published') }}</b>
                                {{ html()->select('published', [0 => 'Ne', 1 => 'Da'])->class('form-control form-control-sm mt-1')->required()->value(isset($estate) ? $estate->published : '')->disabled(isset($previewVar)) }}
                                <small id="publishedHelp" class="form-text text-muted">{{ __('Da li je nekretnina objavljena?') }}</small>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Cijena nekretnine'))->for('price') }}</b>
                                {{ html()->text('price')->class('form-control form-control-sm mt-1')->required()->maxlength(50)->value(isset($estate) ? $estate->price : '')->isReadonly(isset($previewVar)) }}
                                <small id="priceHelp" class="form-text text-muted">{{ __('Npr. 120000.00 KM') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Snižena cijena'))->for('sale_price') }}</b>
                                {{ html()->text('sale_price')->class('form-control form-control-sm mt-1')->maxlength(50)->value(isset($estate) ? $estate->sale_price : '')->isReadonly(isset($previewVar)) }}
                                <small id="sale_priceHelp" class="form-text text-muted">{{ __('Napomena: Ostavite prazno ukoliko nije sniženo!') }}</small>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Adresa'))->for('address') }}</b>
                                {{ html()->text('address')->class('form-control form-control-sm mt-1')->required()->maxlength(150)->value(isset($estate) ? $estate->address : '')->isReadonly(isset($previewVar)) }}
                                <small id="addressHelp" class="form-text text-muted">{{ __('Adresa na kojoj se nekretnina nalazi') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Grad'))->for('city') }}</b>
                                {{ html()->select('city', $cities)->class('form-control form-control-sm mt-1')->required()->value(isset($estate) ? $estate->city : '')->disabled(isset($previewVar)) }}
                                <small id="cityHelp" class="form-text text-muted">{{ __('Odaberite grad') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Država'))->for('country') }}</b>
                                {{ html()->select('country', $countries)->class('form-control form-control-sm mt-1')->required()->value(isset($estate) ? $estate->country : '21')->disabled(isset($previewVar)) }}
                                <small id="countryHelp" class="form-text text-muted">{{ __('Odaberite državu') }}</small>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Površina nekretnine'))->for('surface') }}</b>
                                {{ html()->number('surface', '', 0, 500000, 1)->class('form-control form-control-sm mt-1')->required()->value(isset($estate) ? $estate->surface : '')->disabled(isset($previewVar)) }}
                                <small id="surfaceHelp" class="form-text text-muted">{{ __('Npr. 156 m2') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Površina zemljišta'))->for('land_surface') }}</b>
                                {{ html()->number('land_surface', '', 0, 500000, 1)->class('form-control form-control-sm mt-1')->required()->value(isset($estate) ? $estate->land_surface : '')->disabled(isset($previewVar)) }}
                                <small id="land_surfaceHelp" class="form-text text-muted">{{ __('Površina okućnice / površina zemljišta') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Spavaće sobe'))->for('bedrooms') }}</b>
                                {{ html()->number('bedrooms', '', 0, 100, 1)->class('form-control form-control-sm mt-1')->value(isset($estate) ? $estate->bedrooms : '')->disabled(isset($previewVar)) }}
                                <small id="bedroomsHelp" class="form-text text-muted">{{ __('Broj spavaćih soba') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Kupatila'))->for('bathrooms') }}</b>
                                {{ html()->number('bathrooms', '', 0, 100, 1)->class('form-control form-control-sm mt-1')->value(isset($estate) ? $estate->bathrooms : '')->disabled(isset($previewVar)) }}
                                <small id="bathroomsHelp" class="form-text text-muted">{{ __('Broj kupatila') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Garaže'))->for('garages') }}</b>
                                {{ html()->number('garages', '', 0, 1000, 1)->class('form-control form-control-sm mt-1')->value(isset($estate) ? $estate->garages : '')->disabled(isset($previewVar)) }}
                                <small id="garagesHelp" class="form-text text-muted">{{ __('Broj garažnih mjesta') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Godina izgradnje'))->for('built') }}</b>
                                {{ html()->number('built', '', 1900, date('Y'), 1)->class('form-control form-control-sm mt-1')->value(isset($estate) ? $estate->built : '')->disabled(isset($previewVar)) }}
                                <small id="builtHelp" class="form-text text-muted">{{ __('Godina gradnje objekta') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Video'))->for('video') }}</b>
                                {{ html()->text('video')->class('form-control form-control-sm mt-1')->maxlength(150)->value(isset($estate) ? $estate->video : '')->disabled(isset($previewVar)) }}
                                <small id="videoHelp" class="form-text text-muted">{{ __('Embedded YouTube link') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Detaljan opis'))->for('description') }}</b>
                                {{ html()->textarea('description')->class('form-control form-control-sm')->maxlength(5000)->value((isset($estate) ? $estate->description : ''))->style('height:240px')->required()->isReadonly(isset($previewVar)) }}
                                <small id="descriptionHelp" class="form-text text-muted">{{ __('Detaljan opis nekretnine') }}</small>
                            </div>
                        </div>
                    </div>

                    @if(!isset($previewVar))
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                            </div>
                        </div>
                    @endif
                </form>
            </div>

            @if(isset($previewVar))
                @include('admin.pages.estates.includes.right-menu')
            @endif
        </div>
    </div>
@endsection
