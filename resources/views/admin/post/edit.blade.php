<x-layouts.admin title="Create Post">

<div class="max-w-7xl mx-auto">

    @session('success')
        <x-alerts.toast :type="'success'" :message="session('success')" />
    @endsession

    @if ($errors->any())
        <x-alerts.toast :type="'error'" :message="$errors->first()" />
    @endif

    <a href="{{ route('post.index') }}" class="btn btn-ghost mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        Back to Posts
    </a>

    <div class="card bg-base-100 shadow-lg">
        <div class="card-body">

            <div class="mb-6">
                <h2 class="text-2xl font-bold">Edit Post</h2>
                <p class="text-base-content/70">
                    Fill in the details below to create a new post.
                </p>
            </div>

            <form method="POST" action="{{ route('post.update',$post->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    <!-- Title -->
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Post Title</legend>

                        <input
                            type="text"
                            name="title"
                            class="input input-bordered w-full"
                            placeholder="Enter post title"
                            value="{{ $post->title }}">
                    </fieldset>

                    <!-- Slug -->
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Slug</legend>

                        <input
                            type="text"
                            name="slug"
                            class="input input-bordered w-full"
                            placeholder="post-slug"
                            value="{{ $post->slug }}">

                        <label class="label">
                            <span class="label-text-alt">
                                Leave empty to generate automatically.
                            </span>
                        </label>
                    </fieldset>

                    <!-- Category -->
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Category</legend>

                        <select name="category_id" class="select select-bordered w-full">
                            <option selected disabled>Select Category</option>

                            @foreach ($categories as $category)
                                <option value="{{ $post->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                 
                                {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </fieldset>

                    <!-- Featured Image -->
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Featured Image</legend>

                        <input
                            type="file"
                            name="featured_image"
                            class="file-input file-input-bordered w-full"
                            >
                            <img class="w-20 h-20 mt-4 border-2" src="{{ asset('post_images/' . $post->featured_image) }}" alt="{{  $post->featured_image }}">
                    </fieldset>


                    <!-- Description -->
                    <fieldset class="fieldset lg:col-span-2">
                        <legend class="fieldset-legend">Description</legend>

                        <textarea
                            rows="10"
                            name="description"
                            class="textarea textarea-bordered w-full"
                            placeholder="Write your post here..." >{{ $post->description }}</textarea>
                    </fieldset>

                </div>

                <div class="divider"></div>

                <div class="flex justify-end gap-3">

                    <button type="reset" class="btn btn-ghost">
                        Reset
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14"/>
                        </svg>

                        Edit Post
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

</x-layouts.admin>