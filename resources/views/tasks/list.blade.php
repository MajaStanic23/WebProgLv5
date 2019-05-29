@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pregled radova <a class="float-right" href="{{ route('home') }}">Početna</a></div>

                <div class="card-body">
                    
                    <ul>
                        @foreach ($tasks as $task)
                            <li><a href="{{ route('task.specific', ['id' => $task->id]) }}">{{ $task->naziv_rada }}</a></li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
