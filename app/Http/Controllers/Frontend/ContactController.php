<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactSubmission;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $header = \App\Models\PageContent::getContent('contact', 'header');
        $registryInfo = \App\Models\PageContent::getContent('contact', 'registry_info');
        
        return view('frontend.contact', compact('header', 'registryInfo'));
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        // Store the contact submission with security tracking
        ContactSubmission::create([
            'name' => strip_tags($validated['name']),
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'subject' => strip_tags($validated['subject']),
            'message' => strip_tags($validated['message']),
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        // Send email notification
        try {
            $recipient = env('CONTACT_RECIPIENT_EMAIL', 'kosar.latif88@gmail.com');
            Mail::to($recipient)->send(new ContactMail($validated));
        } catch (\Exception $e) {
            // Log error but don't fail the submission
            \Log::error('Failed to send contact email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}
