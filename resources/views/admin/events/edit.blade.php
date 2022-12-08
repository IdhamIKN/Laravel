@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.event.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.events.update", [$event->id]) }}"
            method="POST"
            enctype="multipart/form-data"
            @if($event->events_count || $event->event) onsubmit="return confirm('Do you want to apply these changes to all future recurring events, too?');" @endif
        >
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('mobil') ? 'has-error' : '' }}">
                        <label for="name">Mobil</label>
                        <input type="text" id="mobil" name="mobil" class="form-control" value="{{ old('mobil', isset($event) ? $event->mobil : '') }}" required>
                        @if($errors->has('mobil'))
                            <em class="invalid-feedback">
                                {{ $errors->first('mobil') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.event.fields.name_helper') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('tujuan') ? 'has-error' : '' }}">
                        <label for="name">Tujuan</label>
                        <input type="text" id="tujuan" name="tujuan" class="form-control" value="{{ old('tujuan', isset($event) ? $event->tujuan : '') }}" required>
                        @if($errors->has('tujuan'))
                            <em class="invalid-feedback">
                                {{ $errors->first('tujuan') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.event.fields.name_helper') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.event.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($event) ? $event->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.event.fields.name_helper') }}
                </p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('start_time') ? 'has-error' : '' }}">
                        <label for="start_time">{{ trans('cruds.event.fields.start_time') }}*</label>
                        <input type="text" id="start_time" name="start_time" class="form-control datetime" value="{{ old('start_time', isset($event) ? $event->start_time : '') }}" required>
                        @if($errors->has('start_time'))
                            <em class="invalid-feedback">
                                {{ $errors->first('start_time') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.event.fields.start_time_helper') }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('end_time') ? 'has-error' : '' }}">
                        <label for="end_time">{{ trans('cruds.event.fields.end_time') }}*</label>
                        <input type="text" id="end_time" name="end_time" class="form-control datetime" value="{{ old('end_time', isset($event) ? $event->end_time : '') }}" required>
                        @if($errors->has('end_time'))
                            <em class="invalid-feedback">
                                {{ $errors->first('end_time') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('cruds.event.fields.end_time_helper') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Status</label>
                        <select name="status" id="status" class="custom-select">
                            @if ($event->status == '0')
                                <option selected value="0">Dipesan</option>
                                <option value="proses">Disewa</option>
                                <option value="selesai">Selesai</option>
                            @elseif($event->status == 'proses')
                                <option value="0">Dipesan</option>
                                <option selected value="proses">Disewa</option>
                                <option value="selesai">Selesai</option>
                            @else
                                <option value="0">Dipesan</option>
                                <option value="proses">Disewa</option>
                                <option selected value="selesai">Selesai</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    @if(!$event->event && !$event->events_count)
                    <div class="form-group {{ $errors->has('recurrence') ? 'has-error' : '' }}" hidden>
                        <label>{{ trans('cruds.event.fields.recurrence') }}*</label>
                        @foreach(App\Event::RECURRENCE_RADIO as $key => $label)
                            <div>
                                <input id="recurrence_{{ $key }}" name="recurrence" type="radio" value="{{ $key }}" {{ old('recurrence', $event->recurrence) === (string)$key ? 'checked' : '' }} required>
                                <label for="recurrence_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @if($errors->has('recurrence'))
                            <em class="invalid-feedback">
                                {{ $errors->first('recurrence') }}
                            </em>
                        @endif
                    </div>
                @else
                    <input type="hidden" name="recurrence" value="{{ $event->recurrence }}">
                @endif
                </div>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </div>




        </form>


    </div>
</div>
@endsection
