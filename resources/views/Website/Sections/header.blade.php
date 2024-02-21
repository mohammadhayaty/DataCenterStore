<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light" dir="rtl" >
    <div class="container" dir="rtl">
        
       
                            <a class="navbar-brand i"  href="{{ route("home") }}">
                                <i class="fas fa-store"></i>
                            </a>
                        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div  class="collapse navbar-collapse "  id="navbarSupportedContent">
        
        <div class="" >
            <ul class="d-flex navbar-nav me-auto mb-2 mb-lg-0"  dir="rtl">
                
                <li class="nav-item " >
                    <a class="nav-link" id="home" href="{{ route("home") }}">صفحه اصلی</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link"  id="mobile"  href="{{ route("mobile") }}">موبایل</a>
                </li>
                <li class="nav-item ml-auto ">
                    <a class="nav-link"  id="toys"  href="{{ route("toys") }}">اسباب بازی</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  id="coverglass"  href="{{ route("coverglass") }}">کاور و گلس</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  id="chargercable"  href="{{ route("chargercable") }}">شارژر و کابل</a>
                </li>
                
            </ul>
            </div>
            <div class="nav" >
                <div dir="rtl">
                <ul class="navbar-nav" >
                @if(auth()->check())
                <li class="nav-item">
                                
                <a class="nav-link"> {{$user->name}}</a>
                                
                            </li>
                    <li class="nav-item">
                       
                        
                            <a class="nav-link active" href="{{ route("logout") }}">
                           
                                خروج
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                            </li>
                            
                        @else
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route("login") }}">
                                <i class="far fa-user"></i>
                            </a>
                        </li>
                        @endif
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("cartShow") }}" id="basket">
                            <i class="fas fa-shopping-basket item-icon"></i>
                            <span id="cart-qty" class="qty {{ $cart->count == 0 ? "d-none" : "" }}">{{ $cart->count }}</span>
                        </a>
                    </li>
                </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
    function myFunction() {
  var element = document.getElementById("myDIV");
  element.classList.add("active");
}
</script>