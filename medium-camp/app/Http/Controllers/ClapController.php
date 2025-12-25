<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClapController extends Controller
{
    public function clap(Request $request, $postSlug)
    {
        $user = $request->user();
        $post = \App\Models\Post::where('slug', $postSlug)->firstOrFail();

        // Check if the user has already clapped for this post
        $existingClap = \App\Models\Clap::where('user_id', $user->id)
            ->where('post_id', $post->id)
            ->first();

        if ($existingClap) {
            // User has already clapped, so we unclap (remove the clap)
            $existingClap->delete();
            return response()->json(['clapsCount' => $post->claps()->count()]);
        }

        // Create a new clap
        \App\Models\Clap::create([
            'user_id' => $user->id,
            'post_id' => $post->id,
        ]);

        return response()->json(['clapsCount' => $post->claps()->count()]);
    }
}
