<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'temperature' => 0.1,
            'top_p' => 1,
            'stop' => '\n',
        ]);

        // Get the response from ChatGPT
        $responseText = $result['choices'][0]['text'];

        // Return the response as a JSON object

        return response()->json(['message' => $responseText]);
    }
}
