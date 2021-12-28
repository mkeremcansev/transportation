<form action="{{ route('password.email') }}" method="POST">
    @csrf
    <input type="text" name="email">
    <button type="submit">Gönder</button>
</form>