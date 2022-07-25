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
    </ul>
    
                  <!-- 'description' => $request->description,
                  'client_id'   => implode(" ",$request->input('clients')),
                  'user_id'     => Auth::User()->id,
                  'category_id' => implode(" ",$request->input('categories')) -->
</body>