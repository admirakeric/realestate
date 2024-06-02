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


                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="#">
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
