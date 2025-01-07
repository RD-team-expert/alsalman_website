<?php

namespace App\Http\Controllers;

use App\Models\CognitoSubmission;

class AdminController extends Controller
{
    public function showEntries()
    {
        $entries = CognitoSubmission::latest()->paginate(10); // Fetch entries
        return view('admin.entries', compact('entries'));
    }
}
