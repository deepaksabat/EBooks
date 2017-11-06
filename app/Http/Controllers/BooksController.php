<?php

namespace App\Http\Controllers;
use App\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Category;
use DB;

class BooksController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$books = Book::paginate(10);
		//dd($books);
		return view('Book.index', compact('books'));
	}

	

	protected function validator(array $data) {
		return Validator::make($data, [
			'name' => 'required|max:255',
			'description' => 'required',
			'author' => 'required',
			'publisher' => 'required',
			'edition' => 'required',
			'pages' => 'required|numeric',
			'published' => 'required|date|date_format: Y-m-d',
			'posted' => 'required|date|date_format:Y-m-d',
			'language' => 'required',
			'bookformat' => 'required',
			'booksize' => 'required',
			'image' => 'required|image|mimes:jpeg,jpg,png',
			'book_fl' => 'required|mimes:pdf,chm,djvu,epub|max:50000',

		]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$category = Category::pluck('name','id');
		return view('Book.create', compact('category'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		
		// $validator = $this->validator($request->all());

		// if ($validator->fails()) {
		// 	$this->throwValidationException(
		// 		$request, $validator
		// 	);
		// }
		//dd($request->all());
		$book = new Book($request->input());
		if ($file = $request->hasFile('image')) {

			$file = $request->file('image');
			$fileName = $file->getClientOriginalName();
			$extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $explodeImgFileName = explode('.'.$extension,$fileName);
			
			//dd($explodeImgFileName);
			$file1 = $request->file('pdf');
			$bookfile = $explodeImgFileName[0] . '.' .
			$request->file('pdf')->getClientOriginalExtension();
			$book->image = $fileName;
			$book->pdf = $bookfile;
		}

		DB::beginTransaction();

            try
            {

                    $bookId = DB::table('books')->insertGetId(['name' => $book->name,'description'=>$book->description,'image'=>$book->image,'pdf'=>$book->pdf,'publisher'=>$book->publisher,'category_id'=>$book->category_id,'author'=>$book->author,'edition'=>$book->edition,'isbn'=>$book->isbn,'pages'=>$book->pages,'published'=>$book->published,'posted'=>$book->posted,'language'=>$book->language,'book_format'=>$book->book_format,'book_size'=>$book->book_size]);
                if($bookId)
                {
                    //dd(env('IMAGE_FOLDER_PATH', '/cdn'));
                    $destinationPath = public_path().'/book'.'/'.$bookId;
                    //dd($destinationPath);
                    //dd($xmlFileName.':'.$imgFileName);
                    $file->move($destinationPath, $fileName);

                    $file1->move($destinationPath, $bookfile);
                    DB::commit();
                    return \Redirect::route('books.index')->withSuccess('Successfully added');

                }

                }catch (\Throwable $e) {

                    File::delete(public_path().'/book'.'/'.$bookId);
                DB::rollback();
                throw $e;
                return redirect()->back()->withInput(\Request::all())->withWarning('failed');
                }
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$book = Book::find($id);
		$category = Category::pluck('name','id');
		return view('Book.edit', compact('book','category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$validator = $this->validator($request->all());

		if ($validator->fails()) {
			$this->throwValidationException(
				$request, $validator
			);
		}
		$book = Book::findOrFail($id);
		if ($file = $request->hasFile('image')) {

			$file = $request->file('image');

			$bookfile = $book->name . '.' .
			$request->file('book_fl')->getClientOriginalExtension();

			$request->file('book_fl')->move(
				public_path() . '/public/uploads', $bookfile
			);

			$fileName = $file->getClientOriginalName();
			$destinationPath = public_path() . '/images/';
			$file->move($destinationPath, $fileName);
			$book->image = $fileName;
			$book->book_fl = $bookfile;
		}
		DB::beginTransaction();

            try
            {
            	$book->save();
            	return \Redirect::route('books.index')->withSuccess('Successfully updated');
            }catch (\Throwable $e) {

                    File::delete(public_path().'/book'.'/'.$book->id);
                DB::rollback();
                throw $e;
                return redirect()->back()->withInput(\Request::all())->withWarning('failed');
                }
		
		

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
