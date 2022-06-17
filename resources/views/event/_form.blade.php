<div class="form-group row">
    {!! Form::label('name', 'Name',['class' => 'col-md-2']) !!}
    {!! Form::text('name', isset($event) ? $event->name : old('name'), ['class' => 'form-control col-md-10', 'placeholder' => 'Event name']) !!}
    @if ($errors->has('name')) <small class="help-block text-danger col-md-12">{{ $errors->first('name') }}</small> @endif
</div>
<div class="form-group row">
    {!! Form::label('name', 'Start Date',['class' => 'col-md-2']) !!}
    {!! Form::text('start_at', isset($event) ? $event->start_at : old('start_at'), ['class' => 'form-control col-md-10 date', 'placeholder' => 'Event start date']) !!}
    @if ($errors->has('start_at')) <small class="help-block text-danger col-md-12">{{ $errors->first('start_at') }}</small> @endif
</div>
<div class="form-group row">
    {!! Form::label('name', 'End Date',['class' => 'col-md-2']) !!}
    {!! Form::text('end_at', isset($event) ? $event->start_at : old('end_at'), ['class' => 'form-control col-md-10 date', 'placeholder' => 'Event End date']) !!}
    @if ($errors->has('end_at')) <small class="help-block text-danger col-md-12">{{ $errors->first('end_at') }}</small> @endif
</div>