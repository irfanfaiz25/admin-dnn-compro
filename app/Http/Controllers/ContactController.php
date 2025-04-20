<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContact()
    {
        $contact = Contact::first();
        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Contact data retrieved successfully',
            'data' => $contact,
        ], 200);
    }
}
