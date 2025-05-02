<x-layouts.app>
        <div class="min-h-[calc(100vh-90px)] flex flex-col">
            <div class="my-6">
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('error', $error) }}
            </div>
            <div class="flex flex-col items-center flex-1 mt-28">
                <span class="text-9xl">{{$message}}</span>
                <span class="mt-10 mb-20">{{$hint}}</span>
                <a href="/" class="text-white bg-red-500 h-14 w-64 flex items-center justify-center rounded">Back to home page</a>
            </div>
        </div>
    </x-layouts.app>
    