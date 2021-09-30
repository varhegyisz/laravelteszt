<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CounterController extends Controller
{

    public function index(Request $request) {

        try {
            $counter = Counter::whereDate('created_at', Carbon::now())->firstOrFail();
            $counter->increment('counter');
        } catch (ModelNotFoundException $e) {
            $counter = Counter::create([
                'counter' => 1
            ]);
        }

        return view('welcome', ['counter' => $counter]);

    }

}
