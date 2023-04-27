<p>Hello {{ $user->name }},</p>

<p>Please click the following link to verify your email address:</p>

<p><a href="{{ route('verification.verify', $user->id) }}">Verify Email</a></p>

<p>If you did not create an account, no further action is required.</p>

<p>Thank you for using our application!</p>
