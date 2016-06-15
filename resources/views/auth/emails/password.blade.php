Click <a href="{{ $link2 = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> here </a> to reset your password:<br/>
<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
