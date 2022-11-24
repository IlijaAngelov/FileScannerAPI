<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Facade\FlareClient\Http\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ScannerController extends Controller
{


    public function index(Request $request)
    {
        $folder =  $request->folder;
        $depth_search = $request->depth_search;
        $cut_date = $request->cut_date;
        $cut_date_end = $request->cut_date_end;

        $response = $this->show($folder, $depth_search, $cut_date, $cut_date_end);
        return view('filebrowser', compact('response'));
    }

    public function show($folder = '', $depth_search = '', $cut_date = '', $cut_date_end = '')
    {
        $path = $folder;
        if($depth_search == 1 || $depth_search == null){
            $depth_search = 1;
        } else {
            $depth_search = 0;
        }
        $root = realpath($path);

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

        function scan($root, $depth_search, $cut_date, $cut_date_end) {
            $last_character = htmlspecialchars($root[strlen($root)-1]);
            $root  = ($last_character == '\\' || $last_character == '/') ? $root : $root.DIRECTORY_SEPARATOR;
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
                $last_modified = date ("Y-m-d", filemtime($path));
                    $currentDir = [
                        "name" => $value,
                        "type" => filetype($path),
                        "data" => [
                            "type" => filetype($path),
                            "file" => $value,
                            "file_ext" => $ext,
                            "basename_file" => $value,
                            "last_modified_t" => $last_modified,
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
                        if($depth_search == 1){
                            $childrenFolders = scan($path, $depth_search, $cut_date, $cut_date_end);
                        }
                        $currentDir['data']['file_ext'] = "dir";
                        $currentDir['subs'] = $childrenFolders;
                        $currentDir["data"]["count_dir_files"] = $count_dir_files;
                    } else {
                        $currentDir["data"]["full_url"] = $path;
                        $currentDir["data"]["file_size"] = filesize($path);
                    }

                    if((empty($cut_date) && $cut_date == null) && (empty($cut_date_end) && $cut_date_end == null)){
                        $mainDir[] = $currentDir;
                    } elseif($cut_date < $cut_date_end) {
                        $mainDir[] = $currentDir;
                    } else {
                        if(!empty($cut_date) && $cut_date != null){
                            if(strtotime($last_modified) > strtotime($cut_date)) {
                                $mainDir[] = $currentDir;
                            }
                        }
                        if(!empty($cut_date_end) && $cut_date_end != null){
                            if(strtotime($last_modified) < strtotime($cut_date_end)) {
                                $mainDir[] = $currentDir;
                            }
                        }
                    }
            }
            return $mainDir;
        }

        $response = scan($root, $depth_search, $cut_date, $cut_date_end);
        return response()->json($response);

    }
}
