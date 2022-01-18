<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class FileController extends Controller
{
    protected function save_file_data(Request $requestImage, $image, $folderName){
        $imageName = $image->getClientOriginalName();
        return $image->storeAs($folderName, $imageName);
    }
    protected function replace_file_data(Request $request, $image, $folderName, $oldImagePath){
        try{
            unlink($oldImagePath);
        }
        catch(Exception $e){}
        return $this->save_file_data($request, $image, $folderName);
    }
}
