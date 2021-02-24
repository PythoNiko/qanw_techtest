<?php

namespace App\Http\Controllers;


use App\Models\Config;
use App\Models\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        // todo: config is a horrific name - change to something better when done

        // check if data has been loaded from API already
        $config = Config::where('id', 1)->first();

        // load data from API and set flag to 1
        if ($config && $config->data_loaded == 0) {
            $this->populateAPIData();
            $config->data_loaded = 1;
            $config->save();
        }

        // load all albums and send to view to be rendered
        $albums = Album::all();

        // count of properties
        $albumCount = Album::all()->count();

        return view('albums.index', compact(
            'albums',
            'albumCount'
        ));
    }

    public function populateAPIData()
    {
        // initial curl call to get last_page info from API
        $curl = curl_init();

        $resources = ['albums'];

        // cURL params
        $endPoint = 'https://jsonplaceholder.typicode.com/';

        foreach ($resources as $resource) {
            curl_setopt_array($curl, [
                CURLOPT_URL => $endPoint . $resource,
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
            $response = curl_exec($curl);

            $responseStatus = curl_getinfo($curl);

            // dd($responseStatus);

            // close instance of cURL
            curl_close($curl);

            // decode the response
            $data = json_decode($response, true);

            if ($responseStatus['http_code'] != 404 && !empty($data)){
                foreach ($data as $dataItem) {
                    // create new instance of album and assign values to attributes from api data
                    $album = new Album();

                    $album->user_id = $dataItem['userId'];
                    $album->album_id = $dataItem['id'];
                    $album->title = $dataItem['title'];

                    // error handling if data does not save to new Album object
                    if (!$album->save()) {
                        trigger_error("Error! Property did not save successfully.");
                    }
                }
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        //
    }
}
