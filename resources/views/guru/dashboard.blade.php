<h1>Selamat datang {{ auth()->user()->role }}</h1>
<form method="POST" action="{{ route('logout') }}">
  @csrf
  <button type="submit">Logout</button>
</form>
