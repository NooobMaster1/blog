<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\PostDeletedNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function posts(User $user)
    {
        return view('user-posts', [
            'posts' => $user->posts,
            'categories' => Category::latest()->filter()->get()
        ]);
    }


    public function authorProfile(User $user)
    {
        $user = $user->posts()->with('category')->get();

        return view('author-profile', [
            'posts' => $user
        ]);
    }


    public function editPostCreate(Post $posts)
    {
        return view('editPost', ['posts' => $posts]);
    }
    public function editPost(Request $request, $id)
    {
        try {
            // Find the post by ID
            $post = Post::findOrFail($id);

            // Validate the input data
            $validatedData = $request->validate([
                'title' => 'required|string',
                'body' => 'required|string',
                'excerpt' => 'required|string',
                'slug' => 'required|string',

                'category' => 'nullable|exists:categories,id',
                'thumbnail' => 'nullable|image',
            ]);

            // Update the post data
            $post->title = $validatedData['title'];
            $post->body = $validatedData['body'];
            $post->excerpt = $validatedData['excerpt'];
            $post->slug = $validatedData['slug'];
            $post->updated_at = \Carbon\Carbon::now();

            // Update the category ID if provided
            $category_id = $validatedData['category'];
            if ($category_id) {
                $post->category_id = $category_id;
            }

            // Check if a new thumbnail file was uploaded
            if ($request->hasFile('thumbnail')) {
                // Delete the previous thumbnail if it exists
                if ($post->thumbnail !== null) {
                    Storage::delete($post->thumbnail);
                }

                // Store the new thumbnail and update the post's thumbnail property
                $post->thumbnail = $request->file('thumbnail')->storePublicly('thumbnails', 'public');
            }

            // Save the updated post
            $post->save();
            $user = auth()->user();
            // Redirect or return a response indicating success
            return redirect()->route('author-profile', ['user' => $user->id])->with('success', 'Post deleted successfully');
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the update process
            return redirect()->back()->with('error', 'Failed to update post. Please try again.');
        }
    }



    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        // Delete the associated files
        if ($post->thumbnail !== null) {
            Storage::delete($post->thumbnail);
        }
        // Delete the post
        $post->delete();

        $user = auth()->user();

        // Notification::send($user, new PostDeletedNotification($post));

        // Assuming the `$user` variable represents the authenticated user, you can retrieve the user ID
        $user = auth()->user();
        // Redirect back to the author profile page or any other desired page
        return redirect()->route('author-profile', ['user' => $user->id])->with('success', 'Post deleted successfully');
    }


    public function Feedback(Request $request)
    {
        $request->validate([
            'feedback' => 'nullable|string|max:255',
        ]);

        if (Auth::check()) {
            $user = Auth::user();
            $user->feedback = $request->input('feedback');
            $user->save();

            return redirect()->back()->with('success', 'Feedback added successfully!');
        }

        return redirect()->back()->with('error', 'User not authenticated.');
    }


}
