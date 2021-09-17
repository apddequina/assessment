<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hello, <b>{{ Auth::user()->name }}</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <code>Simple Inventory System <br>
                <h4>by: Angelo Paolo Dequina</h4>
                </code>
            </div>
        </div>
    </div>
</x-app-layout>
