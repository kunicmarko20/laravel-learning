Hello {{$user->name}}

{{route('verify', $user->verification_token)}}
