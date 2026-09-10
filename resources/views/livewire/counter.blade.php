<div class="flex flex-col items-center justify-center py-6">
    <div class="text-2xl font-bold p-6">
        Counter: {{ $counter }}
    </div>
    <div class="flex items-center justify-center space-x-2 p-6">
        <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" wire:click="increment">+</button>
        <button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600" wire:click="decrement">-</button>
    </div>

</div>
