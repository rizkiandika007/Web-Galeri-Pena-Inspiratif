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
        ->whereDoesntHave('kategori', function($q) {
            $q->whereIn('judul', ['Peta Sekolah', 'Agenda']);
        })
        ->with(['kategori', 'user', 'galeries.fotos'])
        ->latest()
        ->take(5)
        ->get();

        //ambil semua galeri yang punya foto, beserta relasi post dan foto
        $galeries = Galery::whereHas('fotos')
        ->whereHas('post', function($query) {
            $query->whereDoesntHave('kategori', function($q) {
                $q->whereIn('judul', ['Peta Sekolah', 'Agenda']);
            });
        })
        ->with(['fotos', 'post.user', 'post.kategori'])
        ->where('status',true)
        ->latest()
        ->take(5)
        ->get();

        //peta sekolah: ambil galeri yang post nya berkategori "peta sekolah"
        $petaSekolah = Galery::whereHas('post.kategori', function ($query){
            $query->where('judul', 'Peta Sekolah');
        })
        ->with(['fotos', 'post'])
        ->latest()
        ->first();

        //agenda sekolah: ambil dari Agenda resource
        $agendas = Agenda::latest()
        ->take(3)
        ->get();

        return view('beranda', compact('posts', 'galeries', 'petaSekolah', 'agendas'));
        
    }

    public function galeri()
    {
        $galeries = Galery::whereHas('fotos')
            ->whereHas('post', function($query) {
                $query->where('status', 'published')
                    ->whereDoesntHave('kategori', function($q) {
                        $q->whereIn('judul', ['Peta Sekolah', 'Agenda']);
                    });
            })
            ->with(['fotos', 'post.user', 'post.kategori'])
            ->where('status', true)
            ->latest()
            ->get();

        return view('galeri', compact('galeries'));
    }

    public function agenda()
    {
        $agendas = Agenda::latest()->get();
        return view('agenda', compact('agendas'));
    }

    public function tentangKami()
    {
        $profile = Profile::first();
        $pengurus = Pengurus::all();
        return view('tentangKami', compact('profile', 'pengurus'));
    }

    public function detailGaleri($id)
    {
        $galeri = Galery::with(['post.user', 'post.kategori', 'fotos'])->findOrFail($id);
        
        $latestPosts = Post::where('status', 'published')
            ->whereDoesntHave('kategori', function($q) {
                $q->whereIn('judul', ['Peta Sekolah', 'Agenda']);
            })
            ->with(['kategori', 'user', 'galeries.fotos'])
            ->latest()
            ->take(3)
            ->get();
            
        return view('detail', compact('galeri', 'latestPosts'));
    }

    public function detailPost($id)
    {
        $post = Post::with(['user', 'kategori', 'galeries.fotos'])->findOrFail($id);
        
        $latestPosts = Post::where('status', 'published')
            ->whereDoesntHave('kategori', function($q) {
                $q->whereIn('judul', ['Peta Sekolah', 'Agenda']);
            })
            ->with(['kategori', 'user', 'galeries.fotos'])
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();
            
        return view('detailPost', compact('post', 'latestPosts'));
    }

    public function detailAgenda($id)
    {
        $agenda = Agenda::findOrFail($id);
        
        $latestAgendas = Agenda::where('id', '!=', $agenda->id)
            ->latest()
            ->take(3)
            ->get();
            
        return view('detailAgenda', compact('agenda', 'latestAgendas'));
    }
    
}
