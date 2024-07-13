@extends('admin.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('c-icon') <i class="fas fa-blog"></i> @endsection
@section('c-title') @isset($create) {{ __('Novi post') }} @else {{ $post->title }} @endif @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="#"> {{ __('Pregled svih postova') }} </a>
    @isset($create)
        / <a href="#"> {{ __('Unos') }} </a>
    @else
        / <a href="#"> {{ $post->title }} </a>
    @endif
@endsection
@section('c-buttons')
    <a href="{{ route('system.blog.index') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>

    @if(isset($preview))
        <a href="{{ route('system.blog.edit', ['id' => $post->id ]) }}">
            <button class="pm-btn btn pm-btn-info">
                <i class="fas fa-edit"></i>
                <span>{{ __('Uredite') }}</span>
            </button>
        </a>
        <a href="{{ route('system.blog.delete', ['id' => $post->id ]) }}">
            <button class="pm-btn btn pm-btn-trash">
                <i class="fas fa-trash"></i>
            </button>
        </a>
    @endif
@endsection
<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-p-15">

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <div class="row">
            <div class="@if(isset($post)) col-md-9 @else col-md-12 @endif">
                @if(isset($create))
                    <form action="{{ route('system.blog.save') }}" method="POST">
                @else
                    <form action="{{ route('system.blog.update') }}" method="POST">
                    {{ html()->hidden('id')->class('form-control')->value($post->id) }}
                @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Naslov'))->for('title') }}</b>
                                {{ html()->text('title')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value(isset($post) ? $post->title : '')->isReadonly(isset($previewVar)) }}
                                <small id="titleHelp" class="form-text text-muted">{{ __('Naslov posta') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Kategorija'))->for('category') }}</b>
                                {{ html()->select('category', $category)->class('form-control form-control-sm mt-1')->required()->value(isset($post) ? $post->category : 24) }}
                                <small id="page_typeHelp" class="form-text text-muted">{{ __('Odaberite stranicu na koju objavljujete sadržaj') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Objavljeno'))->for('published') }}</b>
                                {{ html()->select('published', ['0' => 'Ne', '1' => 'Da'])->class('form-control form-control-sm mt-1')->required()->value(isset($post) ? $post->published : 24) }}
                                <small id="page_typeHelp" class="form-text text-muted">{{ __('Da li je post objavljen?') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Kratki opis'))->for('short_desc') }}</b>
                                {{ html()->textarea('short_desc')->class('form-control form-control-sm')->maxlength(320)->value("")->style('height:120px')->required()->value(isset($post) ? $post->short_desc : '')->isReadonly(false) }}
                                <small id="contentHelp" class="form-text text-muted">{{ __('Detaljni opis posta') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Detaljan opis'))->for('content') }}</b>
                                {{ html()->textarea('content')->class('form-control form-control-sm summernote')->maxlength(10000)->value("")->style('height:320px')->required()->value(isset($post) ? $post->content : '')->isReadonly(false) }}
                                <small id="contentHelp" class="form-text text-muted">{{ __('Detaljni opis posta') }}</small>
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

            @if(isset($post))
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
                                    <form action="{{ route('system.blog.update-image') }}" method="POST" id="update-main-image" enctype="multipart/form-data">
                                        @csrf
                                        {{ html()->hidden('id')->class('form-control')->value($post->id) }}
                                        <div class="card p-0 m-0 mt-3" title="{{ __('Nova fotografija za program (Rezolucija: 1280 x 560px)') }}">
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

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="card" title=" {{ __('Osnovne informacije') }} ">
                                <div class="card-body">
                                    <div class="col-md-12 d-flex justify-content-between">
                                        <h6 class="pt-2"> {{ __('Broj posjeta') }} </h6>
                                        <a href="#" class="pt-2">
                                            <small> <b>{{ $post->visits }}</b> </small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
