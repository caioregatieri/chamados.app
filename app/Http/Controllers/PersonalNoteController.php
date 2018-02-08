<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entities\PersonalNote\PersonalNote;
use App\Http\Requests\PersonalNoteRequest;

use Auth;

class PersonalNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = PersonalNote::where('user_id', Auth::user()->id);

        $filter = isset($_GET['search']) ? trim($_GET['search']) : '';
        if($filter != ''){
            $notes = $notes->where('title','like','%'. $filter .'%');
        }

        $notes = $notes->paginate(10);

        return view('personalnotes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personalnotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonalNoteRequest $request)
    {
        $data = $request->all();
        $note = PersonalNote::create($data);
        if($note){
            \Session::flash('created', $note);
            return redirect()->route('personalnotes.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = PersonalNote::find($id);
        if($note){
            if($note->user_id != Auth::user()->id){
                \Session::flash('error', 'Voce esta tentando acessar uma nota que não é sua!');
                return redirect()->back();
                exit;
            }
            return view('personalnotes.show', compact('note'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $note = PersonalNote::find($id);
        if($note){
            if($note->user_id != Auth::user()->id){
                \Session::flash('error', 'Voce esta tentando acessar uma nota que não é sua!');
                return redirect()->back();
                exit;
            }
            return view('personalnotes.edit', compact('note'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonalNoteRequest $request, $id)
    {
        $data = $request->all();
        $note = PersonalNote::find($id)->update($data);
        if($note){
            \Session::flash('updated', $note);
            return redirect()->route('personalnotes.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $note = PersonalNote::find($id);
        if($note){
            if($note->user_id != Auth::user()->id){
                \Session::flash('error', 'Voce esta tentando acessar uma nota que não é sua!');
                return redirect()->back();
                exit;
            }
            $note->delete();
            return redirect()->route('personalnotes.index');
        }
    }
}
