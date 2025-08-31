<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('website.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000'
        ]);

        // Save to database
        $message = Message::create($validated);

        // Send email notification
        try {
            Mail::to(config('mail.admin_email', 'umer@example.com'))
                ->send(new ContactFormMail($message));
        } catch (\Exception $e) {
            // Log the error but don't fail the form submission
            Log::error('Failed to send contact form email: ' . $e->getMessage());
        }

        return redirect()->route('contact')->with('success', 'Thank you for your message! I will get back to you soon.');
    }
}
