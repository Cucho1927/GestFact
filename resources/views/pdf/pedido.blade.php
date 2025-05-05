<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedido PDF</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        h1 { text-align: center; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Detalle del Pedido</h1>

    <p><strong>Dirección de Envío:</strong> {{ $pedido->dir_envio }}</p>
    <p><strong>Estado:</strong> {{ $pedido->estado_ped }}</p>
    <p><strong>Fecha:</strong> {{ $pedido->date_ped }}</p>

    {{-- Aquí puedes incluir más información si lo deseas --}}
</body>
</html>
