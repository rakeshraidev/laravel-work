<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class ChatAIController extends Controller
{
    //
    public function chatGpt(Request $request)
    {
        // Get the message from the form data
        $message = $request->input('message');

        // Send the message to ChatGPT using the OpenAI API
        $client = OpenAI::client(config("app.openai_api_key"));
        $result = $client->completions()->create([
            'engine' => 'text-davinci-002',
            'prompt' => $message,
            'max_tokens' => 150,
            'n' => 1,
            'temperature' => 0.9,
            'presence_penalty' => 0.6,
            'frequency_penalty' => 0,
            'stop' => '\n',
        ]);

        // Get the response from ChatGPT
        $response = $result['choices'][0]['text'];

        // Return the response as a JSON object

        return response()->json(['message' => $response]);
    }
}
