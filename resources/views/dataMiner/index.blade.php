@extends('layouts.app')

@section('title', 'Recently mined Blocks')

@section('content')
<div class="container">
    <div class="row">
        <div class="jumbotron">
            <h1 class="display-4">Recently mined Blocks!</h1>
            <p class="lead">This is a simple example for template design pattern with dummy data.</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="bd-content mt-5 mb-5">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Miner</th>
                        <th scope="col">Time</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item->getNumber() }}</td>
                                <td>{{ $item->getMiner() }}</td>
                                <td>{{ $item->getTime()->format('d.m Y h:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
