<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Videos;
use App\Models\Txt;
use App\Models\Pdf;

class ManagerContentController extends Controller
{



    public function DeleteVideo($id){

        $Video = Videos::findOrFail($id);
        $Video->delete();

        toast(__('Video has been deleted successfully'), 'success');
        return redirect()->back();
    }


    public function DeleteTxt($id){

        $txt = Txt::findOrFail($id);
        $txt->delete();

        toast(__('The text has been successfully deleted'), 'success');
        return redirect()->back();
    }


    public function DeletePdf($id){

        $pdf = Pdf::findOrFail($id);
        $pdf->delete();

        toast(__('The pdf file has been successfully deleted'), 'success');
        return redirect()->back();
    }
}
