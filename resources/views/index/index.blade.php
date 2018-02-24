@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Events Management</div>
                    <div>
                        <div>

                            @if (session('status'))
                                <div class="alert alert-success m10">
                                    {{ session('status') }}
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="alert alert-danger m10">
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                </div>
                            @endif

                            @if (count($events) > 0)
                                <table class="table table-striped media">
                                    <tr>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Date</th>
                                        <th width="300"></th>
                                    </tr>
                                    @foreach($events as $event)
                                        <tr>
                                            <td class="text-center">{{ $event->title }}</td>
                                            <td class="text-center">{{ $event->date }}</td>
                                            <td>
                                                <div class="pull-left">
                                                    <a href="{{ route('event.edit', $event->id ) }}">
                                                        <i class="glyphicon glyphicon-pencil"></i> Edit Event
                                                    </a>
                                                </div>
                                                <div class="pull-left ml10">
                                                    {{ Form::model($event, ['route' => [ 'event.destroy', $event->id]]) }}

                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" class="btn btn-xs btn-danger">
                                                        <i class="glyphicon glyphicon-trash"></i> Delete Event
                                                    </button>

                                                    {{ Form::close() }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            @else
                                <p class="title panel-body">The list of events is clear!</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <div v-calendar></div>
            </div>
        </div>
    </div>
@endsection