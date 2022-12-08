@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Tambah Data Mobil
    </div>

    <div class="card-body">
        <form action="{{ route("admin.mobil.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('mobil') ? 'has-error' : '' }}">
                <label for="title">Nama Mobil</label>
                <input type="text" id="mobil" name="mobil" class="form-control" value="{{ old('mobil', isset($mobil) ? $mobil->title : '') }}" required>
                @if($errors->has('mobil'))
                    <em class="invalid-feedback">
                        {{ $errors->first('mobil') }}
                    </em>
                @endif

            </div>
            <div class="form-group {{ $errors->has('nopol') ? 'has-error' : '' }}">
                <label for="title">No.Pol.</label>
                <input type="text" id="nopol" name="nopol" class="form-control" value="{{ old('nopol', isset($mobil) ? $mobil->title : '') }}" required>
                @if($errors->has('nopol'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nopol') }}
                    </em>
                @endif

            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
