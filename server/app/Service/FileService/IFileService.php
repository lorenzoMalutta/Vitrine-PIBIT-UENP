<?php
namespace App\Service\FileService;

interface IFileService
{
  function imageStorage($request, $destinationPath);
  function videoStorage($request, $destinationPath);
  function pdfStorage($request, $destinationPath);
  function deleteFile($path, $fileName);
}
