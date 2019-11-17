@extends('layouts.app')

@section('content')
    <div class="container">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Template design pattern example</h1>
                <p class="lead text-muted"></p>

                <p>
                    <a href="{{ route('dataMiner.index') }}" class="btn btn-primary my-2">Go to Enter</a>
                </p>
            </div>
        </section>
    </div>
@endsection
