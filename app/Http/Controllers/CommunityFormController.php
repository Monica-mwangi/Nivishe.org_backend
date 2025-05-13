<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityForm;

class CommunityFormController extends Controller
{
    /**
     * Store a newly submitted community form.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'education' => 'required|string',
            'experience' => 'required|string',
            'motivation' => 'required|string',
        ]);
    
        CommunityForm::create($validated);
    
        return response()->json([
            'message' => 'Form submitted successfully!',
            'data' => $validated
        ], 201);
    }
}
