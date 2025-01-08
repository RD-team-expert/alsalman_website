<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\CognitoSubmission;

class CognitoFormController extends Controller
{
    public function handleWebhook(Request $request)
    {
        Log::info('Webhook hit: Start processing request.');

        try {
            // Log the entire incoming request payload
            Log::info('Incoming request payload:', $request->all());

            // Retrieve formId and entry without validation
            $formId = $request->input('formId', 'unknown-form'); // Default to 'unknown-form' if formId is missing
            Log::info('Retrieved formId:', ['formId' => $formId]);

            $entry = $request->input('entry', []); // Default to an empty array if entry is missing
            Log::info('Retrieved entry data:', ['entry' => $entry]);

            // Store the data in the database
            $submission = CognitoSubmission::create([
                'form_id' => $formId,
                'submission_data' => json_encode($entry),
            ]);
            Log::info('Data successfully saved to the database:', ['submission' => $submission]);

            // Return a success response
            Log::info('Webhook processed successfully.');
            return response()->json(['message' => 'Webhook data saved successfully'], 200);

        } catch (\Exception $e) {
            // Log the error
            Log::error('Error occurred while processing webhook:', ['error' => $e->getMessage()]);
            return response()->json([
                'error' => 'Internal Server Error',
                'reason' => $e->getMessage(),
            ], 500);
        }
    }
}
