<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class UploadController extends Controller
{
    public function tempImage(Request $request){

    	$image = $request->file('image');

    	//Move Uploaded File
		$destinationPath = 'files/temp/'.date('Y-m-d').'temporary/';
		$image->move($destinationPath,$image->getClientOriginalName());


		// Storage::move($destinationPath,$image->getClientOriginalName());

		return $destinationPath.$image->getClientOriginalName();
    }

    public function imageUpload($baseUrl, $imgUrl){

    	if (!file_exists($baseUrl) && !is_dir($baseUrl)) {
		    mkdir($baseUrl, 0777, true);         
		}

    	$filename = basename($imgUrl);

    	$newfile = $baseUrl.$filename;

    	// php
    	rename($imgUrl, $newfile);

    	return $newfile;
    }

    public function deleteTemp($url){

    }

    public function migrateToPermaLoc($type, $imgUrl){

    }
}
