<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocsController extends Controller
{
    // Menampilkan semua dokumen
    public function index()
    {
        $docs = Document::all();
        return view('Features.docs', compact('docs'));
    }

    public function listDocs(){
        $docs = Document::all();
        return view('download', compact('docs'));
    }

    // Menambahkan dokumen baru
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'document_name' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx,jpg,png', // Batasi ukuran dan tipe file
        ]);

        // Menyimpan file ke storage
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('documents', 'public'); // Simpan ke storage/app/public/documents

            // Simpan data ke database
            Document::create([
                'document_name' => $validatedData['document_name'],
                'file' => $filePath,
            ]);

            return redirect()->back()->with('success', 'Dokumen berhasil ditambahkan!');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah file!');
    }

    // Menghapus dokumen
    public function destroy($id)
    {
        $document = Document::findOrFail($id);

        // Hapus file dari storage
        if (Storage::disk('public')->exists($document->file)) {
            Storage::disk('public')->delete($document->file);
        }

        // Hapus data dari database
        $document->delete();

        return redirect()->back()->with('success', 'Dokumen berhasil dihapus!');
    }
}
