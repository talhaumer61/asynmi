<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class AdminContactInfoController extends Controller
{
    public function index($action = null)
    {
        $contact = ContactInfo::where('status', 1)->first();

        return view('admin.contact_info', compact('contact', 'action'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email1'   => 'nullable|email',
            'email2'   => 'nullable|email',
            'phone'    => 'nullable|string',
            'whatsapp' => 'nullable|string',
            'city.*'   => 'required|string',
            'address.*'=> 'required|string',
        ]);

        $addresses = [];
        foreach ($request->city as $key => $city) {
            $addresses[] = [
                'city'    => $city,
                'address'=> $request->address[$key],
            ];
        }

        ContactInfo::create([
            'status'    => 1,
            'email1'    => $request->email1,
            'email2'    => $request->email2,
            'phone'     => $request->phone,
            'whatsapp'  => $request->whatsapp,
            'addresses' => $addresses,
        ]);

        sessionMsg('Success', 'Contact info saved successfully', 'success');
        return redirect()->route('admin.contact-info');
    }

    public function update(Request $request, $id)
    {
        $contact = ContactInfo::findOrFail($id);

        $addresses = [];
        foreach ($request->city as $key => $city) {
            $addresses[] = [
                'city'    => $city,
                'address'=> $request->address[$key],
            ];
        }

        $contact->update([
            'email1'    => $request->email1,
            'email2'    => $request->email2,
            'phone'     => $request->phone,
            'whatsapp'  => $request->whatsapp,
            'addresses' => $addresses,
        ]);

        sessionMsg('Success', 'Contact info updated successfully', 'success');
        return redirect()->route('admin.contact-info');
    }
}
