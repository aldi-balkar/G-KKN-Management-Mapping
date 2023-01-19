<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\StudyProgram;

class StudyProgramController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:studyprograms-read', ['only' => ['index']]);
        $this->middleware('permission:studyprograms-create', ['only' => ['store']]);
        $this->middleware('permission:studyprograms-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:studyprograms-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data['pageTitle'] = 'Program Studi';
        $data['studyprograms'] = StudyProgram::all();

        return view('study_programs', $data);
    }

    public function store(Request $request)
    {
        StudyProgram::create([
            'code' => $this->generateCode(),
            'slug' => Str::slug($request->name),
            'name' => $request->name
        ]);

        return redirect('/studyprograms')->with('message', 'Data telah ditambahkan');
    }

    public function edit($id)
    {
        $studyprograms = StudyProgram::find($id);

        return response()->json([
            'studyprograms' => $studyprograms,
        ]);
    }

    public function update(Request $request, StudyProgram $studyprogram)
    {
        $studyprogram = StudyProgram::find($studyprogram->id);
        $studyprogram->slug = Str::slug($request->name);
        $studyprogram->name = $request->name;
        $studyprogram->save();

        return redirect('/studyprograms')->with('message', 'Data telah diubah');
    }

    public function destroy(StudyProgram $studyprogram)
    {
        $studyprogram = StudyProgram::find($studyprogram->id);
        $studyprogram->delete();

        return redirect('/studyprograms')->with('message', 'Data telah dihapus');
    }

    private function generateCode()
    {
        $code = 'SP-';
        $lastCode = StudyProgram::orderBy('id', 'desc')->first();

        if ($lastCode) {
            $lastCode = $lastCode->code;
            $lastCode = explode('-', $lastCode);
            $lastCode = $lastCode[1];
            $lastCode = (int) $lastCode + 1;
            $lastCode = str_pad($lastCode, 3, '0', STR_PAD_LEFT);
            $code .= $lastCode;
        } else {
            $code .= '001';
        }

        return $code;
    }
}
