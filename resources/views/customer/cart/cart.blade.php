@php
$items = Cart::content();
@endphp
<ul class="header-cart-wrapitem">
    @foreach($items as $item)
    <li class="header-cart-item">
        <div class="header-cart-item-img ">
            <img src="upload/image/product/{{$item->options['image']}}" alt="IMG" class="destroy-product">
        </div>

        <div class="header-cart-item-txt">
            <a href="#" class="header-cart-item-name">
                {{ $item->name }}
            </a>

            <span class="header-cart-item-info">
                {{ $item->qty }} x {{ $item->name }}
                <div>
                    <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="cart-options" ><i class="fa fa-trash-o"></i></button>
                </form>
                </div>
            </span>
        </div>
    </li>
    @endforeach

    
</ul>

<div class="header-cart-total">
    Total: {{ Cart::subtotal() }}
</div>

<div class="header-cart-buttons">
    <div class="header-cart-wrapbtn">
        <!-- Button -->
        <a href="{{ route('showcart') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
            View Cart
        </a>
    </div>

    <div class="header-cart-wrapbtn">
        <!-- Button -->
        <a href="{{ route('bills') }}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
            Check Out
        </a>
    </div>
</div>