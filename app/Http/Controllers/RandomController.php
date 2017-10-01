<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Mockery\Exception;

class RandomController extends Controller
{
    /** @var resource $finfo */
    private $finfo = NULL;

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

    private function findRandomMovieFromSeagate()
    {
        $seagatePath = 'L:\Mes Videos\Film';

        if (file_exists($seagatePath)) {
            $movieTitle = '';
            while (empty($movieTitle)) {
                $directoryContent = scandir($seagatePath);
                $max = count($directoryContent);
                $min = 2;
                $randomIndex = rand($min, $max);
                $movieTitle = $directoryContent[$randomIndex];
                $movieTitle = (empty($movieTitle) || $movieTitle == '.' || $movieTitle == '..') ? '' : $movieTitle;
            }
        } else {
            $movieTitle = 'No Movie Found !';
        }

        return $movieTitle;
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

    private function readFolder()
    {
        $collection = scandir($this->folderPath);
        // 2 array_shift to remove "." and ".."
        array_shift($collection);
        array_shift($collection);

        return is_array($collection) ? $collection : [];
    }

    private function buildMovieCollection()
    {
        $collection = $this->readFolder();

        $collection = array_slice($collection, 0, 20);

        $this->finfo = finfo_open(FILEINFO_CONTINUE );
        $collection = $this->retreiveFileInfo($collection);
        finfo_close($this->finfo);

        return $collection;
    }

    private function retreiveFileInfo($collection)
    {
        $newCollection = [];
        foreach ($collection as $filename) {
            $cleanFileName = $this->folderPath . DIRECTORY_SEPARATOR . $filename;
            try {
                $newCollection[] = finfo_file($this->finfo, $cleanFileName);
            } catch (Exception $e) {

            }
        }

        return $newCollection;
    }
}
