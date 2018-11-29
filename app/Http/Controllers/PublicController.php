<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\CV;

class PublicController extends Controller
{
    /* download CV yg ada di email */
    public function downloadCV($id)
    {
        $id = Crypt::decrypt($id);

    	$document = CV::findOrFail($id);

        /* lokasi file */
        $file_path = public_path('CV_Candidate').'/'.$document->CV_candidate;

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response()->download($file_path , $document->CV_candidate, $headers);
    }
}
