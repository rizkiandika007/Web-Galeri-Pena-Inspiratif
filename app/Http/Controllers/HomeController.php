<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Galery;
use App\Models\Profile;
use App\Models\Pengurus;
use App\Models\Agenda;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function beranda()
    {
        $posts = Post::where('status', 'published')
            ->whereDoesntHave('kategori', function ($q) {
                $q->whereIn('judul', ['Peta Sekolah', 'Agenda']);
            })
            ->with(['kategori', 'user', 'galeries.fotos'])
            ->latest()
            ->take(5)
            ->get();

        //ambil semua galeri yang punya foto, beserta relasi post dan foto
        $galeries = Galery::whereHas('fotos')
            ->whereHas('post', function ($query) {
                $query->whereDoesntHave('kategori', function ($q) {
                    $q->whereIn('judul', ['Peta Sekolah', 'Agenda']);
                });
            })
            ->with(['fotos', 'post.user', 'post.kategori'])
            ->where('status', true)
            ->latest()
            ->take(5)
            ->get();

        //peta sekolah: ambil galeri yang post nya berkategori "peta sekolah"
        $petaSekolah = Galery::whereHas('post.kategori', function ($query) {
            $query->where('judul', 'Peta Sekolah');
        })
            ->with(['fotos', 'post'])
            ->latest()
            ->first();

        //agenda sekolah: ambil dari Agenda resource yang belum terlewat
        $agendas = Agenda::where('tanggal_pelaksanaan', '>=', now()->toDateString())
            ->orderBy('tanggal_pelaksanaan', 'asc')
            ->take(3)
            ->get();

        $profile = Profile::first();

        return view('beranda', compact('posts', 'galeries', 'petaSekolah', 'agendas', 'profile'));

    }

    public function galeri()
    {
        $galeries = Galery::whereHas('fotos')
            ->whereHas('post', function ($query) {
                $query->where('status', 'published')
                    ->whereDoesntHave('kategori', function ($q) {
                        $q->whereIn('judul', ['Peta Sekolah', 'Agenda']);
                    });
            })
            ->with(['fotos', 'post.user', 'post.kategori'])
            ->where('status', true)
            ->latest()
            ->get();

        $profile = Profile::first();

        return view('galeri', compact('galeries', 'profile'));
    }

    public function agenda()
    {
        $agendas = Agenda::where('tanggal_pelaksanaan', '>=', now()->toDateString())
            ->orderBy('tanggal_pelaksanaan', 'asc')
            ->get();
        $profile = Profile::first();
        return view('agenda', compact('agendas', 'profile'));
    }

    public function tentangKami()
    {
        $profile = Profile::first();
        return view('tentangKami', compact('profile'));
    }

    public function pengurus()
    {
        $pengurus = Pengurus::all();
        $profile = Profile::first();
        return view('pengurus', compact('pengurus', 'profile'));
    }

    public function detailGaleri($id)
    {
        $galeri = Galery::with(['post.user', 'post.kategori', 'post.tag', 'fotos'])->findOrFail($id);

        $latestPosts = Post::where('status', 'published')
            ->whereDoesntHave('kategori', function ($q) {
                $q->whereIn('judul', ['Peta Sekolah', 'Agenda']);
            })
            ->with(['kategori', 'user', 'galeries.fotos'])
            ->latest()
            ->take(3)
            ->get();

        $profile = Profile::first();

        return view('detail', compact('galeri', 'latestPosts', 'profile'));
    }

    public function detailPost($id)
    {
        $post = Post::with(['user', 'kategori','tags', 'galeries.fotos'])->findOrFail($id);

        $latestPosts = Post::where('status', 'published')
            ->whereDoesntHave('kategori', function ($q) {
                $q->whereIn('judul', ['Peta Sekolah', 'Agenda']);
            })
            ->with(['kategori', 'user', 'galeries.fotos'])
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        $profile = Profile::first();

        return view('detailPost', compact('post', 'latestPosts', 'profile'));
    }

    public function detailAgenda($id)
    {
        $agenda = Agenda::findOrFail($id);

        $latestAgendas = Agenda::where('id', '!=', $agenda->id)
            ->where('tanggal_pelaksanaan', '>=', now()->toDateString())
            ->orderBy('tanggal_pelaksanaan', 'asc')
            ->take(3)
            ->get();

        $profile = Profile::first();

        return view('detailAgenda', compact('agenda', 'latestAgendas', 'profile'));
    }

}
