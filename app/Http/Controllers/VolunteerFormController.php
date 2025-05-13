<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolunteerForm;
use Illuminate\Support\Facades\Validator;

class VolunteerFormController extends Controller
{
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:255',
        'skills' => 'required|string',
        'availability' => 'required|string',
        'motivation' => 'required|string',
        'experience' => 'nullable|string'
    ]);

    $application = VolunteerForm::create($validated);

    return response()->json([
        'message' => 'Application submitted successfully!',
        'data' => $application
    ], 201);
}
}