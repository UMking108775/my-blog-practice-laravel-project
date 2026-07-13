<x-layouts.admin title="Dashboard">

<div class="max-w-7xl mx-auto space-y-6">

    <!-- Header -->
    <div>
        <h1 class="text-3xl font-bold">Dashboard</h1>
        <p class="text-base-content/70">
            Welcome back, <span class="font-semibold">{{ auth()->user()->name }}</span>.
        </p>
    </div>

    <!-- Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="stat bg-base-100 rounded-xl shadow">
            <div class="stat-figure text-primary">
                <i class="fa-solid fa-layer-group text-3xl"></i>
            </div>
            <div class="stat-title">Categories</div>
            <div class="stat-value text-primary">12</div>
            <div class="stat-desc">Total Categories</div>
        </div>

        <div class="stat bg-base-100 rounded-xl shadow">
            <div class="stat-figure text-secondary">
                <i class="fa-solid fa-newspaper text-3xl"></i>
            </div>
            <div class="stat-title">Posts</div>
            <div class="stat-value text-secondary">84</div>
            <div class="stat-desc">Published Posts</div>
        </div>

        <div class="stat bg-base-100 rounded-xl shadow">
            <div class="stat-figure text-accent">
                <i class="fa-solid fa-users text-3xl"></i>
            </div>
            <div class="stat-title">Users</div>
            <div class="stat-value text-accent">15</div>
            <div class="stat-desc">Registered Users</div>
        </div>

        <div class="stat bg-base-100 rounded-xl shadow">
            <div class="stat-figure text-success">
                <i class="fa-solid fa-eye text-3xl"></i>
            </div>
            <div class="stat-title">Views</div>
            <div class="stat-value text-success">2.4K</div>
            <div class="stat-desc">Today's Views</div>
        </div>

    </div>

    <!-- Quick Actions -->
    <div class="card bg-base-100 shadow-lg">
        <div class="card-body">

            <h2 class="card-title mb-4">Quick Actions</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                <a href="#" class="btn btn-primary btn-outline justify-start">
                    <i class="fa-solid fa-folder-plus"></i>
                    Add Category
                </a>

                <a href="#" class="btn btn-secondary btn-outline justify-start">
                    <i class="fa-solid fa-file-circle-plus"></i>
                    Add Post
                </a>

                <a href="#" class="btn btn-accent btn-outline justify-start">
                    <i class="fa-solid fa-users"></i>
                    Manage Users
                </a>

            </div>

        </div>
    </div>

    <!-- Recent Activity -->
    <div class="card bg-base-100 shadow-lg">

        <div class="card-body">

            <h2 class="card-title mb-4">Recent Activity</h2>

            <div class="overflow-x-auto">

                <table class="table table-zebra">

                    <thead>
                        <tr>
                            <th><i class="fa-solid fa-clock me-2"></i>Activity</th>
                            <th>User</th>
                            <th>Date</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td>
                                <i class="fa-solid fa-folder-plus text-primary me-2"></i>
                                Created a new category
                            </td>
                            <td>Admin</td>
                            <td>2 min ago</td>
                        </tr>

                        <tr>
                            <td>
                                <i class="fa-solid fa-file-circle-plus text-secondary me-2"></i>
                                Published a new post
                            </td>
                            <td>Admin</td>
                            <td>15 min ago</td>
                        </tr>

                        <tr>
                            <td>
                                <i class="fa-solid fa-user-plus text-accent me-2"></i>
                                New user registered
                            </td>
                            <td>John Doe</td>
                            <td>1 hour ago</td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

</x-layouts.admin>