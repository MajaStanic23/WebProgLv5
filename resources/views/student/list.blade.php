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
                            <li><a href="{{ route('student.preview', ['id' => $task->id]) }}">{{ $task->naziv_rada }}</a> @if($task->student_id != null) <b>ZAUZETO<b> @endif</li>
                        @endforeach
                    </ul>

                    <p>Prijave po prioritetima</p>

                    <ul>
                        @if(count($on_tasks) > 0)
                            @foreach ($on_tasks as $task)
                                <li>{{ $task->naziv_rada }} (<b>Prioritet {{ $task->pivot->priority }}</b>)</li>
                            @endforeach
                        @else
                            Nema prijava
                        @endif
                    </ul>

                    @if(count($on_tasks) < 5)

                        <p>Prijave na rad prioriteta {{ (count($on_tasks)+1) }}</p>

                        <form method="post" action="{{ route('student.enroll') }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="priority" value="{{ (count($on_tasks)+1) }}">

                            <div class="form-group">
                                <label for="task_id">Odaberite rad</label>
                                <select class="form-control" name="task_id" id="task_id">
                                    @foreach ($tasks as $task)
                                       
                                        @if($task->student_id != null || $on_tasks->contains($task->id))
                                            {{-- Do Nothing --}}
                                        @else
                                            <option value="{{ $task->id }}">{{ $task->naziv_rada }}</option>
                                        @endif

                                    @endforeach
                                </select> 
                            </div>

                            <button type="submit" class="btn btn-primary">Prijavi se</button>
                        </form>

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
