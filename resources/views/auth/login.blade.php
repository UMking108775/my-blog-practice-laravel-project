<x-layouts.auth title="Login">
    <form action="/login" method="POST">
        @csrf
    <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
  <legend class="fieldset-legend">Login</legend>

  <label class="label">Email</label>
  <input type="email" name="email" class="input" placeholder="Email" />

  <label class="label">Password</label>
  <input type="password" name="password" class="input" placeholder="Password" />

  <button class="btn btn-neutral mt-4">Login</button>

    <p class="text-sm text-base-content/70 mt-4">
        Don't have an account? <a href="/register" class="link link-primary">Signup here</a>
    </p>
    @session('success')
        <x-alerts.toast :type="'success'" :message="session('success')" />
    @endsession
    @if ($errors->any())
        <x-alerts.toast :type="'error'" :message="$errors->first()" />
    @endif
</fieldset>

    </form>
</x-layouts.auth>