<x-layouts.admin title="Settings">

<div class="max-w-7xl mx-auto">

    @session('success')
        <x-alerts.toast :type="'success'" :message="session('success')" />
    @endsession

    @if ($errors->any())
        <x-alerts.toast :type="'error'" :message="$errors->first()" />
    @endif

    <div class="card bg-base-100 shadow-lg">

        <div class="card-body">

            <div class="mb-6">
                <h2 class="text-2xl font-bold">
                    Website Settings
                </h2>

                <p class="text-base-content/70">
                    Configure your application appearance and preferences.
                </p>
            </div>

            <form action="{{ route('settings.update') }}" method="POST">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                    {{-- Theme --}}
                    <div>

                        <label class="label">
                            <span class="label-text font-semibold">
                                DaisyUI Theme
                            </span>
                        </label>

                        <select
                            id="theme"
                            name="theme"
                            class="select select-bordered w-full">

                            @php
                                $themes = [
                                    'light',
                                    'dark',
                                    'cupcake',
                                    'bumblebee',
                                    'emerald',
                                    'corporate',
                                    'synthwave',
                                    'retro',
                                    'cyberpunk',
                                    'valentine',
                                    'halloween',
                                    'garden',
                                    'forest',
                                    'aqua',
                                    'lofi',
                                    'pastel',
                                    'fantasy',
                                    'wireframe',
                                    'black',
                                    'luxury',
                                    'dracula',
                                    'cmyk',
                                    'autumn',
                                    'business',
                                    'acid',
                                    'lemonade',
                                    'night',
                                    'coffee',
                                    'winter',
                                    'dim',
                                    'nord',
                                    'sunset',
                                    'caramellatte',
                                    'abyss',
                                    'silk'
                                ];
                            @endphp

                            @foreach($themes as $theme)
                                <option
                                    value="{{ $theme }}"
                                    @selected(old('theme', $setting?->theme ?? 'light') === $theme)>
                                    {{ ucfirst($theme) }}
                                </option>
                            @endforeach

                        </select>

                        <label class="label">
                            <span class="label-text-alt">
                                Choose the default theme for your application.
                            </span>
                        </label>

                    </div>

                    {{-- Live Preview --}}
                    <div>

                        <label class="label">
                            <span class="label-text font-semibold">
                                Theme Preview
                            </span>
                        </label>

                        <div
                            id="themePreview"
                            data-theme="{{ old('theme', $setting?->theme ?? 'light') }}"
                            class="rounded-xl border border-base-300 p-6 bg-base-100 transition-all">

                            <div class="space-y-4">

                                <button class="btn btn-primary btn-sm">
                                    Primary Button
                                </button>

                                <button class="btn btn-secondary btn-sm">
                                    Secondary
                                </button>

                                <button class="btn btn-accent btn-sm">
                                    Accent
                                </button>

                                <div class="alert alert-info">
                                    Theme Preview
                                </div>

                                <div class="badge badge-primary">
                                    Badge
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="divider"></div>

                <div class="flex justify-end">

                    <button
                        type="submit"
                        class="btn btn-primary">
                        Save Changes
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', () => {

    const select = document.getElementById('theme');
    const preview = document.getElementById('themePreview');

    // Page load par bhi selected theme preview me apply ho
    preview.setAttribute('data-theme', select.value);

    select.addEventListener('change', function () {
        preview.setAttribute('data-theme', this.value);
    });

});
</script>

</x-layouts.admin>