<?php
namespace App\Http\Controllers;

use App\Models\FileUpload;
use App\Trait\FileUploadTrait;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    use FileUploadTrait;
    public function store(Request $request)
    {

        $data = $request->all();

        // Handle file upload
        $fileName = $this->uploadFile($request, 'file', 'uploads/file');
        if ($fileName) {
            $data['file'] = $fileName;
        }

       
        $fileupload = FileUpload::create($data);

        return response()->json([
            'data' => $fileupload,
            'message' => 'File uploaded successfully',
            'status' => 'success',
        ]);
    }
}
