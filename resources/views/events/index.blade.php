<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>events</title>
</head>
<body>
    <h1>Događaji</h1>
    <ul>
        @foreach($events as $event)
            <li>{{$event->event_name}}</li>
        @endforeach
    </ul>

</body>
</html>
