<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TrainingRequest;
use App\Models\Category;
use App\Models\Training;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert as SweetAlert;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.training.index', [
            'trainings' => Training::with(['category', 'mentor'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $mentors = User::with('roles')->whereHas('roles', function ($query) {
            $query->where('name', 'mentor');
        })->get();

        return view('pages.admin.training.create', [
            'categories' => Category::all(),
            'mentors' => $mentors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainingRequest $request)
    {

        $data = $request->validated();

        $data['thumbnail'] = $request->file('thumbnail')->store('assets/training/thumbnail', 'public');
        $data['trailer_url'] = str_replace("https://youtu.be/", "https://www.youtube.com/embed/", $request->trailer_url);
        $data['youtube_url'] = str_replace("https://youtu.be/", "https://www.youtube.com/embed/", $request->youtube_url);
        $data['slug'] = Str::slug($request->title) . '-' . Str::random(5);
        $data['rating'] = 0.0;

        Training::create($data);


        SweetAlert::toast('Data Pelatihan Berhasil Ditambahkan', 'success')->timerProgressBar();

        return redirect()->route('admin.pelatihan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pages.admin.training.edit', [
            'training' => Training::findOrFail($id),
            'categories' => Category::all(),
            'mentors' => User::with('roles')->whereHas('roles', function ($query) {
                $query->where('name', 'mentor');
            })->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $item = Training::findOrFail($id);

        if ($request->file('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('assets/training/thumbnail', 'public');
        }

        $data['trailer_url'] = str_replace("https://youtu.be/", "https://www.youtube.com/embed/", $request->trailer_url);
        $data['youtube_url'] = str_replace("https://youtu.be/", "https://www.youtube.com/embed/", $request->youtube_url);

        try {
            $item->update($data);
        } catch (Exception $e) {
            SweetAlert::toast('Data Pelatihan Gagal Diubah', 'error')->timerProgressBar();

            return redirect()->route('admin.pelatihan.index');
        }

        SweetAlert::toast('Data Pelatihan Berhasil Diubah', 'success')->timerProgressBar();
        return redirect()->route('admin.pelatihan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $item = Training::findOrFail($id);
            $item->delete();
        } catch (Exception $e) {
            SweetAlert::toast('Data Pelatihan Gagal Dihapus', 'error')->timerProgressBar();

            return redirect()->route('admin.pelatihan.index');
        }

        SweetAlert::toast('Data Pelatihan Berhasil Dihapus', 'success')->timerProgressBar();
        return redirect()->route('admin.pelatihan.index');
    }
}
