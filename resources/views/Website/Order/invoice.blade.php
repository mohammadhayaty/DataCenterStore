@extends("Website.cartinvoice")
@section("main")

    <div class="container  mt-5 mb-5">
        <div class="row justify-content-center">
            @if($cart->count > 0)
                <div class="col-lg-9">
                    <div class="card-custom-3">
                        <div class="table-responsive">
                            <table class="table align-middle cart-table">
                                <thead>
                                <th scope="col">کد</th>
                                <th scope="col">محصول</th>
                                <th scope="col">تعداد</th>
                                <th scope="col">قیمت واحد</th>
                                <th scope="col">قیمت کل</th>
                                <th scope="col">#</th>
                                </thead>
                                <tbody>
                                @foreach($cart->products as $key => $item)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            <a href="{{ $item['product']->hrefUrl }}">
                                                <img src="{{ $item['product']->imageShow }}" class="item-icon">
                                                <span class="title">{{ $item['product']->title }}</span>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route("updateCart" , ['product' => $item['product']->id]) }}" method="post">
                                                @csrf
                                                @method("PATCH")
                                                <div class="d-inline-block me-1">
                                                    <input type="number" name="count" id="count" class="form-control" value="{{ $item['count'] }}">
                                                </div>
                                                <div class="d-inline-block">
                                                    <button class="btn btn-warning">تغییر</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            {{ $item['product']->priceShow }} تومان
                                        </td>
                                        <td>
                                            {{ number_format($item['product']->price * $item['count']) }} تومان
                                        </td>
                                        <td>
                                            <form action="{{ route("removeFromCart" , ['product' => $item['product']->id]) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="border p-3">
                            @if(!is_null($cart->address))
                                {{ $cart->address }}
                            @else
                                هیچ آدرسی ثبت نکردی!
                            @endif
                        </div>


                        <div class="row justify-content-end mt-3">
                            <div class="col-auto">
                                {{ number_format($cart->price) }} تومان
                            </div>
                        </div>


                        @if(!is_null($cart->address))
                        
                            <form action="{{ route("orderStore") }}" method="post">
                                @csrf
                                <button class="btn btn-success">پرداخت ({{ number_format($cart->price) }} تومان)</button>
                            </form>
                     
                        @endif


                    </div>
                </div>
            @else
                <div class="col-auto">
                    <a class="btn btn-warning" href="{{ route("home") }}">سبد خرید شما خالیست!</a>
                </div>
            @endif
        </div>
    </div>
@endsection
