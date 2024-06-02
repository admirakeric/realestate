@extends('admin.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('c-icon') <i class="fas fa-address-card"></i> @endsection
@section('c-title') {{ __('O nama') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="#"> {{ __('Pregled svih postova') }} </a>
@endsection
@section('c-buttons')
    <a href="#">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
@endsection
<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="col-md-12">
                <form action="#" method="POST">
                    <form action="#" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <b>{{ html()->label(__('Tip stranice'))->for('page_type') }}</b>
                                    {{ html()->select()->class('form-control form-control-sm mt-1')->required()->value()->isReadonly(false) }}
                                    <small id="page_typeHelp" class="form-text text-muted">{{ __('Odaberite stranicu na koju objavljujete sadržaj') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <b>{{ html()->label(__('Naslov'))->for('title') }}</b>
                                    {{ html()->text('title')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value("")->isReadonly(isset($previewVar)) }}
                                    <small id="titleHelp" class="form-text text-muted">{{ __('Naslov posta') }}</small>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <b>{{ html()->label(__('Detaljan opis'))->for('description') }}</b>
                                    {{ html()->textarea('description')->class('form-control form-control-sm')->maxlength(2000)->value("")->style('height:160px')->required()->isReadonly(false) }}
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
                </form>
            </div>
        </div>
    </div>
@endsection
