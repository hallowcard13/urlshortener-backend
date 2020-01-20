<?php

namespace App\Http\Controllers;

use App\URLShortener;
use Illuminate\Http\Request;

class URLShortenerController extends Controller
{
   

    /**
     * Show the form for creating a new url.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "url" => 'required|url'
        ]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\URLShortener  $uRLShortener
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, URLShortener $uRLShortener)
    {
        //
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
