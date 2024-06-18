@include('includes.header')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Продукты категории: {{ $category->name }}</h1>
        </div>
        @foreach ($category->products as $product)
            <div class="col-md-4 mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $product->name }}</h2>
                    <p class="card-text">Цена: {{ $product->price }}</p>
                    <a href="{{ route('product.show', $product) }}" class="btn btn-primary">Купить</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('includes.footer')
