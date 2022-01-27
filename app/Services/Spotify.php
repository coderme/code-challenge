<?php
namespace App\Services;



use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Exception;



use App\Exceptions\{ PermissionDeniedException, ResourceNotFoundException };


class Spotify
{

    const API_AUTH_ENDPOINT = 'https://accounts.spotify.com/api/token';

    const API_SEARCH_ENDPOINT = "https://api.spotify.com/v1/";

    const CACHE_KEY = 'spotify_access_token';

    const MAX_CACHE_SECONDS = 60 * 60;

    const MAX_RETRIES = 3;

    /**
     * Client's id
     *
     * @var string
     */
    protected $id;

    /**
     * Client's secret
     *
     * @var string
     */
    protected $secret;

    /**
     * Spotify constructor.
     *
     * @param string $id
     * @param string $secret
     */
    public function __construct(string $id, string $secret)
    {
        $this->id = $id;
        $this->secret = $secret;
    }

    /**
     * Search spotify for query
     *
     * @param string $type
     * @param string $query
     * @return array
     */
    public function search(string $query): array
    {
        return $this->get(self::API_SEARCH_ENDPOINT . 'search', [
            'q' => $query,
            'type' => 'artist,album,track'
        ]);
    }

    /**
     * Get an Artist by id
     *
     * @param string $id
     * @return array
     */
    public function getArtist(string $id): array
    {
        return $this->get(self::API_SEARCH_ENDPOINT . "artists/$id");
    }

    /**
     * Get an Album by id
     *
     * @param string $id
     * @return array
     */
    public function getAlbum(string $id): array
    {
        return $this->get(self::API_SEARCH_ENDPOINT . "albums/$id");
    }

    /**
     * Get a Track by id
     *
     * @param string $id
     * @return array
     */
    public function getTrack(string $id): array
    {
        return $this->get(self::API_SEARCH_ENDPOINT . "tracks/$id");
    }

    /**
     * Get a resource from Spotify
     *
     * @param string $url
     * @param array $params
     * @param int $maxRetry
     * @return array
     * 
     */
    protected function get(string $url, array $params = [], int $maxRetry = self::MAX_RETRIES, bool $refresh = false): array
    {
        try {
            $token = $this->getAccessToken($refresh);
        } catch (Exception $e) {
            throw $e;
        }

        $client = new Client();
        try {
            $res = $client->get($url, [
                'headers' => [
                    'Authorization' => "Bearer $token",
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ],
                'query' => $params
            ]);
            return json_decode((string) $res->getBody(), true);
        } catch (ClientException $e) {
            if ($this->hasAccessTokenExpired($e)) {
                return $this->get($url, $params, -- $maxRetry, true);
            }

            switch ($e->getResponse()->getStatusCode()) {
                case 401:
                case 403:
                    throw  new PermissionDeniedException();
                case 400: //spotify reports invalid id as bad request
                case 404:
                    throw  new ResourceNotFoundException();

                default:
                    throw $e;
            }
        } catch (Exception $e) {
            if ($maxRetry > 0) {
                return $this->get($url, $params, -- $maxRetry);
            }
            throw $e;
        }
    }

    /**
     * Get an Access Token for the current credential
     *
     * @param bool $refresh
     * @return string
     */
    protected function getAccessToken(bool $refresh = false): string
    {

        // get accesstoken from session
        $token = cache(self::CACHE_KEY);

        if (! $refresh && $token != '') {
            return $token;
        }

        $client = new Client();

        try {
            $response = $client->post(SELF::API_AUTH_ENDPOINT, [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode("$this->id:$this->secret"),
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    'grant_type' => 'client_credentials'
                ]
            ]);
            $token = json_decode((string) $response->getBody(), true)['access_token'];

            // save to session
            cache([
                self::CACHE_KEY => $token
            ], self::MAX_CACHE_SECONDS);

            return $token;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Check if the exception was due to expired access token
     *
     * @param ClientException $e
     * @return bool
     */
    protected function hasAccessTokenExpired(ClientException $e): bool
    {
        // probably we should try more elegant way
        return $e->getResponse()->getStatusCode() == 401;
    }
}