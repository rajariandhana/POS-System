<x-layout title="Home">
    hello world
    <div x-data="{ count: 0 }">
        <button x-on:click="count++">Increment</button>
     
        <span x-text="count"></span>
    </div>
</x-layout>