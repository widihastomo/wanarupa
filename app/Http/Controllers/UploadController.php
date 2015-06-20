<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use App\Photo;
use Illuminate\Support\Facades\Input;
use App\Artwork;
use App\Auction;
use Storage;
use File;
use Image;

class UploadController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $categories = \DB::table('ref_category')->lists('name', 'id');
        $styles = \DB::table('ref_style')->lists('name', 'id');
        $materials = \DB::table('ref_material')->lists('name','id');
        return view('upload', compact('categories','styles', 'materials'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(UploadRequest $request)
	{
        // Get All Input
        $input = $request->all();

        // Get Image Coordinate
        $w = $input['w'];
        $h = $input['h'];
        $x = $input['x'];
        $y = $input['y'];

        // Save input To Database

        $artwork = new Artwork;

        $artwork->user_id = \Auth::user()->id;
        $artwork->title = $input['title'];
        $artwork->category_id = $input['category_id'];
        $artwork->style_id = $input['style_id'];
        $artwork->width = $input['width'];
        $artwork->height = $input['height'];
        $artwork->dept = $input['dept'];
        $artwork->material_id = $input['material_id'];
        $artwork->is_auction = Input::get('is_auction', 0);
        $artwork->selling_price = $input['price'];
        $artwork->description = $input['description'];
        $artwork->status_id = 1;
        $artwork->save();

        //  Create Auction If is_auction = 1

        if ($artwork->is_auction = 1){
            $auction = new Auction;

            $auction->user_id = $artwork->user_id;
            $auction->artwork_id = $artwork->id;
            $auction->start_price = $input['start_price'];
            $auction->duplicate_price = $input['duplicate_price'];
            $auction->start_date = $input['start_date'];
            $auction->end_date = $input['end_date'];
            $auction->status_id = 1;

            $auction->save();
        }

        //Image Processing

        if ($request->hasFile('image')){

            //Get Image
            $image = $request->file('image');

            //Get and Set Image Attribute
            $filename = $image->getClientOriginalName();
            $extension = $image->getClientOriginalExtension();
            $newFilename = uniqid();

            // Crop Image
            $mediumSize = Image::make($image)->crop($w, $h, $x, $y)->resize(200, 200);
            $smallSize = Image::make($image)->crop($w, $h, $x, $y)->resize(100, 100);

            //Resize Image
           $mediumImage = $mediumSize->save($newFilename.$extension);
           $smallImage = $smallSize->save($newFilename.$extension);

            //Set Upload Path for different size
            $fullPath = '/upload/image/'.date('Y').'/'.date('m').'/'.date('d');
            $mediumPath = '/upload/thumbnail-medium/'.date('Y').'/'.date('m').'/'.date('d');
            $smallPath = '/upload/thumbnail-small/'.date('Y').'/'.date('m').'/'.date('d');

            //Move Image to Storage Folder based on size
            if (!Storage::disk('local')->exists($fullPath)){
                Storage::makeDirectory($fullPath);
            }
            else{
                Storage::disk('local')->put($fullPath.'/'.$newFilename.'.'.$extension,  File::get($image));
            }
            if (!Storage::disk('local')->exists($mediumPath)){
                Storage::makeDirectory($mediumPath);
            }
            else{
                Storage::disk('local')->put($mediumPath.'/'.$newFilename.'.'.$extension,  $mediumImage);
            }
            if (!Storage::disk('local')->exists($smallPath)){
                Storage::makeDirectory($smallPath);
            }
            else{
                Storage::disk('local')->put($smallPath.'/'.$newFilename.'.'.$extension,  $smallImage);
            }

            //Save Image Entry to Database
            $entry = new Photo();
            $entry->mime = $image->getClientMimeType();
            $entry->original_name = $image->getClientOriginalName();
            $entry->name = $newFilename.'.'.$extension;
            $entry->imageable_id = $artwork->id;
            $entry->imageable_type = 'App\Artwork';

            $entry->save();
        }

        return $newFilename;

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
}
