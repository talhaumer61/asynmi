<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class AdminFaqsController extends Controller
{
    public function index($action = "list", $id = null)
    {
        $faq = null;

        if ($id) {
            $faq = Faq::findOrFail($id);
        }

        $faqs = Faq::latest()->get();

        return view('admin.faqs', compact('faqs', 'faq', 'action'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:500',
            'answer'   => 'required|string',
            'status'   => 'required|boolean',
        ]);

        Faq::create($request->only('question', 'answer', 'status'));

        sessionMsg('success', 'FAQ added successfully', 'success');
        return redirect()->route('admin.faqs');
    }

    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $request->validate([
            'question' => 'required|string|max:500',
            'answer'   => 'required|string',
            'status'   => 'required|boolean',
        ]);

        $faq->update($request->only('question', 'answer', 'status'));

        sessionMsg('success', 'FAQ updated successfully', 'success');
        return redirect()->route('admin.faqs');
    }

    public function destroy($id)
    {
        Faq::findOrFail($id)->delete();

        sessionMsg('success', 'FAQ deleted successfully', 'success');
        return redirect()->route('admin.faqs');
    }
}
