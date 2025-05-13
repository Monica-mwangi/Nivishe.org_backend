<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactForm;
use App\Mail\ContactFormSubmitted;

class ContactFormController extends Controller
{
    /**
     * Store a contact form submission.
     */
    // ContactFormController.php (Updated Code)
public function store(Request $request)
{
    try {
        // 1. Validate the incoming data
        $validated = $request->validate([
            'Name' => 'required|string|max:255',
            'Email' => 'required|email|max:255',
            'Message' => 'required|string',
        ]);

        // 2. Store in database (NO CONVERSION NEEDED)
        $contact = ContactForm::create($validated); 

        // 3. Send notification email 
        Mail::to('mwangimonica123@gmail.com')->send(new ContactFormSubmitted($validated));

        // 4. Return JSON response
        return response()->json(['message' => 'Success'], 201);

    } catch (\Illuminate\Validation\ValidationException $e) {
        // ... error handling
    }
}
}
