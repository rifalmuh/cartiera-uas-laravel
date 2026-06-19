<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(): View
    {
        return view('admin.companies.index', ['companies' => Company::latest()->paginate(10)]);
    }

    public function create(): View
    {
        return view('admin.companies.form', ['company' => new Company]);
    }

    public function store(Request $request): RedirectResponse
    {
        Company::create($this->validated($request));
        return redirect()->route('admin.companies.index')->with('success', 'Profil perusahaan berhasil ditambahkan.');
    }

    public function edit(Company $company): View
    {
        return view('admin.companies.form', compact('company'));
    }

    public function update(Request $request, Company $company): RedirectResponse
    {
        $company->update($this->validated($request));
        return redirect()->route('admin.companies.index')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }

    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();
        return back()->with('success', 'Profil perusahaan berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string', 'min:30'],
            'address' => ['required', 'string', 'max:255'],
        ]);
    }
}
