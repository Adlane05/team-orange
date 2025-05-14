<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="height:100%">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('Document') }}</title>
</head>

<body style="margin:0px; height:100%; background-color:#d9d9d9; font-family: Helvetica, Sans-Serif;">

    <div style="background-color:black; padding:10px;">
        <header style="color:white;  display:flex; justify-content:space-between; align-items:center">
            <img src="/images/logo.png" style="height:50px; padding:15px">
            <!-- Language switch button -->
            <a href="{{ route('locale.switch', app()->getLocale() === 'en' ? 'fr' : 'en') }}"
               style="padding-right:30px; font-size:40px; font-weight:bold; color:white; background-color:black; border:none; text-decoration:none;">
                {{ __('FR') }}
            </a>
        </header>
    </div>

    <div style="height:25%"></div>

    <div style="text-align:center;">
        <form action="" method="POST" id="login">
            @csrf
            <label for="username" style="font-size:40px">{{ __('Employee ID') }}</label><br><br>
            <input type="text" id="username" name="username" maxlength="10"
                   oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                   style="border-radius:15px; border:3px solid black; height:3vh; width:12vw; padding:10px; font-size:50px;">
        </form>
    </div>

    <div style="height:10%; text-align:center; color:red; font-size: 20px; font-weight:bold">
        @if (session('failed')) 
            <p>{{ session('failed') }}</p>
        @endif
        @error('username')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div style="text-align:center;">
        <button type="submit" form="login"
                style="border-radius:25px; font-size:40px; height:6vh; width:12vw; background-color:red; color:white; font-weight:bold">
            {{ __('Log In') }}
        </button>
    </div>

    <div style="height:20%"></div>

    <div style="text-align:center;">
        <a href="/managers/login" style="text-decoration:none; color:red; font-size:30px; font-weight:bold;">
            {{ __('Supervisor Login') }}
        </a>
    </div>

</body>
</html>
