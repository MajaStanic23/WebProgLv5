@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (Auth::user()->role == 'admin')
                        <a href="{{ route('administration') }}">Administracija korisnika</a>
                    @endif

                    @if (Auth::user()->role == 'nastavnik')
                        <a href="{{ route('task.new') }}">Kreiraj rad</a>
                        <br><a href="{{ route('task.list') }}">Pregled radova i prijava</a>
                    @endif

                    @if (Auth::user()->role == 'student')
                        <a href="{{ route('student.list') }}">Pregledaj i prijavi se</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
