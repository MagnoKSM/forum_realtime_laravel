@extends('layouts.default')

@section('content')
    <div class="container">
        <h3>{{ $result->title }}</h3>
        <div class="card grey lighten-4">
            <div class="card-content">
                {{ $result->body }}
            </div>
            <div class="card-action">
                @if(\Auth::user()->can('update', $result))
                    <a href="/threads/{{$result->id}}/edit">Edit</a>
                @endif
               
                <a href="/">Back</a>
            </div>
        </div>

        <replies>
            @include('layouts.default.preloader')
        </replies>
    </div>
@endsection

@section('scripts')
    <script src="/js/replies.js"></script>
@endsection
