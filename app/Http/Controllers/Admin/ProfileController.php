<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use App\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function index()
    {
        //
    }
    public function previewInvoice(Profile $profile)
    {
        return view('admin.profile.preview_invoice', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $profile = new Profile;
        $profile->business_name = $request->business_name;
        $profile->business_address_street = $request->business_address_street;
        $profile->business_address_street2 = $request->business_address_street2;
        $profile->business_address_city = $request->business_address_city;
        $profile->business_address_state = $request->business_address_state;
        $profile->business_address_zipcode = $request->business_address_zipcode;
        $profile->business_email = $request->business_email;
        $profile->business_phone_number = $request->business_phone_number;
        $profile->business_website = $request->business_website;
        $profile->header_notes = $request->header_notes;
        $profile->footer_notes_left = $request->footer_notes_left;
        $profile->footer_notes_right = $request->footer_notes_right;
        $profile->business_website = $request->business_website;
        if($request->hasFile('business_logo')) {

            $image       = $request->file('business_logo');
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());
            $image_resize->save('images/'. $filename);
            $profile->business_logo = $filename;
        }
        else {
            $profile->business_logo = 'noimage.jpg';
        }
        $profile->save();
        return view('welcome');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Profile $profile
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit(Profile $profile)
    {
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Profile $profile
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Profile $profile)
    {
        $profile->business_name = $request->business_name;
        $profile->business_address_street = $request->business_address_street;
        $profile->business_address_street2 = $request->business_address_street2;
        $profile->business_address_city = $request->business_address_city;
        $profile->business_address_state = $request->business_address_state;
        $profile->business_address_zipcode = $request->business_address_zipcode;
        $profile->business_email = $request->business_email;
        $profile->business_phone_number = $request->business_phone_number;
        $profile->business_website = $request->business_website;
        $profile->header_notes = $request->header_notes;
        $profile->footer_notes_left = $request->footer_notes_left;
        $profile->footer_notes_right = $request->footer_notes_right;
        $profile->business_website = $request->business_website;
        if($request->hasFile('business_logo')) {

            $image       = $request->file('business_logo');
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());
            $image_resize->save('images/'. $filename);
            $profile->business_logo = $filename;
        }
        $profile->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
