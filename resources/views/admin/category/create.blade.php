<x-layouts.admin title="Create Category">

<div class="max-w-7xl mx-auto">
    @session('success')
        <x-alerts.toast :type="'success'" :message="session('success')" />
    @endsession
    @if ($errors->any())
        <x-alerts.toast :type="'error'" :message="$errors->first()" />
    @endif
    <a href="{{ route('category.index') }}" class="btn btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Categories
                </a>
    <div class="card bg-base-100 shadow-lg">
        <div class="card-body">

            <div class="mb-6">
                <h2 class="text-2xl font-bold">Create Category</h2>
                <p class="text-base-content/70">
                    Fill in the details below to create a new category.
                </p>
            </div>

            <form enctype="multipart/form-data" action="/category/create" method="POST">
                @csrf
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    <!-- Category Name -->
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Category Name</legend>
                        <input
                            type="text"
                            name="name"
                            class="input input-bordered w-full"
                            placeholder="Technology">
                    </fieldset>

                    <!-- Slug -->
                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">Slug</legend>
                        <input
                            type="text"
                            name="slug"
                            class="input input-bordered w-full"
                            placeholder="technology">

                        <label class="label">
                            <span class="label-text-alt">
                                Leave empty to generate automatically.
                            </span>
                        </label>
                    </fieldset>

                    <!-- Featured Image -->
                    <fieldset class="fieldset lg:col-span-2">
                        <legend class="fieldset-legend">Featured Image</legend>

                        <input
                            type="file"
                            name="featured_image"
                            class="file-input file-input-bordered w-full">
                    </fieldset>

                    <!-- Description -->
                    <fieldset class="fieldset lg:col-span-2">
                        <legend class="fieldset-legend">Description</legend>

                        <textarea
                            rows="6"
                            name="description"
                            class="textarea textarea-bordered w-full"
                            placeholder="Write a short description about this category..."></textarea>
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

                        Create Category
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

</x-layouts.admin>