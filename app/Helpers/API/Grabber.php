<?php


namespace App\Helpers\API;

use App\Models\Album;
use App\Models\User;

class Grabber
{
    /**
     * Public method to call our API and populate tables based on endpoint.
     * At this moment in time only calling albums and users.
     * Probably a much more secure way of achieving this.
     *
     * @return void
     */
    public static function populateAPIData(): void
    {
        // initial curl call to get last_page info from API
        $curl = curl_init();

        $resources = ['albums', 'users'];

        // cURL params
        $endPoint = 'https://jsonplaceholder.typicode.com/';

        foreach ($resources as $resource) {
            if ($resource == 'albums') {
                curl_setopt_array($curl, [
                    CURLOPT_URL => $endPoint . 'albums',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_POST => 1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_POSTFIELDS => "",
                    CURLOPT_HTTPHEADER => [
                        "Content-Type: application/json"
                    ]
                ]);

                // execute cURL call
                $albumResponse = curl_exec($curl);

                $albumResponseStatus = curl_getinfo($curl);

                // decode the response
                $albumData = json_decode($albumResponse, true);

                if ($albumResponseStatus['http_code'] != 404 && !empty($albumData)) {
                    foreach ($albumData as $albumItem) {
                        // create new instance of album and assign values to attributes from api data
                        $album = new Album();

                        $album->user_id = $albumItem['userId'];
                        $album->album_id = $albumItem['id'];
                        $album->title = $albumItem['title'];

                        // error handling if data does not save to new Album object
                        if (!$album->save()) {
                            trigger_error("Error! Album did not save successfully.");
                        }
                    }
                }
            } elseif ($resource == 'users') {
                curl_setopt_array($curl, [
                    CURLOPT_URL => $endPoint . 'users',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_POST => 1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_POSTFIELDS => "",
                    CURLOPT_HTTPHEADER => [
                        "Content-Type: application/json"
                    ]
                ]);

                // execute cURL call
                $userResponse = curl_exec($curl);

                $userResponseStatus = curl_getinfo($curl);

                // close instance of cURL
                curl_close($curl);

                // decode the response
                $userData = json_decode($userResponse, true);

                if ($userResponseStatus['http_code'] != 404 && !empty($userData)) {
                    foreach ($userData as $userItem) {
                        // create new instance of user and assign values to attributes from api data
                        $user = new User();

                        $user->name = $userItem['name'];
                        $user->username = $userItem['username'];
                        $user->email = $userItem['email'];
                        $user->address_line_1 = $userItem['address']['street'];
                        $user->address_line_2 = $userItem['address']['suite'];
                        $user->city = $userItem['address']['city'];
                        $user->zipcode = $userItem['address']['zipcode'];
                        $user->geo_lat = $userItem['address']['geo']['lat'];
                        $user->geo_lng = $userItem['address']['geo']['lng'];
                        $user->phone = $userItem['phone'];
                        $user->website = $userItem['website'];
                        $user->company_name = $userItem['company']['name'];
                        $user->company_catchphrase = $userItem['company']['catchPhrase'];
                        $user->company_bs = $userItem['company']['bs'];

                        // error handling if data does not save to new user object
                        if (!$user->save()) {
                            trigger_error("Error! User did not save successfully.");
                        }
                    }
                }
            }
        }
    }
}