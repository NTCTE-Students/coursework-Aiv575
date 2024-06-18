@include('includes.header')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Категории</h1>
            <p class="lead">Выберите категорию</p>
        </div>
        @foreach ($categories as $category)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">{{ $category->name }}</h2>
                        <a href="{{ route('category.show', $category) }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@include('includes.footer')
