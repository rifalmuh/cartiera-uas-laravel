<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('admin.contacts.index', ['contacts' => Contact::latest()->paginate(10)]);
    }

    public function create(): View
    {
        return view('admin.contacts.form', ['contact' => new Contact]);
    }

    public function store(Request $request): RedirectResponse
    {
        Contact::create($this->validated($request));
        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function edit(Contact $contact): View
    {
        return view('admin.contacts.form', compact('contact'));
    }

    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $contact->update($this->validated($request));
        return redirect()->route('admin.contacts.index')->with('success', 'Kontak berhasil diperbarui.');
    }

    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();
        return back()->with('success', 'Kontak berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:25', 'regex:/^[0-9+() -]+$/'],
            'address' => ['required', 'string', 'max:255'],
        ]);
    }
}
