<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mockery\Exception;

class RandomController extends Controller
{
    /** @var resource $finfo */
    private $finfo;

    private $dirHandler;

    /** @var string $folderPath */
    private $folderPath;

    public function index()
    {
        $this->folderPath = $this->getFolderPathFromInput();
        $errors = $this->checkFolderPath();
        $pageVariables = [
            'success' => empty($errors),
            'errors' => $errors,
            'movieCollection' => (empty($errors)) ? $this->buildMovieCollection() : [],
            'selectedFolderPath' => $this->folderPath
        ];
        return view('random.index', $pageVariables);
    }

    /**
     * @return mixed|string
     */
    private function getFolderPathFromInput()
    {
        $folderPath = Input::get('folderPath');
        $folderPath = (isset($folderPath) && !empty($folderPath)) ? $folderPath : 'L:\Mes Videos\Film';
        return $folderPath;
    }

    private function checkFolderPath()
    {
        $errors = [];

        if (!file_exists($this->folderPath) || !is_dir($this->folderPath)) {
            $errors[] = '[' . $this->folderPath . '] is not a valid folder !';
        }

        return $errors;
    }

    private function buildMovieCollection()
    {
        $this->finfo = finfo_open(FILEINFO_NONE);
        $this->dirHandler = opendir($this->folderPath);
        $collection = [];
        if ($this->dirHandler) {
            while (($file = readdir($this->dirHandler)) !== false) {
                if (!in_array($file, array('.', '..'))) {
                    $collection[] = array(
                        'filename' => $file,
                        'type' => gettype($file),
//                        'finfo' => print_r(finfo_file($this->finfo, $this->folderPath . '\\' . $file), true)
                    );
                }
            }
            closedir($this->dirHandler);
            finfo_close($this->finfo);
        }

        return $collection;
    }
}
