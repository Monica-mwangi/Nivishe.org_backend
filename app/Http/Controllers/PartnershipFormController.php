<?php

namespace App\Http\Controllers;

use App\Models\PartnershipForm;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\PartnershipMail;


class PartnershipFormController extends Controller
{
    /**
     * Store a new partnership form submission.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'organization' => 'required|string|max:255',
        'contactPerson' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'website' => 'nullable|url|max:255',
        'partnershipType' => 'required|string|max:255',
        'organizationType' => 'required|string|max:255',
        'missionAlignment' => 'required|string',
        'resourcesOffered' => 'required|string',
        'expectations' => 'required|string',
        'previousPartnerships' => 'nullable|string',
    ]);

    // Convert camelCase to snake_case for DB
    $dbData = [];
    foreach ($validated as $key => $value) {
        $dbKey = \Illuminate\Support\Str::snake($key);
        $dbData[$dbKey] = $value;
    }

    // Store the form
    PartnershipForm::create($dbData);

    // Send email
    try {
        Mail::to('info@nivishefoundation.org')->send(new PartnershipMail($validated));
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Form saved, but email failed to send.',
            'error' => $e->getMessage()
        ], 500);
    }

    return response()->json(['message' => 'Form submitted successfully!'], 201);
}

}
