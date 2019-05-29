@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pregled rada <a class="float-right" href="{{ route('home') }}">Početna</a></div>

                <div class="card-body">
                    
                    <p>Naziv rada: <br><b>{{ $task->naziv_rada }}</b></p>
                    <p>Naziv rada na engleskom: <br><b>{{ $task->naziv_rada_na_engleskom }}</b></p>
                    <p>Zadatak rada: <br><i>{{ $task->zadatak_rada }}</i></p>
                    <p>Tip studija: <br><b>{{ $task->tip_studija }}</b></p>

                    @if($task->student_id != null)

                        <p>Prihvaćeni student: <br><b>{{ $task->student->name }} ({{ $task->student->email }})</b></p>

                    @else

                        @if (!isset($student) && $task->nastavnik_id == Auth::id())
                            <p>Prijave</p>

                            <table>
                                <thead>
                                    <tr>
                                        <th>Podaci</th>
                                        <th>Akcije</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($task->applications as $application)
                                    <tr>
                                        <td>
                                            {{ $application->name }} ({{ $application->email }}) (<b>Prioritet {{ $application->pivot->priority }}</b>)
                                        </td>
                                        <td>
                                            @if($application->pivot->priority == 1)
                                                <form method='post' action="{{ route('task.approve') }}">
                                                    {{ csrf_field() }}
                                                    <input type="hidden" name="id" value="{{ $application->id }}">
                                                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                                                    <button type="submit" class="btn btn-primary">Prihvati</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif

                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
