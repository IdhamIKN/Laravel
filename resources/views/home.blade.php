@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Dashboard
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Selamat Datang !
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group {{ $errors->has('mobil') ? 'has-error' : '' }}">
                                        <select name="mobil" id="mobil" class="form-control" required>
                                            <option value="" readonly>Pilih Mobil</option>
                                            @foreach ($mobil as $v)
                                                <option value="{{ $v->mobil }}">{{ $v->mobil }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('mobil'))
                                            <em class="invalid-feedback">
                                                {{ $errors->first('mobil') }}
                                            </em>
                                        @endif
                                    </div>
                                </div>
                                <div>
                                    <input class="btn btn-danger" type="submit" value="Tampilkan">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <link rel='stylesheet'
                            href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

                        <div id='calendar'></div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
    <script>
        $(document).ready(function() {
            // page is now ready, initialize the calendar...
            events = {!! json_encode($events) !!};
            $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: events,


            })
        });
    </script>
@endsection
