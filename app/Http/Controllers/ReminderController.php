<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entities\Reminder\Reminder;
use App\Http\Requests\ReminderRequest;

class ReminderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reminders = new Reminder;

        $filter = isset($_GET['search']) ? trim($_GET['search']) : '';
        if($filter != ''){
            $reminders = $reminders->where('name','like','%'.$filter.'%');
        }

        $reminders = $reminders->paginate(10);
      
        return view('reminders.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reminders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReminderRequest $request)
    {
        $reminder = Reminder::create($request->all());
        if($reminder)
            return redirect()->route('reminders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reminder = Reminder::find($id);
        if($reminder)
            return view('reminders.show', compact('reminder'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reminder = Reminder::find($id);
        if($reminder)
            return view('reminders.edit', compact('reminder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReminderRequest $request, $id)
    {
        $reminder = Reminder::find($id)->update($request->all());
        if($reminder)
            return redirect()->route('reminders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reminder = Reminder::find($id)->delete();
        if($reminder)
            return redirect()->route('reminders.index');
    }
}
