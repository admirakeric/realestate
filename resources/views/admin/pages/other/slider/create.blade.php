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
            <div class="col-md-12 ">
                <form action="{{ route('system.slider.save') }}" method="POST" id="update-main-image" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Naslov'))->for('title') }}</b>
                                {{ html()->text('title')->class('form-control form-control-sm mt-1')->required()->maxlength(35) }}
                                <small id="titleHelp" class="form-text text-muted">{{ __('Naslov posta') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Kratki opis'))->for('description') }}</b>
                                {{ html()->textarea('description')->class('form-control form-control-sm mt-1')->required()->maxlength(250) }}
                                <small id="descriptionHelp" class="form-text text-muted">{{ __('Kratki opis') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card p-0 m-0 mt-3" title="{{ __('Nova fotografija za program (Rezolucija: 1920 x 820px)') }}">
                                <div class="card-body d-flex justify-content-between">
                                    <label for="desktop_img" >
                                        <p class="m-0">{{ __('Dekstop image') }}</p>
                                    </label>
                                    <i class="fas fa-image mt-1"></i>
                                </div>
                                <input name="desktop_img" class="form-control form-control-lg d-none" id="desktop_img" type="file">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card p-0 m-0 mt-3" title="{{ __('Nova fotografija za program (Rezolucija: 720 x 960px)') }}">
                                <div class="card-body d-flex justify-content-between">
                                    <label for="mobile_img" >
                                        <p class="m-0">{{ __('Mobile image') }}</p>
                                    </label>
                                    <i class="fas fa-image mt-1"></i>
                                </div>
                                <input name="mobile_img" class="form-control form-control-lg d-none" id="mobile_img" type="file">
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Link'))->for('link') }}</b>
                                {{ html()->text('link')->class('form-control form-control-sm mt-1')->required()->maxlength(200) }}
                                <small id="linkHelp" class="form-text text-muted">{{ __('Poveznica ili link') }}</small>
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
{{--                                            <small> <b>{{ $post->visits }}</b> </small>--}}
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
