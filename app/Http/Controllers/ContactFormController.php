<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactFormController extends Controller
{
    /**
     * Store a contact form submission.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'Name' => 'required|string|max:255',
                'Email' => 'required|email|max:255',
                'Message' => 'required|string',
            ]);
    
            $contact = ContactForm::create($validatedData);
    
            return response()->json([
                'message' => 'Contact form submitted successfully.',
                'data' => $contact
            ], 201);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Server error',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
