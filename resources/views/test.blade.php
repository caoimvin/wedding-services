<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <div>
            Guests for Invitation with ID 1
            <br>
            @foreach($guests as $guest)
                <p>{{ $guest->firstname.' '.$guest->lastname }}</p>
            @endforeach

            <hr>
            Invitation of Guest with ID 1
            <br>
            {{ dump($invitation) }}
        </div>
    </body>
</html>
