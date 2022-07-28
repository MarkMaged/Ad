<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ads::all();
        return view('Ads.index', ['ads' => $ads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required',
            'category' => 'required',
            'type' => 'required',
            'tags' => 'nullable',
            'advertiser' => 'nullable',
            'image' => 'nullable|image',
        ]);
        $data = $request->all();
        if (isset($request->image)) {
            $image = $request->file('image')->store('Ads');
            $data['image'] = $image;
        }
        $ads = Ads::create($data);
        return (redirect(route('ads.index'))->with('success', 'Ad Inserted With Id : ' . $ads->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = Auth::user()->id;
        $ads = Ads::findOrfail($id);
        return view('Ads.show', ['ads' => $ads]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ads = Ads::findOrfail($id);
        return view('Ads.edit', ['ads_edit' => $ads]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ad_update = Ads::findOrfail($id);
        $request->validate([
            'title' => 'required|max:20',
            'description' => 'required',
            'category' => 'required',
            'type' => 'required',
            'tags' => 'nullable',
            'advertiser' => 'nullable',
            'image' => 'nullable|image',
        ]);
        $data = $request->all();
        if (isset($request->image)) {
            Storage::delete($ad_update->image);
            $image = $request->file('image')->store('blogs');
            $data['image'] = $image;
        }
        $ad_update->update($data);

        return (redirect(route('ads.index'))->with('success', 'Ad Updated With Id : ' . $ad_update->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delet = Ads::findOrfail($id);
        $delet->destroy($id);
        return (redirect(route('ads.index'))->with('success', 'Ad With ID : ' . $delet->id . 'deleted'));
    }
}
