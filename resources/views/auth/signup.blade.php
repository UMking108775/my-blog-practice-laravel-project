<x-layouts.auth title="Signup">
<div>
<form action="/register" method="POST">
        @csrf
<fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">
  <legend class="fieldset-legend">Signup</legend>
<label class="label">Name</label>
  <input type="text" name="name" class="input" placeholder="Name" />

  <label class="label">Email</label>
  <input type="email" name="email" class="input" placeholder="Email" />

  <label class="label">Password</label>
  <input type="password" name="password" class="input" placeholder="Password" />

  <button type="submit" class="btn btn-neutral mt-4">Signup</button>

    @session('success')
        <x-alerts.toast :type="'success'" :message="session('success')" />
    @endsession
    @if ($errors->any())
        <x-alerts.toast :type="'error'" :message="$errors->first()" />
    @endif

  <p class="text-sm text-base-content/70 mt-4">
    Already have an account? <a href="{{ route('login') }}" class="link link-primary">Login here</a>
  </p>
</fieldset>
</form>
</div>
</x-layouts.auth>
