@extends('admin.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('c-icon') <i class="fas fa-address-card"></i> @endsection
@section('c-title') @isset($create) {{ __('Stranica') }} @else {{ $page->title }} @endif @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="#"> {{ __('Pregled svih postova') }} </a>
    @isset($create)
        / <a href="#"> {{ __('Unos') }} </a>
    @else
        / <a href="#"> {{ $page->title }} </a>
    @endif
@endsection
@section('c-buttons')
    <a href="{{ route('system.single-pages.index') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>

    @if(isset($edit) and $page->category == 24)
        <a href="{{ route('system.single-pages.delete', ['id' => $page->id ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endif
@endsection
<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="@if(isset($edit)) col-md-9 @else col-md-12 @endif">
                @if(isset($create))
                    <form action="{{ route('system.single-pages.save') }}" method="POST">
                @else
                    <form action="{{ route('system.single-pages.update') }}" method="POST">
                    {{ html()->hidden('id')->class('form-control')->value($page->id) }}
                @endif
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Tip stranice'))->for('category') }}</b>
                                {{ html()->select('category', $category)->class('form-control form-control-sm mt-1')->required()->value(isset($page) ? $page->category : 24) }}
                                <small id="page_typeHelp" class="form-text text-muted">{{ __('Odaberite stranicu na koju objavljujete sadržaj') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Naslov'))->for('title') }}</b>
                                {{ html()->text('title')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value(isset($page) ? $page->title : '')->isReadonly(isset($previewVar)) }}
                                <small id="titleHelp" class="form-text text-muted">{{ __('Naslov posta') }}</small>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Detaljan opis'))->for('description') }}</b>
                                {{ html()->textarea('description')->class('form-control form-control-sm')->maxlength(5000)->value("")->style('height:320px')->required()->value(isset($page) ? $page->description : '')->isReadonly(false) }}
                                <small id="descriptionHelp" class="form-text text-muted">{{ __('Detaljni opis posta') }}</small>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                        </div>
                    </div>

                </form>
            </div>

            @if(isset($edit))
                <div class="col-md-3 border-left">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="card" title=" {{ __('Osnovne informacije') }} ">
                                <div class="card-body">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <h6 class="pt-1"> {{ __('Ostale informacije') }} </h6>
                                        <a href="#">
                                            <small><i class="fas fa-info"></i></small>
                                        </a>
                                    </div>
                                    <hr class="mt-2">
                                    <!-- Form for submit main image of estate -->
                                    <form action="{{ route('system.single-pages.update-image') }}" method="POST" id="update-main-image" enctype="multipart/form-data">
                                        @csrf
                                        {{ html()->hidden('id')->class('form-control')->value($page->id) }}
                                        <div class="card p-0 m-0 mt-3" title="{{ __('Nova fotografija za program (Rezolucija: 1500px x 400px)') }}">
                                            <div class="card-body d-flex justify-content-between">
                                                <label for="photo_uri" >
                                                    <p class="m-0">{{ __('Ažurirajte fotografiju') }}</p>
                                                </label>
                                                <i class="fas fa-image mt-1"></i>
                                            </div>
                                            <input name="photo_uri" class="form-control form-control-lg d-none" id="photo_uri" type="file">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
