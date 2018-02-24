@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ ($event->id) ? 'Edit' : 'Add' }} Event</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger margin-10px margin-top-0px">
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        @if ($event->id)

                            {{ Form::model($event, ['route' => [ 'event.update', $event->id], 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) }}

                            {{ method_field('PUT') }}

                        @else

                            {{ Form::model($event, ['route' => [ 'event.store'], 'method' => 'post', 'class' => 'form-horizontal', 'role' => 'form']) }}

                        @endif

                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                {{ Form::text('title', $event->title, ['class' => 'form-control', 'autocomplete' => 'off', 'autofocus', 'placeholder' => 'Title']) }}

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                {{ Form::text('date', $event->date, ['class' => 'form-control', 'autocomplete' => 'off', 'placeholder' => 'Date', 'v-datepicker']) }}

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection