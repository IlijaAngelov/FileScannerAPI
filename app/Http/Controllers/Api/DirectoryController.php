<?php

namespace App\Http\Controllers\Api;

use Iterator;
use SplFileInfo;
use SeekableIterator;
use DirectoryIterator;
use Illuminate\Http\Request;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DirectoryController
{

    public function iterateNonRecursively()
    {
        $path = realpath('/home/ilija/Documents/Books');
        $directory = new DirectoryIterator($path);

        foreach ($directory as $dir) {
            if($dir->isDot()) continue;

            if($dir->isDir()) {
                echo "--$dir <br>";
            } else {
                echo $dir->getFilename() . "<br>\n";
            }
        }
    }

    public function iterate(Request $request)
    {
        $folder = $request->folder;
        $path = realpath($folder);
        $dir = new RecursiveDirectoryIterator($path, RecursiveDirectoryIterator::SKIP_DOTS);
        $objects = new RecursiveIteratorIterator($dir);
        foreach($objects as $name){
            $collection[] = $name;
        }
        $collection = collect($collection);
        foreach($collection as $data) {
            $scan[] = [
                "name" => $data->getBasename(),
                "type"  => $data->getType(),
                "data" => [
                    'type' => $data->getExtension(),
                    'file' => $data->getFileName(),
                    'file_ext' => $data->getExtension(),
                    'basename_file' => $data->getBasename(),
                    'count_dir_files' => 666,
                    'get_directory_size' => $data->getSize(),
                    'last_modified_t' => $data->getMTime(),
                    'last_modified' => date("F d Y H:i:s", $data->getMTime()),
                    'cut_date' => $request->cut_date ? $request->cut_date : '',
                    'cut_date_end' => $request->cut_date_end ? $request->cut_date_end : '',
                    'return_direction' => "older"
                ],
                "subs" => null 
            ];
        }
        return response()->json($scan);
    }



















    // public static function multiArray()
    // {
    //     $startpath = realpath('/home/ilija/Downloads/Drive(2011)');

    //     $ritit = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($startpath), RecursiveIteratorIterator::CHILD_FIRST);

    //         $r = array();

    //         foreach ($ritit as $splFileInfo) {

    //         $path = $splFileInfo->isDir()

    //                 ? array($splFileInfo->getFilename() => array())

    //                 : array($splFileInfo->getFilename());

    //         for ($depth = $ritit->getDepth() - 1; $depth >= 0; $depth--) {

    //             $path = array($ritit->getSubIterator($depth)->current()->getFilename() => $path);

    //         }
    //         $r = array_merge_recursive($r, $path);
    //         }
    //         var_dump($r);
    // }
}
