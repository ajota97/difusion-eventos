<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Nuevo Evento</title>
</head>
<body>
    <p>Hola! este evento te puede interesar</p>
    <p>Son eventos relacionados con tus intereses.</p>
    <ul>
        <li>Nombre del evento: {{ $event->name }}</li>
        <li>Fecha: {{$event->date}}</li>
        <li>Hora de inicio: {{ $event->start_time }}</li>
        <li>Hora de fin: {{ $event->finish_time }}</li>
        <li>Direccion: {{ $event->address}}</li>
        <li>Decripcion: {{ $event->description}}</li>
        <li>Categoria: {{ $event->categories->name}}</li>
        <li>Ofrecido por: {{ $event->client->name}}</li>
    </ul>

</body>
