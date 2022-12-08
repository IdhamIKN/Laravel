<?php

namespace App\Http\Controllers\Admin;
use App\Mobil;

class HomeController
{
    // public function index()
    // {
    //     return view('home');
    // }
    public $sources = [
        [
            'model'      => '\\App\\Event',
            'date_field' => 'start_time',
            'end_field'  => 'end_time',
            'name'      => 'name',
            'mobil'      => 'mobil',
            'tujuan'      => 'tujuan',
            'prefix'     => '',
            'suffix'     => '',
            'route'      => 'admin.events.edit',
        ],
    ];

    public function index()
    {
        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] $mobil = Mobil::all();. " " . $model->{$source['mobil']} . "/"  . $model->{$source['name']} . "/"  . $model->{$source['tujuan']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'end'   => $model->{$source['end_field']},
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        $mobil = Mobil::all();

        return view('home',['mobil' => $mobil], compact('events', 'mobil'));
    }

    public function awal()
    {
        $events = [];

        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getOriginal($source['date_field']);

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . " " . $model->{$source['mobil']} . "/"  . $model->{$source['name']} . "/"  . $model->{$source['tujuan']}
                        . " " . $source['suffix']),
                    'start' => $crudFieldValue,
                    'end'   => $model->{$source['end_field']},
                    // 'url'   => route($source['route'], $model->id),
                ];
            }
        }

        $mobil = Mobil::all();

        return view('index',['mobil' => $mobil], compact('events', 'mobil'));
    }
}
