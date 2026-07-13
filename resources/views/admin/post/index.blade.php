<x-layouts.admin title="Posts">

<div class="max-w-7xl mx-auto">

    @session('success')
        <x-alerts.toast :type="'success'" :message="session('success')" />
    @endsession

    @if ($errors->any())
        <x-alerts.toast :type="'error'" :message="$errors->first()" />
    @endif

    <div class="card bg-base-100 shadow-lg">
        <div class="card-body">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold">Posts</h2>
                    <p class="text-base-content/70">
                        Manage all your blog posts.
                    </p>
                </div>

                <a href="{{ route('post.create') }}" class="btn btn-primary">
                    Add Post
                </a>
            </div>

            <div class="overflow-x-auto rounded-lg">

                <table class="table table-zebra">

                    <thead>
                        <tr>
                            <th class="w-12">
                                <input
                                    type="checkbox"
                                    class="checkbox checkbox-sm"
                                    id="selectAll">
                            </th>

                            <th>Image</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($posts as $post)

                        <tr>

                            <td>
                                <input
                                    type="checkbox"
                                    class="checkbox checkbox-sm row-checkbox">
                            </td>

                            <td>
                                <div class="avatar">
                                    <div class="mask mask-squircle w-14 h-14">
                                        <img
                                            src="{{ asset('post_images/' . $post->featured_image) }}"
                                            alt="{{ $post->title }}">
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div class="font-semibold">
                                    {{ $post->title }}
                                </div>

                                <div class="text-sm opacity-60">
                                    {{ $post->slug }}
                                </div>
                            </td>

                            <td>
                                <span class="badge badge-primary badge-outline">
                                    {{ $post->category->name ?? 'No Category' }}
                                </span>
                            </td>

                            <td class="max-w-sm truncate">
                                {{ $post->description }}
                            </td>

                            <td>
                                {{ $post->created_at->format('d M Y') }}
                            </td>

                            <td>
                                <div class="flex gap-2">

                                    <a href="{{ route('post.edit',$post->id) }}"
                                       class="btn btn-sm btn-info">
                                        Edit
                                    </a>

                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-error"
                                            onclick="return confirm('Delete this post?')">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const selectAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.row-checkbox');

    selectAll.addEventListener('change', function () {
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            selectAll.checked = [...checkboxes].every(cb => cb.checked);
        });
    });

});
</script>

</x-layouts.admin>