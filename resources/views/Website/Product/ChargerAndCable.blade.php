@extends("Website.app")
@section("title" , "Charger And Cable")
@section("main")
<body onload="myFunction()">
    <div class="container mt-5 mb-5">
        <div class="row">


        
        
            @foreach($products as $product)
            @if(($product->id)>26 and ($product->id)<36)
                <div class="col-lg-4 mb-3">
                    <article class="card-custom-1">
                        <a href="{{ $product->hrefUrl }}" class="img-container">
                            <img src="{{ $product->imageShow }}" class="item-icon">
                        </a>
                        <div class="content">
                            <a href="{{ $product->hrefUrl }}" class="title">
                                {{ $product->title }}
                            </a>
                            <p class="lead">
                                {{ $product->lead }}
                            </p>
                            <footer class="footer">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto">
                                        <a href="{{ $product->hrefUrl }}" class="price">{{ $product->priceShow }} تومان</a>
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
                                <div class="row justify-content-center mt-3 pt-3 border-top">
                                    <div class="col-atuo">
                                        <form action="{{ route("addToCart" , ['product' => $product->id]) }}" method="post" class="ajax-form">
                                            @csrf
                                            <button type="submit" class="btn btn-warning">
                         
                                                پیشنهاد ویژه
                                 
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </article>
                </div>
                @endif
            @endforeach



            <div class="row justify-content-center">
                <div class="col-auto">
                    {{ $products->links() }}
                </div>
            </div>


        </div>
    </div>
</body>
@endsection
@section("js")
    <script>
        $(document).ready(function (){
            $(".ajax-form").submit(function (e){
                e.preventDefault()
                $.ajax({
                    url : $(this).attr("action"),
                    type : "POST" ,
                    dataType : "JSON" ,
                    data : {ajax : true} ,
                    success:function (res)
                    {
                        $("#cart-qty").removeClass("d-none").html(res.count)
                    },
                    error:function (res){
                        console.log(2)
                    }
                })
            })
        })
        function myFunction() {
  var element = document.getElementById("chargercable");
  element.classList.add("active");
}

    </script>
@endsection
