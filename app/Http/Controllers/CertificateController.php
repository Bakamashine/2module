<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchCertRequest;
use App\Http\Requests\StoreCertRequest;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Number;
use Str;

class CertificateController extends Controller
{
    protected function RandomNumberString($count = 12)
    {
        $str = '';
        for ($i = 0; $i < $count; $i++) {
            $str .= rand(1, 9);
        }
        return $str;
    }
    public function CreateCert(StoreCertRequest $request)
    {

        $cert = Certificate::create([
            "student_id" => $request->student_id,
            "course_id" => $request->course_id,
            "number" => Str::random(6) . $this->RandomNumberString() . "1"
        ]);
        return response()->json(
            [
                'course_number' => $cert->number
            ]
        );
    }

    public function SearchCert(SearchCertRequest $request)
    {
        $cert = Certificate::where("number", $request->sertikate_number)->first();
        if ($cert) {
            return response()->json([
                "status" => "success"
            ]);
        } else
            return response()->json([
                "status" => "failed"
            ]);
    }
}
