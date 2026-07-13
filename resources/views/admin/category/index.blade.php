<x-layouts.admin title="Categories">

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
                    <h2 class="text-2xl font-bold">Categories</h2>
                    <p class="text-base-content/70">
                        Manage all your blog categories.
                    </p>
                </div>

                <a href="{{ route('category.create') }}" class="btn btn-primary">
                    Add Category
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
                            <th>Name</th>
                            <th>Description</th>
                            <th>Posts</th>
                            <th>No of Posts</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                         @foreach ($categories as $category)
                    <tr>
                            <td>
                                <input
                                    type="checkbox"
                                    class="checkbox checkbox-sm row-checkbox">
                            </td>

                            <td>
                                <div class="avatar">
                                    <div class="mask mask-squircle w-14 h-14">
                                        <img src="{{ asset('images/' . $category->featured_image) }}" alt="Category Image">
                                    </div>
                                </div>
                            </td>
                           
                            <td>
                                <div class="font-semibold">
                                    {{ $category->name }}
                                </div>
                            </td>
                            
                            
                            <td class="max-w-sm truncate">
                                {{ $category->description }}
                            </td>
                                </div>

                                <div class="text-sm opacity-60">
                                    {{ $category->slug }}
                                </div>
                            </td>
                            
                            <td class="max-w-sm truncate">
                                {{ $category->description }}
                            </td>

                            <td>
                                <span class="badge badge-primary badge-outline">
                                    {{ $category->posts->count() }}
                                </span>
                            </td>

                            <td>
                                <div class="flex justify-start gap-2">

                                    <a class="btn btn-sm btn-info" href="{{ route('category.edit', $category->id) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-error" type="submit">
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

            selectAll.checked =
                [...checkboxes].every(cb => cb.checked);

        });

    });

});
</script>

</x-layouts.admin> 