<?php

namespace Modules\Admin\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Modules\Admin\app\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $contact = Contact::latest()->first();
        return view('admin::contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $data = $request->all();
        if ($contact->fill($data)->save()) {
            return back()->with('success', 'Contact Updated Successfully');
        } else {
            return back()->with('error', 'Failed to Update Contact');
        }
    }
}
