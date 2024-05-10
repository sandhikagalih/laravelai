<?php

use Gemini\Data\Blob;
use Gemini\Enums\MimeType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/ai', function () {
    $yourApiKey = getenv('GEMINI_API_KEY');
    $client = Gemini::client($yourApiKey);

    // $result = $client->geminiPro()->generateContent('Hello');

    $result = $client->geminiProVision()
        ->generateContent([
            'What is this picture?',
            new Blob(
                mimeType: MimeType::IMAGE_JPEG,
                data: base64_encode(
                    file_get_contents('https://pbs.twimg.com/profile_images/1212306123878830080/tKGooqvh_400x400.jpg')
                )
            )
        ]);

    $aw = $result->text(); // Hello! How can I assist you today?
    dd($aw);
});


Route::get('/', function () {
    $yourApiKey = getenv('GEMINI_API_KEY');
    $client = Gemini::client($yourApiKey);

    $prompt = 'give me a good, funny and oneliner dad jokes with programming topic. It has to be simple, very funny, and all of the programmers know it.';

    $result = $client->geminiPro()->generateContent($prompt);
    // $result = 'lorem ipsum dolor sit amet';
    return view('joke', ['joke' => $result->text()]);
});

Route::get('/img', function () {
    // $yourApiKey = getenv('GEMINI_API_KEY');
    // $client = Gemini::client($yourApiKey);

    return view('img');
});

Route::post('/img', function (Request $request) {
    $yourApiKey = getenv('GEMINI_API_KEY');
    $client = Gemini::client($yourApiKey);

    $img = $request->file('file-upload')->store('img');

    $path = storage_path('app/public/' . $img);

    $result = $client->geminiProVision()
        ->generateContent([
            'identify what dish is this. examine what are the ingredients, estimate how many calories from each ingredient, count the total and summarize is the dish healthy or not. put the response in formatted html tag so that it is easy to read.',
            new Blob(
                mimeType: MimeType::IMAGE_JPEG,
                data: base64_encode(
                    file_get_contents($path)
                )
            )
        ]);

    return view('img', ['img' => $img, 'result' => $result->text() ?? 'No result found']);
});
