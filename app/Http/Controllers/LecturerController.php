<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\StudyProgram;
use App\Models\Activities;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class LecturerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:lecturers-read', ['only' => ['index']]);
        $this->middleware('permission:lecturers-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:lecturers-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:lecturers-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageTitle'] = 'Dosen';
        $data['lecturers'] = User::role('dosen')->get();

        return view('lecturers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Tambah Data Dosen';
        $data['studyprograms'] = StudyProgram::all();

        return view('lecturers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'code' => 'required',
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'unique:users'],
            'username' => ['required', 'string', 'max:20', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
            'role' => 'required',
        ];

        $customMessages = [
            'code.required' => 'NIDN belum diisi!',
            'name.required' => 'Nama belum diisi!',
            'email.required' => 'Email belum diisi!',
            'email.unique' => 'Email telah digunakan!',
            'username.required' => 'Nama pengguna belum diisi!',
            'username.unique' => 'Nama pengguna telah digunakan!',
            'password.required' => 'Kata sandi belum diisi!',
            'password.confirmed' => 'Kata sandi tidak cocok!',
            'role.required' => 'Role belum diisi!',
        ];

        $this->validate($request, $rules, $customMessages);

        $user = User::create([
            'code' => $request->code,
            'name' => $request->name,
            'email' => $request->email,
            'study_program_id' => $request->study_program_id,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);
        $user->assignRole($request->role);

        return redirect('/lecturers')->with('message', 'Data telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pageTitle'] = 'Ubah Data Dosen';
        $data['lecturer'] = User::find($id);
        $data['roles'] = Role::all();
        $data['studyprograms'] = StudyProgram::all();

        return view('lecturers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $rules = [
            'code' => 'required',
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'unique:users,email,' . $user->id],
            'username' => ['required', 'string', 'max:20', 'unique:users,username,' . $user->id],
            'password' => 'confirmed',
        ];

        $customMessages = [
            'code.required' => 'NIDN belum diisi!',
            'name.required' => 'Nama belum diisi!',
            'email.required' => 'Email belum diisi!',
            'email.unique' => 'Email telah digunakan!',
            'username.required' => 'Nama pengguna belum diisi!',
            'username.unique' => 'Nama pengguna telah digunakan!',
            'password.confirmed' => 'Kata sandi tidak cocok!',
        ];

        $this->validate($request, $rules, $customMessages);

        if ($request->password == null) {
            $user = User::find($user->id);
            $user->update([
                'code' => $request->code,
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
            ]);

            return redirect('/lecturers')->with('message', 'Data telah diubah');
        } else {
            $user = User::find($user->id);
            $user->update([
                'code' => $request->code,
                'name' => $request->name,
                'email' => $request->email,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);

            return redirect('/lecturers')->with('message', 'Data telah diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $onActivities = Activities::where('lecturer_id', $user->id)->get();

        if ($onActivities->count() > 0) {
            return redirect('/lecturers')->with('message', 'Data tidak dapat dihapus karena sedang mengikuti kegiatan');
        }

        User::destroy($id);

        return redirect('/lecturers')->with('message', 'Data telah dihapus');
    }
}
