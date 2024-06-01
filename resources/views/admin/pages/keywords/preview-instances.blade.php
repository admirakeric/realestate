@extends('admin.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('ph-icon') <i class="fas fa-key"></i> @endsection
@section('ph-main') {{ __('Instance šifarnika') }} @endsection
@section('ph-short')
    {{__('Instance (vrijednosti) šifarnika: ')}} <span class="text-info">{{ $keyword }}</span>
    | <a href="{{ route('system.settings.keywords.new-instance', ['key' => $key]) }}">{{ __('Unos instance') }}</a>
@endsection

@section('ph-navigation')
    / <a href="{{ route('system.settings.keywords') }}"> {{ __('Pregled šifarnika') }} </a>
    / <a href="#">{{ __('Instance šifarnika') }}</a>
@endsection

<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        @include('admin.layout.snippets.filters.filters', ['var' => $instances])

        <table class="table table-bordered" id="filtering">
            <thead>
            <tr>
                <th scope="col" style="text-align:center;">#</th>
                @include('admin.layout.snippets.filters.filters_header')
                <th width="120p" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>

            @php $i=1; @endphp
            @foreach($instances as $instance)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $instance->value ?? ''}} </td>
                    <td> {{ $instance->description ?? ''}} </td>
                    <td class="text-center" width="180px"> {{ $instance->special_value ?? ''}} </td>

                    <td class="text-center">
                        <a href="{{ route('system.settings.keywords.edit-instance', ['id' => $instance->id ]) }}" title="{{ __('Više informacija') }}">
                            <button class="btn btn-dark btn-sm">{{ __('Pregled') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
