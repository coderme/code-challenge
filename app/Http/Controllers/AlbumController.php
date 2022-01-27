<?php
namespace App\Http\Controllers;

use App\Http\Contracts\Detailable;
use App\Exceptions\ {
    PermissionDeniedException,
    ResourceNotFoundException
};
use GuzzleHttp\Exception\ConnectException;
use Exception;

class AlbumController extends SpotifyController implements Detailable
{

    public function details(string $id)
    {
        try {
            $album = $this->spotify->getAlbum($id);
        } catch (PermissionDeniedException $e) {
            abort(401, 'Permission denied');
        } catch (ResourceNotFoundException $e) {
            abort(404, "Album with id: $id couldn't be found");
        } catch (ConnectException $e) {
            abort(500, "Connection error");
        } catch (Exception $e) {
            abort(500, "Unhandled exception {$e->getMessage()}");
        }

        return view('album', [
            'album' => $album
        ]);
    }
}
