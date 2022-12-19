<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Placeholder</title>
</head>
<body class=" bg-neutral-100">
    <div class="flex flex-col justify-center items-center min-h-screen">
        <section class="container max-w-2xl p-12 flex flex-col gap-12 bg-white">
            <h2 class="font-bold text-2xl text-center">Create new Chord</h2>
            <form class="flex flex-col justify-between gap-8" action="create" method="post">
                @csrf

                <div>
                    <label class="block font-semibold text-lg" for="chord-name">Chord name</label>
                    <input class="border-2 p-2 text-lg w-2/3"
                        id="chord-name" name="name" type="text" placeholder="Write the name of the chord here">
                </div>

                <div>
                    <label class="block font-semibold text-lg" for="chord-name">Chord description</label>
                    <input class="border-2 p-2 text-lg w-2/3"
                        id="chord-description" name="description" type="text" placeholder="Write a short description here">
                </div>

                <div class="flex justify-end">
                    <button class="py-2 px-4 font-bold text-white bg-blue-500 hover:bg-blue-600 focus:bg-blue-600 transition">Create Chord</button>
                </div>
            </form>
        </section>
    </div>
</body>
</html>