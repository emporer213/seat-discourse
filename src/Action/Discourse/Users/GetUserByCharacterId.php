<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 21.09.2018
 * Time: 21:51.
 */

namespace Herpaderpaldent\Seat\SeatDiscourse\Action\Discourse\Users;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class GetUserByCharacterId
{
    public function execute(int $id)
    {
        $client = new Client();
        try {
            $response = $client->request('GET', config('seatdiscourse.config.DISCOURSE_URL') . '/users/by-external/' . $id . '.json', [
                'headers' => [
                    'api-key' => config('seatdiscourse.config.DISCOURSE_API_KEY'),
                    'api-username' => config('seatdiscourse.config.DISCOURSE_API_USERNAME'),
                ],
            ]);

            return collect(json_decode($response->getBody()));
        } catch (GuzzleException $e) {
            return $e;
        }
    }
}
