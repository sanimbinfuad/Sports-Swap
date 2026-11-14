<x-public-layout title="Sports Swap">
    <section class="bg-indigo-50">
        <div class="max-w-6xl mx-auto px-6 py-20 text-center">
            <h1 class="text-4xl font-bold text-gray-900">Teach what you know. Learn what you love.</h1>
            <p class="mt-4 text-lg text-gray-600">
                Sports Swap connects people who want to learn a sport with people who play it well.
                No payments, just an even exchange of skills.
            </p>
            <div class="mt-8 flex justify-center gap-4">
                <a href="{{ route('register') }}" class="rounded bg-indigo-600 px-6 py-3 text-white hover:bg-indigo-700">Get started</a>
                <a href="{{ route('login') }}" class="rounded border border-indigo-600 px-6 py-3 text-indigo-600 hover:bg-indigo-100">Log in</a>
            </div>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-6 py-16">
        <h2 class="text-2xl font-semibold text-center">How it works</h2>
        <div class="mt-10 grid gap-8 sm:grid-cols-3">
            <div class="text-center">
                <p class="text-3xl font-bold text-indigo-600">1</p>
                <h3 class="mt-2 font-semibold">List your skills</h3>
                <p class="mt-1 text-gray-600">Add the sports you can teach and the ones you want to learn.</p>
            </div>
            <div class="text-center">
                <p class="text-3xl font-bold text-indigo-600">2</p>
                <h3 class="mt-2 font-semibold">Find a partner</h3>
                <p class="mt-1 text-gray-600">We match you with someone whose skills complement yours.</p>
            </div>
            <div class="text-center">
                <p class="text-3xl font-bold text-indigo-600">3</p>
                <h3 class="mt-2 font-semibold">Swap sessions</h3>
                <p class="mt-1 text-gray-600">Agree a time and place, then teach and learn in person.</p>
            </div>
        </div>
    </section>
</x-public-layout>