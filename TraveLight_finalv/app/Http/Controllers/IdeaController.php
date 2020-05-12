<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\User;
use \App\Idea;

class IdeaController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ideas = Idea::all();
        return view('ideas.index', compact('ideas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title'=>'required',
            'destination'=>'required|alpha',
            'startdate'=>'required|date',
            'enddate'=>'required|date|after:startdate',
            'post_tag'=>'required',
            'description'=>'required'
        ]);

        $tags = preg_split( "/([^(a-zA-Z0-9\s]+)|(\s+)/", $request->post_tag);

        // delete the post_tag element from the $data array
        unset($data['post_tag']);

        $idea = auth()->user()->ideas()->create($data);

        $idea -> tag($tags);

        return redirect('/profile') ->with('success','Your paln has been saved!');
    }

    /**
     * Display the specified r esource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Idea $idea)
    {
        $user = Auth::user();
        return view('ideas.show', compact('idea','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Idea $idea)
    {
        return view('ideas.edit', compact('idea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Idea $idea)
    {
        $data = request()->validate([
            'title'=>'required',
            'destination'=>'required|alpha',
            'startdate'=>'required|date',
            'enddate'=>'required|date|after:startdate',
            'post_tag'=>'required',
            'description'=>'required'
        ]);

        $tags = preg_split( "/([^(a-zA-Z0-9\s]+)|(\s+)/", $request->post_tag);

        $idea->title = $data['title'];
        $idea->destination = $data['destination'];
        $idea->startdate = $data['startdate'];
        $idea->enddate = $data['enddate'];
        $idea->description = $data['description'];

        $idea->save();
        $idea->retag($tags);

        return redirect('/ideas/'. $idea->id) ->with('success','Your idea has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * Store a newly created idea in MySql database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request, $id)
    {
        if($request->ajax()) {
            $request->validate([
                'comments_content' => 'required|max:255'
            ]);

            $idea = Idea::find($id);
            $newcomment = "<p>". Auth::user()->name. ":<br/>";
            $newcomment.= $request->input('comments_content')."</p>";
            $newcomment.= $idea->comments_content;
            $idea->comments_content = $newcomment;
            $idea->comments_number += 1;
            $idea->save();
        }
    }

    public function updateComment(Request $request, $id)
    {
        if($request->ajax()) {
            return Response(Idea::find($id)->comments_number . "##" . Idea::find($id)->comments_content);
        }
    }
}
