<x-guest-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Records') }}
        </h2>
    </x-slot>

    <div class="flex mx-2">
        @foreach ($products as $product)
            <div class="mx-2" >
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-image" width="300" height="300">
                <div class="product-details">
                    <h2 class="product-name">{{ $product['name'] }}</h2>
                    <p class="product-author">Artist: {{ $product['author'] }}</p>
                    <p class="product-tracks">Tracks: {{ $product['tracks'] }}</p>
                    <p class="product-price">Price: ${{ $product['price'] }}</p>
                    
                </div>
            </div>
        @endforeach
    </div>

</x-guest-layout>

<style>

</style>