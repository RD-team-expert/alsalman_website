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
            // Log incoming request payload
            Log::info('Webhook received:', $request->all());

            // Decode the payload into an array
            $payload = $request->all();

            // Extract relevant data
            $formId = $payload['Form']['Id'] ?? 'Unknown Form ID';
            $name = $payload['Name']['FirstAndLast'] ?? 'Unknown Name';
            $email = $payload['Email'] ?? 'Unknown Email';
            $phone = $payload['WhatsAppPhoneNumber'] ?? 'Unknown Phone'; // Extract WhatsApp number
            $amount = $payload['Amount_Value'] ?? 0;
            $submissionDate = $payload['Entry']['DateSubmitted'] ?? now();

            // Store in the database
            CognitoSubmission::create([
                'form_id' => $formId,
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'amount' => $amount,
                'submission_date' => $submissionDate,
                'submission_data' => json_encode($payload), // Store full payload if needed
            ]);

            Log::info('Webhook data saved successfully.');
            return response()->json(['message' => 'Webhook data saved successfully'], 200);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error processing webhook:', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function index()
    {
        // Fetch all entries and calculate the total amount
        $entries = CognitoSubmission::paginate(10);
        $totalAmount = CognitoSubmission::sum('amount');

        return view('admin.entries', compact('entries', 'totalAmount'));
    }
}
