@extends('layouts.app')
@section('content')
    @auth('web')
        <div class="clearfix pt-4">
            <div class="float-md-right float-lg-right">
                <a href="{{ route('event.create') }}" class="btn btn-primary btn-sm">New Event</a>
            </div>
        </div>
    @endauth
    <div class="row pt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Start At</th>
                                <th scope="col">End At</th>
                                <th scope="col" class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php $row = 1 @endphp
                                @foreach ($events as $event)
                                <tr>
                                    <th scope="row">{{ $row++ }}</th>
                                    <td>{!! $event->name !!}</td>
                                    <td>{!! $event->slug !!}</td>
                                    <td>{!! $event->start_at !!}</td>
                                    <td>{!! $event->end_at !!}</td>
                                    <td width="20%" class="text-center">
                                        <a href="{{route('event.show', $event->id)}}" class="btn btn-sm btn-info text-white">View</a>
                                        @auth('web')
                                            <a href="{{route('event.edit', $event->id)}}" class="btn btn-sm btn-secondary">Edit</a>
                                            {!! Form::open( ['method' => 'delete', 'url' => route('event.destroy',  $event->id), 'style' => 'display: inline']) !!}
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            {!! Form::close() !!}
                                        @endauth
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $events->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

@endsection