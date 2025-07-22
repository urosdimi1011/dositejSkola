<?php

namespace App\Http\Controllers;

use App\Models\StaffMembers;
use Illuminate\Http\Request;

class StaffDocumentController extends Controller
{
    public function store(Request $request, StaffMembers $member)
    {
        $data = $request->validate([
            'documents.*.title' => 'required|string|max:255',
            'documents.*.file'  => 'required|file|max:5120', // do 5MB
        ]);

        foreach ($data['documents'] as $doc) {
            $path = $doc['file']->store('staff-documents', 'public');
            $member->documents()->create([
                'title'     => $doc['title'],
                'type'      => pathinfo($path, PATHINFO_EXTENSION),
                'file_path' => $path,
            ]);
        }

        return back();
    }}
