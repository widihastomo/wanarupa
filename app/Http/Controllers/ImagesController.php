<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Http\Response;
use App\Photo;
use DateTime;

class ImagesController extends Controller {

    public function get($filename, $type){
        // Get Record from Database
        $image = Photo::where('name', '=', $filename)->firstOrFail();

        // Get Date Part of Image
        $datetime = new DateTime($image->created_at);
        $date = $datetime->format('d');
        $month = $datetime->format('m');
        $year = $datetime->format('Y');

        // Filtering Image Type
        if($type == "full-size"){
            $path = '/upload/image/'.$year.'/'.$month.'/'.$date;
        }
        elseif($type == "medium-size"){
            $path = '/upload/thumbnail-medium/'.$year.'/'.$month.'/'.$date;
        }
        else{
            $path = '/upload/thumbnail-small/'.$year.'/'.$month.'/'.$date;
        }
        $file = Storage::disk('local')->get($path.'/'.$image->name);

        return (new Response($file, 200))
            ->header('Content-Type', $image->mime);
    }

}
