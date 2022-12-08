@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.event.title') }}
        </div>

        <div class="card-body">
            <div class="mb-2">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.event.fields.id') }}
                            </th>
                            <td>
                                {{ $event->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Mobil
                            </th>
                            <td>
                                {{ $event->mobil }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.event.fields.name') }}
                            </th>
                            <td>
                                {{ $event->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                Tujuan
                            </th>
                            <td>
                                {{ $event->tujuan }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.event.fields.start_time') }}
                            </th>
                            <td>
                                {{ $event->start_time }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.event.fields.end_time') }}
                            </th>
                            <td>
                                {{ $event->end_time }}
                            </td>
                        </tr>
                        <tr>

                            <th>Status</th>
                            <td>
                                @if ($event->status == '0')
                                    <a href="" class="badge badge-warning">Dipesan</a>
                                @elseif($event->status == 'proses')
                                    <a href="" class="badge badge-dangger text-white">Disewa</a>
                                @else
                                    <a href="" class="badge badge-success">Selesai</a>
                                @endif
                            </td>

                        </tr>
                        {{-- <tr>
                        <th>
                            {{ trans('cruds.event.fields.recurrence') }}
                        </th>
                        <td>
                            {{ App\Event::RECURRENCE_RADIO[$event->recurrence] ?? '' }}
                        </td>
                    </tr> --}}
                        {{-- <tr>
                        <th>
                            {{ trans('cruds.event.fields.event') }}
                        </th>
                        <td>
                            {{ $event->event->name ?? '' }}
                        </td>
                    </tr> --}}
                    </tbody>
                </table>
                <a style="margin-top:20px;" class="btn btn-primary" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>

            <nav class="mb-3">
                <div class="nav nav-tabs">

                </div>
            </nav>
            <div class="tab-content">

            </div>
        </div>
    </div>
@endsection
