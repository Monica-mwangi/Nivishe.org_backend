<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommunityForm;
use App\Mail\CommunityFormSubmitted;
use Illuminate\Support\Facades\Mail;

class CommunityFormController extends Controller
{
    /**
     * Store a newly submitted community form.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'education' => 'required|string',
            'experience' => 'required|string',
            'motivation' => 'required|string',
        ]);
    
        // Store the form data into the database
        $form = CommunityForm::create($validated);
    
        try {
            // Send email to admin after successful form submission
            Mail::to('mwangimonica123@gmail.com')->send(new CommunityFormSubmitted($form));
        } catch (\Exception $e) {
            // Handle any error during email sending
            return response()->json([
                'message' => 'Form submitted successfully, but email failed to send.',
                'error' => $e->getMessage()
            ], 500);
        }

        return response()->json([
            'message' => 'Form submitted successfully!',
            'data' => $form
        ], 201);
    }
    
}
