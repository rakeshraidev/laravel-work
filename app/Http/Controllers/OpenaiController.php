<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI;

class OpenaiController extends Controller
{
    //
    public function modrationApi(Request $request)
    {
        $input = $request->q;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.openai.com/v1/moderations',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
        "input": "' . $input . '"
      }
    ',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer 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'
            ),
        ));
        $response = curl_exec($curl);
        $result = json_decode($response);
        dd($result);
        curl_close($curl);
        // echo $response;

    }
    public function index(Request $input)
    {
        if ($input->title == null) {
            return;
        }
        $title = $input->title;
        $client = OpenAI::client(config("app.openai_api_key"));
        $result = $client->completions()->create([
            "model" => "text-davinci-003",
            "temperature" => 0.7,
            "top_p" => 1,
            "frequency_penalty" => 0,
            "presence_penalty" => 0,

            'max_tokens' => 150,
            'prompt' => sprintf('Write article about: %s', $title),
        ]);
        $content = trim($result['choices'][0]['text']);
        return view('write', compact('title', 'content'));
    }
}
