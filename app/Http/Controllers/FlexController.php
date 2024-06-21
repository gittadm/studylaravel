<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Message;
use Illuminate\Http\Request;

class FlexController extends Controller
{
    public function index()
    {
        $projectCount = Car::count();
        $cars = Car::limit(4)->orderBy('id', 'desc')->get();

        return view('flex.index',
                    compact('projectCount', 'cars'));
    }

    public function storeForm(Request $request)
    {
        //dd($request->all());

        $message = new Message();

        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->description = $request->message;

        $message->save();

        return redirect()->route('flex.index');
    }
}
