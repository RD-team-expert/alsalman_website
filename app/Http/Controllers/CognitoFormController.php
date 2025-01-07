<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CognitoSubmission;

class CognitoFormController extends Controller
{
    public function handleWebhook(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'formId' => 'required|string',
            'entry' => 'required|array',
        ]);

        // Store the validated data in the database
        CognitoSubmission::create([
            'form_id' => $validated['formId'],
            'submission_data' => json_encode($validated['entry']),
        ]);

        // Return a success response for the webhook
        return response()->json(['message' => 'Webhook data saved successfully'], 200);
    }
}
