<?php

namespace App\Http\Controllers;

use App\URLShortener;
use Illuminate\Http\Request;

class URLShortenerController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('checkshortlinks')->only('redirectShortlinks');
    }
    /**
     * Show the form for creating a new url.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('urlshort');
    }

    /**
     * Validate and Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "url" => 'required|url|unique:App\URLShortener,long_url'
        ]);
        // store the requested url 
        $urlshort = new URLShortener;
        $urlshort->long_url= $request->url;
        $urlshort->save();

        $shortlinkcode = $this->createShortLinkCode($urlshort->id); // create the short link
        $updateurlshort = URLShortener::find($urlshort->id);
        $updateurlshort->short_url = $shortlinkcode;      
        $updateurlshort->save();

        return response()->json(['url' => env('APP_URL').'/'.$shortlinkcode, "created"=>true],201);
    }

    /**
     * Create a short link code 
     * @param  id of the recent inserted link into a record
     * @return a code to append for the link
     */
    public function createShortLinkCode($id)
    {
        $shorturl= substr(uniqid(),-4,4);
        return $shorturl.'-'.$id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\URLShortener  $uRLShortener
     * @return \Illuminate\Http\Response
     */
    public function show(URLShortener $uRLShortener)
    {
        //
    }


    /**
     * Redirect the short links
     */
    public function redirectShortlinks(Request $request)
    {
        $explodeit = explode('-', $request->id);
        $urls = URLShortener::find((int)$explodeit[1]);
        //return dd($urls->long_url);
        return redirect()->away($urls->long_url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\URLShortener  $uRLShortener
     * @return \Illuminate\Http\Response
     */
    public function destroy(URLShortener $uRLShortener)
    {
        //
    }
}
