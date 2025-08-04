<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    @vite('resources/css/app.css')
    <title>Chamados</title>
</head>

<body class="font-roboto bg-gray-100">
    <div class="w-5xl px-10 mx-auto">
        <div class="border-b-1 border-gray-400">
            <h1 class="flex items-center gap-2 py-12 text-xl font-bold">
                <i class='bx bx-people-diversity text-[22px]'></i>
                Sistema de gerenciamento de chamados
            </h1>
        </div>
        {{ $slot }}
    </div>
</body>

</html>
