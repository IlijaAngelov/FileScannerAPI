<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Facade\FlareClient\Http\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ScannerController extends Controller
{

    public function index()
    {
        return view('display');
    }


    public function show()
    {

        $root = realpath(".");
        // $root = realpath("/home/ilija/Documents/Books/");

        /**
         * Get the directory size
         * @param  string $directory
         * @return integer
         */
        function getDirSize($path)
        {
            $io = popen('/usr/bin/du -sb '.$path, 'r');
            $size = intval(fgets($io,80));
            pclose($io);
            return $size;
        }

        function scan($root) {

            $last_letter  = $root[strlen($root)-1];
            $root  = ($last_letter == '\\' || $last_letter == '/') ? $root : $root.DIRECTORY_SEPARATOR;

            $scanDir = scandir($root);
            $childrenFolders = array();
            $childrenFiles = array();
            $mainDir = array();
            $currentDir = array();

            foreach($scanDir as $key => $value){
                if($value == '.' || $value == '..'){
                    unset($scanDir[$key]);
                }
            }

            foreach($scanDir as $key => $value) {
                $path = $root . $value;
                $ext = pathinfo($path, PATHINFO_EXTENSION);

                $currentDir = [
                    "name" => $value,
                    "type" => filetype($path),
                    "data" => [
                        "type" => filetype($path),
                        "file" => $value,
                        "file_ext" => $ext,
                        "basename_file" => $value,
                        "last_modified_t" => filemtime($path),
                        "last_modified" => date("F d Y H:i:s.", filemtime($path)),
                        "cut_date" => "Thu, January 1st, 1970 - 12:00am",
                        "cut_date_end" => "Thu, January 1st, 1970 - 12:00am",
                        "return_direction" => "older"
                        ],
                    "subs" => null
                    ];
                if (is_dir($path)) {
                    $currentDir["data"]["get_directory_size"] = getDirSize($path);
                    $count_dir_files = count(scandir($path)) - 2;
                    $childrenFolders = scan($path);
                    $currentDir['data']['file_ext'] = "dir";
                    $currentDir['subs'] = $childrenFolders;
                    $currentDir["data"]["count_dir_files"] = $count_dir_files;
                } else {
                    $currentDir["data"]["full_url"] = $path;
                    // $currentDir["data"]["is_image"] = getimagesize($path) ? true : false;
                    $currentDir["data"]["file_size"] = filesize($path);
                }
                $mainDir[] = $currentDir;
            }
            return $mainDir;
        }

        $response = scan($root);
        // return $response;
        return view('filebrowser', compact('response'));

    }
}
