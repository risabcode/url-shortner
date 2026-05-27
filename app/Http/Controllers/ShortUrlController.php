<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShortUrlController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role->name == 'SuperAdmin') {

            $shortUrls = collect();

        } elseif ($user->role->name == 'Admin') {

            $shortUrls = ShortUrl::whereHas('user', function ($q) use ($user) {

                $q->where('company_id', '!=', $user->company_id);

            })->latest()->get();

        } elseif ($user->role->name == 'Member') {

            $shortUrls = ShortUrl::where('user_id', '!=', $user->id)
                ->latest()
                ->get();

        } else {

            $shortUrls = ShortUrl::latest()->get();
        }

        return view('short-urls.index', compact('shortUrls'));
    }


    public function create()
    {
        return view('short-urls.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'original_url' => 'required|url'
        ]);

        $user = auth()->user();

        if (in_array($user->role->name, ['SuperAdmin', 'Admin', 'Member'])) {

            abort(403);
        }

        ShortUrl::create([

            'user_id' => $user->id,
            'original_url' => $request->original_url,
            'short_code' => Str::random(6),

        ]);

        return redirect()
            ->route('short-urls.index')
            ->with('success', 'Short URL created successfully.');
    }
}