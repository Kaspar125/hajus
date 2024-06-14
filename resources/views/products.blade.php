<x-guest-layout>
    @include('dropdowncart')

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-xs-18 col-sm-6 col-md-4" style="margin-top:10px;">
                        <div class="img_thumbnail productlist">
                            <img src="{{ asset('img') }}/{{ $product->photo }}" class="img-fluid">
                            <div class="caption">
                                <h4>{{ $product->product_name }}</h4>
                                <p>{{ $product->product_description }}</p>
                                <p><strong>Price: </strong> ${{ $product->price }}</p>
                                <p class="btn-holder"><a href="{{ route('add_to_cart', $product->id) }}"
                                                         class="btn btn-primary btn-block text-center" role="button">Add
                                        to cart</a></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</x-guest-layout>