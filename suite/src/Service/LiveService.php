<?php

namespace App\Service;

use App\Repository\LoginInfoRepository;
use App\Service\LiveServices\SettingService;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\KernelInterface;

class LiveService
{
    public $publicPath;
    public SettingService $settings;

    function __construct(KernelInterface $kernel, SettingService $settings){
        $this->publicPath = $kernel->getProjectDir();
        $this->settings = $settings;
    }
    public function moveUploadedFile(UploadedFile $file, $relativePath,$dbPath, $fileName)
    {
        $originalName = $file->getFilename();
        $uploadBasePath = $this->publicPath;
        // use filemtime() to have a more determenistic way to determine the subpath, otherwise its hard to test.
        // $relativePath = date('Y-m', filemtime($file->getPath()));
        $targetFileName = $relativePath . DIRECTORY_SEPARATOR . $originalName;
        $targetFilePath = $uploadBasePath . DIRECTORY_SEPARATOR . $targetFileName;
        $ext = $file->getExtension();
        $i = 1;
        while (file_exists($targetFilePath) && md5_file($file->getPath()) != md5_file($targetFilePath)) {
            if ($ext) {
                $prev = $i == 1 ? "" : $i;
                $targetFilePath = $targetFilePath . str_replace($prev . $ext, $i++ . $ext, $targetFilePath);
            } else {
                $targetFilePath = $targetFilePath . $i++;
            }
        }
        $targetDir = $uploadBasePath . DIRECTORY_SEPARATOR . $relativePath;
        if (!is_dir($targetDir)) {
            $ret = mkdir($targetDir, umask(), true);
            if (!$ret) {
                throw new \RuntimeException("Could not create target directory to move temporary file into.");
            }
        }
        //$file->move($targetDir, basename($targetFilePath));
        //$file->move($targetDir, basename($fileName.'.'.$ext));
        $file->move($targetDir, basename($fileName).".".$file->getClientOriginalExtension());
        return $dbPath . basename($fileName).".".$file->getClientOriginalExtension();
    }

    public function deleteImage(?string $getProfilePicture): string
    {
        if(file_exists($this->publicPath.'/public/'.$getProfilePicture)){
            unlink($this->publicPath.'/public/'.$getProfilePicture);
        }
        return "Deleted Successfully";
    }

}