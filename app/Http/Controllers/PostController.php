<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;


class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function follow(User $user)
    {
        // User hiện tại bắt đầu theo dõi người dùng khác
        auth()->user()->following()->attach($user->id);

        return back();
    }

    public function unfollow(User $user)
    {
        // User hiện tại hủy theo dõi người dùng khác
        auth()->user()->following()->detach($user->id);

        return back();
    }


    public function index()
    {
        $users = auth()->user()->following()->pluck('users.id'); // Chỉ rõ bảng users

        $posts = Post::whereIn('user_id', $users)->latest()->get();
        return view('posts.index', compact('posts', 'users'));
    }
    public function create()
    {
        // $user = User::findOrFail($user);
        return view('posts.create');
    }

    public function show(\App\Models\Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function store()
    {
        $data = request()->validate([
            'caption' => ['required'],
            'image' => ['required', 'image'],
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        // $manager = new ImageManager(new Driver());

        // $image = $manager->read(public_path("storage/{$imagePath}"));

        // $image->resize(1200, null, function ($constraint) {
        //     $constraint->aspectRatio();
        // });

        // $watermark = public_path('images/watermark.png');
        // $image->insert($watermark, 'bottom-right', 10, 10);

        // $processedImagePath = 'uploads/' . uniqid() . '.png';
        // $image->save(public_path("storage/{$processedImagePath}"));

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('profile/' . auth()->user()->id);
    }
}
