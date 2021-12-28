<form action="{{ route('password.update') }}" method="POST">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email">
    <input type="password" name="password_confirmation">
    <input type="password" name="password">
    <button type="submit">Gönder</button>
</form>
@if ($message = Session::get('email'))
    {{ $message }}
@endif
 @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif