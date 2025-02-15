<?php

namespace App\Http\Controllers\Visitors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Spatie\Browsershot\Browsershot;
use App\Models\Invitation;

class VisitorsInfoController extends Controller
{
    /**
     * Show the form using Inertia.js.
     */
    public function showForm()
    {
        return view('form');
    }

    /**
     * Handle form submission.
     */
    public function handleForm(Request $request,Invitation $invetation)
    {
        // Validate the request data
      // Validate the request data
      $data = $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:invitations,email',
        'cat' => 'required|string',
        'org' => 'nullable|string',
    ],['email.unique' => 'عذرا ,بريدك الالكتروني مسجل من قبل !']);

        $html = view('pdf.template', $data)->render();

        // Generate a random file name
        $randomFileName = 'invitation_' . Str::random(10) . '.pdf';
        $filePath = storage_path("app/public/{$randomFileName}");
        $invetation->create($data);

        try {
            // Generate the PDF file
            Browsershot::html($html)
                ->timeout(3000)
                ->format('A4')
                ->save($filePath);
        // Save To database

        $invetation->create($data);

            // Open the PDF directly in the browser
            return response()->file($filePath, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $randomFileName . '"',
            ]);

        } catch (\Exception $e) {
            // Log and return error response
            Log::error('PDF Generation Error: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to generate PDF.'], 500);
        }
    }


    /**Get invetations */
    public function showInvitations()
{
    try {
        // Fetch all invitations from the database
        $invitations = Invitation::latest()->get();

        // Return the view with data
        return view('invitations.index', compact('invitations'));
    } catch (\Exception $e) {
        Log::error('Error fetching stored data: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to retrieve data.');
    }
}


}
