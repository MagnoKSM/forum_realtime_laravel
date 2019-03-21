@extends('layouts.default')

@section('content')
    <div class="container">
        <h3>{{ __('Most Recent Threads') }}</h3>
        <threads>
            @include('layouts.default.preloader')
        </threads>
    </div>
@endsection

@section('scripts')
    <script src="/js/threads.js"></script>
@endsection
