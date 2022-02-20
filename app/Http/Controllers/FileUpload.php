<?php
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\File;
use Illuminate\Support\Facades\Response;

class FileUpload extends Controller
{
    public function createForm(){
        return view('file-upload');
    }
    public function fileUpload(Request $req){
        $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);
        $fileModel = new File;
        if($req->file()) {
            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath1 = $req->file('file')  ;
            $filePath = $req->file('file')  ->storeAs('uploads/'. $fileName, 'public');
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path =   $filePath;
            $fileModel->save();
            return Response::make(file_get_contents($filePath1), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$fileName.'"'
            ]);
        }
    }
    public function show()
    {

    }

}
