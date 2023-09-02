<?php 

namespace App\Service\FileService;

use App\Service\FileService\IFileService;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class FileService implements IFileService
{
  public function imageStorage($request, $destinationPath)
  {
    $fileName = Uuid::uuid4() . '.' . $request->file('image')->extension();
    $request->file('image')->storeAs($destinationPath, $fileName);
  }

  public function videoStorage($request, $destinationPath)
  {
    $fileName = Uuid::uuid4() . '.' . $request->file('video')->extension();
    $request->file('video')->storeAs($destinationPath, $fileName);
  }

  public function pdfStorage($request, $destinationPath)
  {
    $fileName = Uuid::uuid4() . '.' . $request->file('pdf')->extension();
    $file = $request->file('pdf')->storeAs($destinationPath, $fileName);

    return $file;
  }

  public function deleteFile($path, $fileName)
  {
    if (Storage::exists($path . $fileName)) {
      Storage::delete($path . $fileName);
    }
  }
}