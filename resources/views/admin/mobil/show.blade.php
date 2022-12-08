@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Detail Mobil
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Nama Mobil
                        </th>
                        <td>
                            {{ $mobil->mobil }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            No.Pol.
                        </th>
                        <td>
                            {{ $mobil->nopol }}
                        </td>
                    </tr>
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
