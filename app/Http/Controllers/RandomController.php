<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class RandomController extends Controller
{
    public function index()
    {
        $folderPath = $this->getFolderPathFromInput();
        $errors = $this->checkFolderPath($folderPath);
        $pageVariables = [
            'success' => empty($errors),
            'errors' => $errors,
            'movieCollection' => (empty($errors)) ? $this->readFolder($folderPath) : [],
            'selectedFolderPath' => $folderPath
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

    private function checkFolderPath($folderPath)
    {
        $errors = [];

        if (!file_exists($folderPath) || !is_dir($folderPath)) {
            $errors[] = '[' . $folderPath . '] is not a valid folder !';
        }

        return $errors;
    }

    private function readFolder($folderPath)
    {
    }
}
