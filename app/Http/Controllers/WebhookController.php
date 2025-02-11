<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function showForm()
    {
        return view('webhook.form'); 
    }

    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        $data = [
            'FIELDS' => [
                'NAME' => $validatedData['name'],
                'PHONE' => [['VALUE' => $validatedData['phone'], 'VALUE_TYPE' => 'WORK']],
                'EMAIL' => [['VALUE' => $validatedData['email'], 'VALUE_TYPE' => 'WORK']],
            ]
        ];

        $response = Http::post(env('BITRIX_WEBHOOK_URL'), $data);

        if ($response->successful()) {
            return back()->with('success', 'Лид успешно создан!');
        } else {
            Log::error('Ошибка при создании лида: ' . $response->body());
            return back()->withErrors(['error' => 'Произошла ошибка при создании лида.']);
        }
    }
}
