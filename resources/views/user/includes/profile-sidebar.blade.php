<div class="card" style="width: 18rem;">
    <img class="card-img-top"  style="border-radius: 50%;" src="{{ asset(Auth::user()->image) }}" height="100%;" width="100%;" alt="Card image cap">
    <ul class="list-group list-group-flush">
      <a style="background-color: #d7537b;color:#ffffff" href="{{ route('user.dashboard') }}" class="btn btn-sm btn-block " >Home</a>
      <a style="background-color: #d7537b;color:#ffffff" href="{{ route('cart') }}" class="btn btn-sm btn-block">My Cart</a>
      <a style="background-color: #d7537b;color:#ffffff" href="{{ route('checkout') }}" class="btn btn-sm btn-block">My Checkout</a>
      <a style="background-color: #d7537b;color:#ffffff" href="{{ route('wishlist') }}" class="btn btn-sm btn-block">My Wishlist</a>
      <a style="background-color: #d7537b;color:#ffffff" href="{{ route('my-orders') }}" class="btn btn-sm btn-block">My Orders</a>
      <a style="background-color: #d7537b;color:#ffffff" href="{{ route('return-orders') }}" class="btn btn-sm btn-block">Return Orders</a>
      <a style="background-color: #d7537b;color:#ffffff" href="{{ route('cancel-orders') }}" class="btn btn-sm btn-block">Cancel Orders</a>
      <a style="background-color: #d7537b;color:#ffffff" href="{{ route('user.image') }}" class="btn btn-sm btn-block">Update Image</a>
      <a style="background-color: #d7537b;color:#ffffff" href="{{ route('update-password') }}" class="btn btn-sm btn-block">Update Password</a>
      {{-- <a style="background-color: #d7537b;color:#ffffff" href="{{ route('chat.page') }}" class="btn btn-sm btn-block">Chats</a> --}}
      <a href="{{ route('logout') }}" class="btn btn-danger btn-sm btn-block" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Log Out</a>
    </ul>
</div>
