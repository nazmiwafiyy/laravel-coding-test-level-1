@extends('layouts.main')
@section('content')

    <div class="row pt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['route' => ['event.update',$event->id],'method' => 'PUT']) !!}
                    @include('event._form')
                    <div class="clearfix">
                        <div class="float-right">
                            {!! Form::button('<i class="fa fa-check"></i> Save', ['type' => 'submit', 'class' => 'btn btn-primary btn-sm','id'=>'save-button'] )  !!}
                        </div>
                    </div>
                   
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
    $('.date').datepicker({
        format: "yyyy-mm-dd"
    });
@endsection