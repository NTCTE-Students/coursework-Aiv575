@include('includes.header')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">{{ $product->name }}</h1>
            <div class="card h-100">
                <div class="card-body">
                    <img class="card-img-top" src="{{ $product->image }}" alt="{{ $product->name }}" style=" object-fit: cover;">
                    <p class="card-text">Категория: {{ $product->category->name }}</p>
                    <p class="card-text">Описание: {{ $product->description }}</p>
                    <p class="card-text">Цена: {{ $product->price }}</p>
                    @auth
                        @php
                            $inBasket = \App\Models\Basket::where('user_id', auth()->id())
                                ->where('product_id', $product->id)
                                ->first();
                        @endphp
                        @if ($inBasket)
                            <div style="display: flex; align-items: center;">
                                <form action="{{ route('cart.decrease', $product) }}" method="POST" style="margin-right: 10px;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">-</button>
                                </form>
                                {{ $inBasket->amount }}
                                <form action="{{ route('cart.increase', $product) }}" method="POST" style="margin-left: 10px;">
                                    @csrf
                                    <button type="submit" class="btn btn-success">+</button>
                                </form>
                                <a href="{{ route('basket') }}" class="btn btn-primary" style="margin-left: 10px;">Купить</a>
                            </div>
                        @else
                        <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                <button type="submit" class="btn btn-primary">Добавить в корзину</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.footer')
