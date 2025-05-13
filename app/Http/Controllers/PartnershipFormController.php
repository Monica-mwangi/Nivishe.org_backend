<?php

namespace App\Http\Controllers;

use App\Models\PartnershipForm;
use Illuminate\Http\Request;
use Illuminate\support\Str;

class PartnershipFormController extends Controller
{
    /**
     * Store a new partnership form submission.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            // camelCase from React
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
    
        // Convert camelCase to snake_case
        $dbData = [];
        foreach ($validated as $key => $value) {
            $dbKey = Str::snake($key);
            $dbData[$dbKey] = $value;
        }
    
        PartnershipForm::create($dbData);
    
        return response()->json(['message' => 'Form submitted!'], 201);
    }
}
