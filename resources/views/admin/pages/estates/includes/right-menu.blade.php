<div class="col-md-3 border-left">
    <div class="row">
        <div class="col-md-12">

            <div class="card" title=" {{ __('Osnovne informacije') }} ">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-between">
                            <h6 class="pt-1"> {{ __('Ostale informacije') }} </h6>
                            <a href="#">
                                <small><i class="fas fa-info"></i></small>
                            </a>
                        </div>
                        <hr class="mt-2">

                        <a href="{{ route('system.estates.insert-new-image', ['slug' => $estate->slug ]) }}" title="{{ __('Unesite novu fotografiju') }}">
                            <div class="col-md-12 d-flex justify-content-between">
                                <h6 class="pt-0"> {{ __('Fotografije') }} </h6>
                                <a href="#">
                                    <small><i class="fas fa-image"></i></small>
                                </a>
                            </div>
                        </a>
                        <div class="col-md-12 mt-2">
                            <ol>
                                @foreach($estate->imagesRel as $imageRel)
                                    <li>{{ $imageRel->fileRel->file ?? '' }}</li>
                                @endforeach
                            </ol>
                        </div>
                    </div>

                    <!-- Form for submit main image of estate -->
                    <form action="{{ route('system.estates.update-main-image') }}" method="POST" id="update-main-image" enctype="multipart/form-data">
                        @csrf
                        {{ html()->hidden('id')->class('form-control')->value($estate->id) }}
                        <div class="card p-0 m-0 mt-3" title="{{ __('Nova fotografija za program (Rezolucija: 600px x 440px)') }}">
                            <div class="card-body d-flex justify-content-between">
                                <label for="photo_uri" >
                                    <p class="m-0">{{ __('Ažurirajte fotografiju') }}</p>
                                </label>
                                <i class="fas fa-image mt-1"></i>
                            </div>
                            <input name="photo_uri" class="form-control form-control-lg d-none" id="photo_uri" type="file">
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('system.estates.google-map.edit-location', ['slug' => $estate->slug ]) }}">
                                <div class="btn btn-sm btn-info w-100 text-white">
                                    <b> {{ __('Google Map') }} </b>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
