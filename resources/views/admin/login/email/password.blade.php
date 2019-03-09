Clique aqui para resetar sua senha: <br>

<a href="{{ $link = url('password/reset', $token). '?email='.urlencode($user->getEmailForPasswordRest()) }}">{{ $link }}</a>