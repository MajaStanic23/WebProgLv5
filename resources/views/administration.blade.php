@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administracija korisnika <a class="float-right" href="{{ route('home') }}">Početna</a></div>

                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <ul>
                        @foreach ($users as $user)
                            <li><a href="{{ route('administration.specific', ['id' => $user->id]) }}">{{ $user->name }} ({{ $user->email }})</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
