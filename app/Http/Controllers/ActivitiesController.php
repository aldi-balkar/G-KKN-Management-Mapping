<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Activities;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:activities-read', ['only' => ['index']]);
        $this->middleware('permission:activities-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:activities-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:activities-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pageTitle'] = 'KKN';
        $data['activities'] = Activities::get();

        return view('activities.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pageTitle'] = 'Tambah Data KKN';

        return view('activities.create', $data);
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
            'village_name' => 'required',
            'village_address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'activity_name' => 'required',
            'activity_description' => 'required',
            'student_name' => 'required',
            'student_study_program' => 'required',
            'student_phone' => 'required',
            'lecturer_name' => 'required',
            'lecturer_study_program' => 'required',
            'lecturer_phone' => 'required',
        ];

        $customMessages = [
            'village_name.required' => 'Nama desa belum diisi!',
            'village_address.required' => 'Alamat desa belum diisi!',
            'latitude.required' => 'Latitude belum diisi!',
            'longitude.required' => 'Longitude belum diisi!',
            'activity_name.required' => 'Nama kegiatan belum diisi!',
            'activity_description.required' => 'Deskripsi kegiatan belum diisi!',
            'student_name.required' => 'Nama mahasiswa belum diisi!',
            'student_study_program.required' => 'Program studi mahasiswa belum diisi!',
            'student_phone.required' => 'Nomor telepon mahasiswa belum diisi!',
            'lecturer_name.required' => 'Nama dosen belum diisi!',
            'lecturer_study_program.required' => 'Program studi dosen belum diisi!',
            'lecturer_phone.required' => 'Nomor telepon dosen belum diisi!',
        ];

        $this->validate($request, $rules, $customMessages);

        Activities::create([
            'village_name' => $request->village_name,
            'village_address' => $request->village_address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'activity_name' => $request->activity_name,
            'activity_description' => $request->activity_description,
            'status' => 'active',
            'student_name' => $request->student_name,
            'student_study_program' => $request->student_study_program,
            'student_phone' => $request->student_phone,
            'lecturer_name' => $request->lecturer_name,
            'lecturer_study_program' => $request->lecturer_study_program,
            'lecturer_phone' => $request->lecturer_phone,
        ]);

        return redirect('/activities')->with('message', 'Data telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['pageTitle'] = 'Detail Data KKN';
        $data['activities'] = Activities::find($id);
        $data['students'] = User::role('mahasiswa')->get();
        $data['lecturers'] = User::role('dosen')->get();

        return view('activities.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['pageTitle'] = 'Ubah Data KKN';
        $data['activities'] = Activities::find($id);

        return view('activities.edit', $data);
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
        $activities = Activities::find($id);
        $rules = [
            'village_name' => 'required',
            'village_address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'activity_name' => 'required',
            'activity_description' => 'required',
            'student_name' => 'required',
            'student_study_program' => 'required',
            'student_phone' => 'required',
            'lecturer_name' => 'required',
            'lecturer_study_program' => 'required',
            'lecturer_phone' => 'required',
        ];

        $customMessages = [
            'village_name.required' => 'Nama desa belum diisi!',
            'village_address.required' => 'Alamat desa belum diisi!',
            'latitude.required' => 'Latitude belum diisi!',
            'longitude.required' => 'Longitude belum diisi!',
            'activity_name.required' => 'Nama kegiatan belum diisi!',
            'activity_description.required' => 'Deskripsi kegiatan belum diisi!',
            'student_name.required' => 'Nama mahasiswa belum diisi!',
            'student_study_program.required' => 'Program studi mahasiswa belum diisi!',
            'student_phone.required' => 'Nomor telepon mahasiswa belum diisi!',
            'lecturer_name.required' => 'Nama dosen belum diisi!',
            'lecturer_study_program.required' => 'Program studi dosen belum diisi!',
            'lecturer_phone.required' => 'Nomor telepon dosen belum diisi!',
        ];

        $this->validate($request, $rules, $customMessages);

        $activities->update([
            'village_name' => $request->village_name,
            'village_address' => $request->village_address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'activity_name' => $request->activity_name,
            'activity_description' => $request->activity_description,
            'student_name' => $request->student_name,
            'student_study_program' => $request->student_study_program,
            'student_phone' => $request->student_phone,
            'lecturer_name' => $request->lecturer_name,
            'lecturer_study_program' => $request->lecturer_study_program,
            'lecturer_phone' => $request->lecturer_phone,
        ]);

        return redirect('/activities')->with('message', 'Data telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Activities::destroy($id);

        return redirect('/activities')->with('message', 'Data telah dihapus');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function maps()
    {
        $data['pageTitle'] = 'Sebaran KKN';
        $activities = Activities::get();

        $data['activities'] = $activities->map(function ($item) {
            return [
                'id' => $item->id,
                'village_name' => $item->village_name,
                'village_address' => $item->village_address,
                'latitude' => $item->latitude,
                'longitude' => $item->longitude,
                'activity_name' => $item->activity_name,
                'activity_description' => $item->activity_description,
                'status' => $item->status,
                'student' => $item->student_name,
                'lecturer' => $item->lecturer_name,
                'student_study_program' => $item->student_study_program,
                'lecturer_study_program' => $item->lecturer_study_program,
                'student_phone' => $item->student_phone,
                'lecturer_phone' => $item->lecturer_phone,
            ];
        });

        return view('activities.maps', $data);
    }
}
