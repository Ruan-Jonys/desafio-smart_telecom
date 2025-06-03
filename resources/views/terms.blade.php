<x-guest-layout>
    <div class="bg-gray-100 min-h-screen d-flex flex-column justify-content-center align-items-center pt-4">
        <div class="container sm:pt-0">
            <div class="text-center mb-4">
                <x-authentication-card-logo />
            </div>

            <div class="bg-white shadow rounded-lg p-6 prose max-w-4xl mx-auto">
                {!! $terms !!}
            </div>
        </div>
    </div>
</x-guest-layout>
