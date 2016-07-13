Click here to reset your password: <a href="{{ $link = Helper::env_url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}"> {{ $link }} </a>
