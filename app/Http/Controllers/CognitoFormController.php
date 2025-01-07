<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\CognitoSubmission;

class CognitoFormController extends Controller
{
    public function handleWebhook(Request $request)
    {
        try {
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

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            Log::error('Validation Error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Validation Failed',
                'details' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            // Handle general errors
            Log::error('General Error: ' . $e->getMessage());
            return response()->json([
                'error' => 'Internal Server Error',
                'reason' => $e->getMessage(),
            ], 500);
        }
    }
}
