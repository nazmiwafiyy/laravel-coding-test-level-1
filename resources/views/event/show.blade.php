@extends('layouts.main')
@section('content')

    <div class="row pt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    Name : {{$event->name}}<br>
                    Slug : {{$event->slug}}<br>
                    Start Date: {{$event->start_at}}<br>
                    Start Date: {{$event->end_at}}<br>
                </div>
            </div>
        </div>
    </div>

@endsection
