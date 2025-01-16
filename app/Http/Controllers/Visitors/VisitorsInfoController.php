<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Log;

class VisitorsInfoController extends Controller
{
    /**
     * Show the form using Inertia.js.
     */
    public function showForm()
    {
        // Render the Vue component via Inertia
        return view('form');
    }

    /**
     * Handle form submission.
     */
    public function handleForm(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
        ]);
    
        $html = view('pdf.template', $data)->render();
        $filePath = storage_path('app/public/user-info.pdf');
        // return view('pdf.template', $data)->render();

        try {
            Browsershot::html($html)
                ->timeout(300) // Increase timeout
                ->format('A4') // Set format
                ->save($filePath);
            return response()->file($filePath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="user-info.pdf"',
            ]);
        } catch (\Exception $e) {
            Log::error('PDF Generation Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to generate PDF.'], 500);
        }
    }
    
}
