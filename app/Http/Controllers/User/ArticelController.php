<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArtikelRequest;
use App\Models\Articel;
use App\Models\TestimonialTraining;
use App\Models\ViewerArticels;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert as SweetAlert;

class ArticelController extends Controller
{
    public function index()
    {

        $articel = Articel::latest()->first();


        return view('pages.user.articel.index', [
            'articels' => Articel::with('user')->get(),
            'articel' => $articel
        ]);
    }

    public function show(Articel $articel)
    {

        $ip = $_SERVER['REMOTE_ADDR'];
        $viewer = ViewerArticels::where([['ip', $ip], ['articel_id', $articel->id]])->first();

        if ($viewer) {
            // Tidak Akan Menambah View
        } else {
            ViewerArticels::create([
                'ip' => $ip,
                'articel_id' => $articel->id
            ]);
        }


        return view('pages.user.articel.show', [
            'articel' => $articel
        ]);
    }

    public function dashboard()
    {

        return view('auth.article', [
            'articels' => Articel::where([['user_id', Auth::user()->id], ['status', 'accepted']])->get(),
        ]);
    }

    public function create()
    {
        return view('auth.create-article');
    }

    public function store(ArtikelRequest $request)
    {
        $data = $request->all();

        $data['thumbnail'] = $request->file('thumbnail')->store('assets/articel/thumbnail', 'public');
        $data['slug'] = Str::slug($request->title) . '-' . Str::random(5);
        $data['user_id'] = Auth::user()->id;
        $data['status'] = 'on_review';

        try {
            Articel::create($data);
        } catch (Exception $e) {
            SweetAlert::toast('Data Artikel Gagal Ditambahkan', 'error')->timerProgressBar();

            return redirect()->route('profil.myarticel');
        }

        SweetAlert::toast('Data Artikel Berhasil Ditambahkan, tunggu review dari admin kami akan mengabarkan lewat email jika artikel disetujui', 'success')->timerProgressBar();
        return redirect()->route('profil.myarticel');
    }

    public function destroy($id)
    {
        $user = Auth::user()->id;

        $articel = Articel::where('id', $id)->where('user_id', $user)->first();

        if ($articel) {
            $articel->delete();
            return redirect()->route('dashboard')->with('success', 'Artikel Berhasil Dihapus');
        } else {
            return redirect()->route('dashboard')->with('error', 'Artikel Gagal Dihapus');
        }
    }
}
