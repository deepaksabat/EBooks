<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Category;
use DB;
use App\ContactUs;


class PageController extends Controller
{
    //

    public function getHome()
    {
    	$book = Book::latest()->paginate(5);
    	return view('Front.home',compact('book'));
    }

    public function getBookdetails($id)
	{
		$book = Book::find($id);
		return view('Front.show',compact('book'));
	}

	public function bookDownlode($id)
	{
		$book = Book::find($id);
		$myFile = public_path().'/book'.'/'.$id.'/'.$book->pdf;
		$str = str_replace('\\', '/', $myFile);
		// dd($str);
    	$headers = ['Content-Type: application/pdf'];
    	$newName = 'itsolutionstuff-pdf-file-'.time().'.pdf';

    	return response()->download($str, $newName, $headers);
	}

	public function getContact()
    {
    	return view('Front.contactus');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required',

        ]);
    }

    public function postContactStore(Request $request)
    {
    	//dd($request->all());
    	$validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

    	$contact = ContactUs::create($request->all());

    	return redirect()->back()->with('message', 'Thanks for Your Feedback ');
    }
	public function getUpload()
	{

	}
	public function postUpload(Request $request)
	{

	}
	public function getAllCategory()
	{

	}
}
