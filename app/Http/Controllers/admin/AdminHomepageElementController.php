<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageElement;
use Illuminate\Http\Request;

class AdminHomepageElementController extends Controller
{
    public function index()
    {
        $homepageElement = HomepageElement::first();
        return view('admin.homepage', compact('homepageElement'));
    }

    public function store(Request $request)
    {
        $data = [];

        /* ================= HOW TO APPLY IMAGE ================= */
        if ($request->hasFile('how_to_apply')) {
            $imageName = time() . '_' . $request->file('how_to_apply')->getClientOriginalName();
            $request->file('how_to_apply')->move(upload_path('homepage'), $imageName);
            $data['how_to_apply'] = 'uploads/homepage/' . $imageName;
        }

        /* ================= WHAT WE OFFER ================= */
        $offers = [];

        if ($request->offer_name) {
            foreach ($request->offer_name as $key => $name) {

                $iconPath = null;

                if (isset($request->offer_icon[$key])) {
                    $iconName = time() . '_' . $request->offer_icon[$key]->getClientOriginalName();
                    $request->offer_icon[$key]->move(upload_path('homepage/offers'), $iconName);
                    $iconPath = 'uploads/homepage/offers/' . $iconName;
                }

                $offers[] = [
                    'name' => $name,
                    'icon' => $iconPath,
                ];
            }
        }

        $data['what_we_offer'] = $offers;

        HomepageElement::create($data);

        sessionMsg('success', 'Homepage elements added successfully', 'success');
        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $homepageElement = HomepageElement::findOrFail($id);
        $data = [];

        /* ================= UPDATE HOW TO APPLY IMAGE ================= */
        if ($request->hasFile('how_to_apply')) {

            if ($homepageElement->how_to_apply && file_exists(public_path($homepageElement->how_to_apply))) {
                unlink(public_path($homepageElement->how_to_apply));
            }

            $imageName = time() . '_' . $request->file('how_to_apply')->getClientOriginalName();
            $request->file('how_to_apply')->move(upload_path('homepage'), $imageName);
            $data['how_to_apply'] = 'uploads/homepage/' . $imageName;
        }

        /* ================= UPDATE WHAT WE OFFER ================= */
        $offers = [];

        if ($request->offer_name) {
            foreach ($request->offer_name as $key => $name) {

                $iconPath = $request->old_offer_icon[$key] ?? null;

                if (isset($request->offer_icon[$key])) {

                    if ($iconPath && file_exists(public_path($iconPath))) {
                        unlink(public_path($iconPath));
                    }

                    $iconName = time() . '_' . $request->offer_icon[$key]->getClientOriginalName();
                    $request->offer_icon[$key]->move(upload_path('homepage/offers'), $iconName);
                    $iconPath = 'uploads/homepage/offers/' . $iconName;
                }

                $offers[] = [
                    'name' => $name,
                    'icon' => $iconPath,
                ];
            }
        }

        $data['what_we_offer'] = $offers;

        $homepageElement->update($data);

        sessionMsg('success', 'Homepage elements updated successfully', 'success');
        return redirect()->back();
    }
}
