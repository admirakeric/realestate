@extends('admin.layout.layout')

<!----------------------------------------------- Define page header -------------------------------------------------->

@section('c-icon') <i class="fas fa-key"></i> @endsection
@section('c-title') {{ __('Pregled šifarnika') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.settings.keywords') }}"> {{ __('Lista šifarnika') }} </a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.settings.keywords') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
@endsection
<!--------------------------------------------------------------------------------------------------------------------->


@section('content')
    <div class="content-wrapper content-wrapper-bs">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th width="80px" class="text-center">{{ __('#') }}</th>
                <th>{{ __('Vrsta šifarnika') }}</th>
                <th width="120px" class="akcije text-center">{{__('Akcije')}}</th>
            </tr>
            </thead>
            <tbody>
            @php $i=1; @endphp
            @foreach($keywords as $key => $val)
                <tr>
                    <td class="text-center">{{ $i++}}</td>
                    <td> {{ $val ?? ''}} </td>

                    <td class="text-center">
                        <a href="{{ route('system.settings.keywords.preview-instances', ['key' => $key]) }}" title="{{ __('Više informacija') }}">
                            <button class="btn btn-dark btn-xs">{{ __('Više info') }}</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            {{--            @foreach($questions as $question)--}}
            {{--                <tr>--}}
            {{--                    <td class="text-center">{{ $i++}}</td>--}}
            {{--                    <td> {{ $user->name ?? ''}} </td>--}}
            {{--                    <td> {{ $user->email ?? ''}} </td>--}}
            {{--                    <td> {{ $user->phone ?? ''}} </td>--}}
            {{--                    <td> {{ $user->address ?? ''}} </td>--}}
            {{--                    <td> {{ $user->city ?? ''}} </td>--}}
            {{--                    <td> {{ $user->countryRel->name ?? '' }} </td>--}}

            {{--                    <td class="text-center">--}}
            {{--                        <a href="{{ route('system.users.preview-user', ['username' => $user->username ]) }}" title="{{ __('Više informacija') }}">--}}
            {{--                            <button class="btn btn-dark btn-sm">{{ __('Pregled') }}</button>--}}
            {{--                        </a>--}}
            {{--                    </td>--}}
            {{--                </tr>--}}
            {{--            @endforeach--}}
            </tbody>
        </table>
    </div>
@endsection
