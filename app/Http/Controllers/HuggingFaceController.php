<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HuggingFaceController extends Controller
{
    public function queryModel(Request $request)
    {
                                                                   // Hugging Face API URL for text generation (GPT-2 example)
        $url = 'https://api-inference.huggingface.co/models/gpt2'; // Replace with your desired model

        // Get the Hugging Face API token from the .env file
        $apiKey = env('HUGGINGFACE_API_KEY');

        // Send a POST request to Hugging Face's API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
        ])->post($url, [
            'inputs' => $request->input('text'), // Input text to process
        ]);

        // Return the response (you can handle it however you need)
        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Failed to get response from Hugging Face API'], 500);
        }
    }

    public function queryQuestionAnswer(Request $request)
    {
        // Hugging Face API URL for question answering (DistilBERT model example)
        $url = 'https://api-inference.huggingface.co/models/distilbert-base-uncased-distilled-squad';

        // Get the Hugging Face API token from the .env file
        $apiKey = env('HUGGINGFACE_API_KEY');

        // Validate the request inputs
        $request->validate([
            'context'  => 'required|string',
            'question' => 'required|string',
        ]);

        // Send a POST request to Hugging Face's API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
        ])->post($url, [
            'context'  => $request->input('context'),  // Provide the context to the model
            'question' => $request->input('question'), // Provide the question to the model
        ]);

        // Check if the response was successful
        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Failed to get response from Hugging Face API'], 500);
        }
    }

    public function queryPretrainedQuestionAnswer(Request $request)
    {
        // Hugging Face API URL for question answering (DistilBERT model)
        $url = 'https://api-inference.huggingface.co/models/distilbert-base-uncased-distilled-squad';

        // Get the Hugging Face API token from the .env file
        $apiKey = env('HUGGINGFACE_API_KEY');

        // Validate incoming data
        $request->validate([
            'context'  => 'required|string',
            'question' => 'required|string',
        ]);

        // Send a POST request to Hugging Face's API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
        ])->post($url, [
            'context'  => "web",                       // The context you provide
            'question' => $request->input('question'), // The question you want an answer to
        ]);

        // Check if the response was successful and return the answer
        if ($response->successful()) {
            return response()->json([
                'answer' => $response->json()['answer'],
            ]);
        } else {
            return response()->json(['error' => 'Failed to get response from Hugging Face API'], 500);
        }
    }

}
