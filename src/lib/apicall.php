<?php
require 'options.php';

header('Content-type:application/json');

$result = array();

if(isset($_POST['functionname']))
{
    $arg1 = strip_tags(trim($_POST["arguments"][0]));
    switch($_POST['functionname']) {
        case "searchMovies":
            $result['result'] = searchMovies($arg1);
        break;

        default:
           $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
    }
}

echo json_encode($result);


function callApi($url)
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $apiResult = curl_exec($curl);
    curl_close($curl);

    return $apiResult;
}

function searchMovies($name)
{
    $newName = str_replace(' ', '%20', $name);
    $url = MOVIEDB_URL."search/movie?query=".$newName."&api_key=".API_KEY;
    $movieResults = json_decode(callApi($url));
    $parsedMovies = startWith($movieResults,$name);
    $organizedMovies = organizeByPopularity($parsedMovies);
    return $organizedMovies;
}

function startWith($movies,$str)
{
    $parsedResults = new stdClass;
    $parsedResults->results = array();
    $str = strtolower($str);
    for($i=0, $l=count($movies->results); $i < $l; $i++)
    {
        if(preg_match('/^'.$str.'/',strtolower($movies->results[$i]->title)))
        {
            array_push($parsedResults->results, $movies->results[$i]);
        }
    }
    return $parsedResults;
}

function organizeByPopularity($movies)
{
    usort($movies->results, "cmp");
    $organizedMovies = new stdClass;
    $organizedMovies->results = $movies->results;
    return $organizedMovies;
}

function cmp($a, $b)
{
    return ($a->popularity > $b->popularity) ? -1 : 1;
}

