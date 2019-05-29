@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('tasks.page_title') <a class="float-right" href="{{ url()->previous() }}">@lang('tasks.back')</a></div>

                <div class="card-body">

                    @if($locale == 'hr')
                        <a href="{{ route('task.new', ['locale' => 'en']) }}">Engleski</a>
                    @else
                        <a href="{{ route('task.new') }}">Croatian</a>
                    @endif

                    <br><br>
                    
                    <form method="post" action="{{ route('task.create') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="nastavnik_id" value="{{ Auth::id() }}">

                        <div class="form-group">
                            <label for="naziv_rada">@lang('tasks.title')</label>
                            <input type="text" class="form-control" id="naziv_rada" name="naziv_rada" required>
                        </div>

                        <div class="form-group">
                            <label for="naziv_rada_na_engleskom">@lang('tasks.title_english')</label>
                            <input type="text" class="form-control" id="naziv_rada_na_engleskom" name="naziv_rada_na_engleskom" required>
                        </div>

                        <div class="form-group">
                            <label for="zadatak_rada">@lang('tasks.task')</label>
                            <textarea class="form-control" id="zadatak_rada" name="zadatak_rada" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="tip_studija">@lang('tasks.degree_type')</label>
                            <select class="form-control" name="tip_studija" id="tip_studija">
                                <option value="strucni">@lang('tasks.sepcialist')</option>
                                <option value="preddiplomski">@lang('tasks.bacc')</option>
                                <option value="dimlomski">@lang('tasks.master')</option>
                            </select> 
                        </div>

                        <button type="submit" class="btn btn-primary">@lang('tasks.create')</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
