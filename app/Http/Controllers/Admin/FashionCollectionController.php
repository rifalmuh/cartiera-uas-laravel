<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FashionCollection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class FashionCollectionController extends Controller
{
    public function index(): View
    {
        return view('admin.fashion-collections.index', [
            'fashionCollections' => FashionCollection::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.fashion-collections.form', [
            'fashionCollection' => new FashionCollection,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('fashion', 'public');
        }

        FashionCollection::create($data);

        return redirect()->route('admin.fashion-collections.index')->with('success', 'Data koleksi fashion berhasil ditambahkan.');
    }

    public function edit(FashionCollection $fashionCollection): View
    {
        return view('admin.fashion-collections.form', compact('fashionCollection'));
    }

    public function update(Request $request, FashionCollection $fashionCollection): RedirectResponse
    {
        $data = $this->validated($request, $fashionCollection);

        if ($request->hasFile('gambar')) {
            $this->deleteImage($fashionCollection->gambar);
            $data['gambar'] = $request->file('gambar')->store('fashion', 'public');
        }

        $fashionCollection->update($data);

        return redirect()->route('admin.fashion-collections.index')->with('success', 'Data koleksi fashion berhasil diperbarui.');
    }

    public function destroy(FashionCollection $fashionCollection): RedirectResponse
    {
        $this->deleteImage($fashionCollection->gambar);
        $fashionCollection->delete();

        return back()->with('success', 'Data koleksi fashion berhasil dihapus.');
    }

    private function validated(Request $request, ?FashionCollection $fashionCollection = null): array
    {
        $id = $fashionCollection?->id;

        return $request->validate([
            'id_fashion' => ['required', 'string', 'max:30', Rule::unique('fashion_collections', 'id_fashion')->ignore($id)],
            'gambar' => [$fashionCollection ? 'nullable' : 'required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'nama_item' => ['required', 'string', 'max:150'],
            'ukuran' => ['required', 'string', 'max:40'],
            'warna' => ['required', 'string', 'max:80'],
            'brand' => ['required', 'string', 'max:120'],
        ], [
            'id_fashion.required' => 'ID Fashion wajib diisi.',
            'id_fashion.unique' => 'ID Fashion sudah digunakan.',
            'gambar.required' => 'Gambar wajib diunggah.',
            'nama_item.required' => 'Nama item wajib diisi.',
            'ukuran.required' => 'Ukuran wajib diisi.',
            'warna.required' => 'Warna wajib diisi.',
            'brand.required' => 'Brand wajib diisi.',
        ]);
    }

    private function deleteImage(?string $path): void
    {
        if ($path && ! str_starts_with($path, 'images/')) {
            Storage::disk('public')->delete($path);
        }
    }
}
