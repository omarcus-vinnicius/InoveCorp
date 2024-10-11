<x-guest-layout>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous" />
        <link rel="stylesheet" href="/css/reset.css" />
        <link rel="stylesheet" href="/css/twoFactor/twoFactor.css" />

        <title>Home</title>
    </head>

    <body id="two_factor">
        <form method="POST" action="{{route('two-factor.verify')}}" class="tw-gray-300" class="form_two_factor">
            @csrf
            <div class="container_two_factor">
                <img src="/image/logo_inov.png" class="img_logo" />
                <label>Two Factor Code</label>
                <input type="text" name="code" id="code" />
                <button type="submit" class="btn btn-light">Send</button>

                <a href="/two-factor" class="btn btn-dark"> Resend code</a>
            </div>
        </form>
    </body>
</x-guest-layout>