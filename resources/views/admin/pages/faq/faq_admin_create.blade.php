@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-question"></i> @endsection
@section('c-title') @if(isset ($create)) {{ __('Unos pitanja') }} @elseif(isset ($preview)){{ __('Pregled pitanja') }} @else {{ __('Uređivanje') }} @endif @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="#">{{ __('Analytics') }}</a>
@endsection
@section('c-buttons')
    <a href="#">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
    @if(isset ($preview))
    <a href="{{ route('system.faq.edit', ['id'=>$faq->id]) }}">
        <button class="pm-btn btn pm-btn-success">
            <i class="fas fa-edit"></i>
            <span>{{ __('Uredite') }}</span>
        </button>
    </a>
    @endif
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        <div class="row">
            <div class="col-md-12">
                @if(isset($create))
                    <form action="{{ route('system.faq.save') }}" method="POST">
                @elseif(isset($edit))
                    <form action="{{ route('system.faq.update') }}" method="POST">
                    <input name="id" value="{{$faq->id}}">
                @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Kategorija'))->for('category') }}</b>
                                {{ html()->select('category', $categories)->class('form-control form-control-sm mt-1')->required()->value((isset($faq) ? $faq->category : ''))->isReadonly(isset($preview)) }}
                                <small id="categoryHelp" class="form-text text-muted">{{ __('Odaberite kategoriju kojoj pripada pitanje') }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <b>{{ html()->label(__('Pitanje'))->for('question') }}</b>
                                {{ html()->text('question')->class('form-control form-control-sm mt-1')->required()->maxlength(100)->value((isset($faq) ? $faq->question : ''))->isReadonly(isset($preview)) }}
                                <small id="questionHelp" class="form-text text-muted">{{ __('Naziv pitanja') }}</small>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <b>{{ html()->label(__('Detaljan opis'))->for('answer') }}</b>
                                {{ html()->textarea('answer')->class('form-control form-control-sm')->maxlength(2000)->value((isset($faq) ? $faq->answer : ''))->style('height:160px')->required()->isReadonly(isset($preview)) }}
                                <small id="answerHelp" class="form-text text-muted">{{ __('Odgovor na pitanje') }}</small>
                            </div>
                        </div>
                    </div>

                    {{--<div class="row">--}}
                    {{--    <div class="col-md-12">--}}
                    {{--        <div class="form-group">--}}
                    {{--            {{ html()->label(__('Email'))->for('email')->class('bold') }}--}}
                    {{--            {{ html()->select('category', [1 => 1, 2 => 2], 1)->class('form-control form-control-sm')->required()->disabled(isset($preview)) }}--}}
                    {{--            <small id="categoryHelp" class="form-text text-muted">{{ __('Kategorija kojoj proizvod pripada') }}</small>--}}
                    {{--        </div>--}}
                    {{--    </div>--}}
                    {{--</div>--}}

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark btn-sm"> {{ __('SAČUVAJTE') }} </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

