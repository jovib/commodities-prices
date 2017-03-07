<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CommoditiesController extends Controller
{
    public function getGold()
    {
        return view('gold', [
            'gold' => DB::table('gold')->orderBy('Date','asc')->get()
        ]);
    }

    public function getCopper()
    {
        return view('copper', [
            'copper' => DB::table('copper')->orderBy('Date','asc')->get()
        ]);
    }

    public function getSilver()
    {
        return view('silver', [
            'silver' => DB::table('silver')->orderBy('Date','asc')->get()
        ]);
    }

    public function getIron()
    {
        return view('iron', [
            'iron' => DB::table('iron')->orderBy('Date','asc')->get()
        ]);
    }

    public function getOil()
    {
        return view('oil', [
            'oil' => DB::table('oil')->orderBy('Date','asc')->get()
        ]);
    }

    public function getGas()
    {
        return view('gas', [
            'gas' => DB::table('gas')->orderBy('Date','asc')->get()
        ]);
    }

    public function getCoffee()
    {
        return view('coffee', [
            'coffee' => DB::table('coffee')->orderBy('Date','asc')->get()
        ]);
    }

    public function getCorn()
    {
        return view('corn', [
            'corn' => DB::table('corn')->orderBy('Date','asc')->get()
        ]);
    }

}
