<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArtikelRequest;
use App\Mail\Admin\ConfirmationArticel;
use App\Models\Articel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert as SweetAlert;

class ArticelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.articel.index', [
            'articels' => Articel::with('user')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.articel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArtikelRequest $request)
    {
        $data = $request->all();

        $data['thumbnail'] = $request->file('thumbnail')->store('assets/articel/thumbnail', 'public');
        $data['slug'] = Str::slug($request->title) . '-' . Str::random(5);
        $data['user_id'] = Auth::user()->id;

        try {
            Articel::create($data);
        } catch (Exception $e) {
            SweetAlert::toast('Data Artikel Gagal Ditambahkan', 'error')->timerProgressBar();

            return redirect()->route('admin.artikel.index');
        }

        SweetAlert::toast('Data Artikel Berhasil Ditambahkan', 'success')->timerProgressBar();
        return redirect()->route('admin.artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.admin.articel.show', [
            'articel' => Articel::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $articel = Articel::findOrFail($id);

        try {
            $articel->delete();
        } catch (Exception $e) {
            SweetAlert::toast('Data Artikel Gagal Dihapus', 'error')->timerProgressBar();

            return redirect()->route('admin.artikel.index');
        }

        SweetAlert::toast('Data Artikel Berhasil Dihapus', 'success')->timerProgressBar();

        return redirect()->route('admin.artikel.index');
    }
}
