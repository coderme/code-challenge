<?php
namespace App\Http\Controllers;

use GuzzleHttp\Exception\ConnectException;
use Illuminate\Http\Request;
use Exception;

class SearchController extends SpotifyController
{

    public function index()
    {
        return view('index', [
            'query' => ''
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        if ($query == '') {
            return $this->index();
        }

        try {
            $results = $this->spotify->search($query);
        } catch (ConnectException $e) {
            abort(500, 'Connection error');
        } catch (Exception $e) {
            report(500, "Search exception");
        }

        return view('results', [
            'query' => $query,
            'artists' => $results['artists'],
            'albums' => $results['albums'],
            'tracks' => $results['tracks']
        ]);
    }
}










