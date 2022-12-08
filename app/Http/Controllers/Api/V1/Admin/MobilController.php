<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMobilRequest;
use App\Http\Requests\StoreMobilRequest;
use App\Http\Requests\UpdateMobilRequest;
use App\Mobil;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MobilController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('mobil_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mobil = Mobil::all();

        return view('admin.mobil.index', compact('mobil'));
    }

    public function create()
    {
        abort_if(Gate::denies('mobil_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mobil.create');
    }

    public function store(StoreMobilRequest $request)
    {
        $mobil = Mobil::create($request->all());

        return redirect()->route('admin.mobil.index');
    }

    public function edit(mobil $mobil)
    {
        abort_if(Gate::denies('mobil_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mobil.edit', compact('mobil'));
    }

    public function update(UpdateMobilRequest $request, Mobil $mobil)
    {
        $mobil->update($request->all());

        return redirect()->route('admin.mobil.index');
    }

    public function show(Mobil $mobil)
    {
        abort_if(Gate::denies('mobil_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.mobil.show', compact('mobil'));
    }

    public function destroy(Mobil $mobil)
    {
        abort_if(Gate::denies('mobil_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mobil->delete();

        return back();
    }

    public function massDestroy(MassDestroyMobilRequest $request)
    {
        Mobil::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
