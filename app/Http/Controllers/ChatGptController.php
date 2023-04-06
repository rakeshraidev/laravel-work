<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use OpenAI;
class ChatGptController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Get the message from the form data
        $message = $request->input('message');
        // Send the message to ChatGPT using the OpenAI API
        $client = OpenAI::client(config("app.openai_api_key"));
        $result = $client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $message,
            'max_tokens' => 256,
            'n' => 1,
            'temperature' => 0.9,
            'stop' => '\n',
        ]);

        // Get the response from ChatGPT
        $responseText = $result['choices'][0]['text'];

        // Return the response as a JSON object

        return response()->json(['message' => $responseText]);
    }
    public function uploadFile(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:csv,xlsx|max:2048',
        ]);

        // Upload the file to a temporary location
        $path = $request->file('file')->store('tmp');

        // Process the file using OpenAI's GPT-3 API
        $openai = new OpenAI();
        $result = $openai->complete([
            'model' => 'text-davinci-002',
            'prompt' => file_get_contents($path),
            'temperature' => 0.5,
            'max_tokens' => 100,
            'n' => 1,
            'stop' => '\n'
        ]);

        // Return the generated text as a response
        return response()->json([
            'generatedText' => $result->choices[0]->text,
        ]);
    }
}
