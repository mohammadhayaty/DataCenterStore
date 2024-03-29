@extends("Website.app")
@section("title" , "Product Show")
@section("main")
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">

            <div class="col-lg-8">

                <article class="card-custom-2">
                    <div class="img-container">
                        <img src="{{ $product->imageShow }}" class="item-icon">
                    </div>

                    <div class="content">
                        <h1 class="title">
                            {{ $product->title }}
                        </h1>
                        <div class="footer">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-auto">
                                    <div class="price">{{ $product->priceShow }} تومان</div>
                                </div>
                                <div class="col-auto">
                                    <form action="{{ route("addToCart" , ['product' => $product->id]) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                        افزودن به سبد
                                                
                                 
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            {{ $product->body }}
                        </div>
                    </div>



                </article>


            </div>

        </div>
    </div>
@endsection
