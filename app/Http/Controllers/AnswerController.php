<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$answers = Answer::orderBy('id', 'desc')->paginate(10);

		return view('answers.index', compact('answers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('answers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		
		// $rules = array(            
  //           'description'      => 'required'
  //    	 );
  //     	$validator = $this->validate($request, $rules);

      	$answer = new Answer();
      	$answer->description = $request->description;

		$answer->save();

		return redirect()->route('answers.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$answer = Answer::findOrFail($id);

		return view('answers.show', compact('answer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$answer = Answer::findOrFail($id);

		return view('answers.edit', compact('answer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$answer = Answer::findOrFail($id);

		

		$answer->save();

		return redirect()->route('answers.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$answer = Answer::findOrFail($id);
		$answer->delete();

		return redirect()->route('answers.index')->with('message', 'Item deleted successfully.');
	}

}
