<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VolunteerForm;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\VolunteerFormSubmit;

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

        // Send email to admin
        try {
            Mail::to('mwangimonica123@gmail.com')->send(new \App\Mail\VolunteerFormSubmit([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'] ?? '',
                'skills' => $validated['skills'],
                'availability' => $validated['availability'],
                'motivation' => $validated['motivation'],
                'experience' => $validated['experience'] ?? ''
            ]));
        } catch (\Exception $e) {
            // Log error or return failure response (optional)
            return response()->json([
                'message' => 'Application saved, but email failed to send.',
                'error' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Application submitted successfully!',
            'data' => $application
        ], 201);
    }
}
