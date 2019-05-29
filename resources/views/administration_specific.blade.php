@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Administracija korisnika <a class="float-right" href="{{ url()->previous() }}">Nazad</a></div>

                <div class="card-body">
                    
                    <form method="post" action="{{ route('administration.save') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $user->id }}">

                        <div class="form-group">
                            <label for="ime_mail">Ime korisnika i email</label>
                            <input type="text" id="ime_mail" class="form-control" value="{{ $user->name }} ({{ $user->email }})" disabled>
                        </div>

                        <div class="form-group">
                            <label for="role">Uloga</label>
                            <select class="form-control" name="role" id="role">
                                <option value="nastavnik" @if($user->role == 'nastavnik') selected @endif>Nastavnik</option>
                                <option value="student" @if($user->role == 'student') selected @endif>Student</option>
                            </select> 
                        </div>

                        <button type="submit" class="btn btn-primary">Uredi</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
