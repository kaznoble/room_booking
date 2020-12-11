<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments As Comments;

class CommentsController extends Controller
{
    public function __construct(Comments $comments)
  	{
  		$this->comment = $comments;
  	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($room_id, Request $request)
    {
        //
        $data = [];

        if ( $request->isMethod('POST') ) {
          $this->validate(
    				$request,
    				[
    					'comment' => 'required',
    				]
    			);

          $data['comment'] = $request->input('comment');
          $data['room_id'] = $room_id;
          $this->comment->insert($data);
          return redirect('/room/' . $room_id);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = [];

        $comment_data = $this->comment->find($id);

        if ($request->isMethod('post') )
        {
            $comment_data->comment = $request->input('comment');

            $comment_data->save();
            return redirect('rooms');
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
        //
    }
}
