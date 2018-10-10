<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>


<li class="{{ Request::is('statusOrders*') ? 'active' : '' }}">
    <a href="{!! route('statusOrders.index') !!}"><i class="fa fa-edit"></i><span>Status Orders</span></a>
</li>

<li class="{{ Request::is('buyers*') ? 'active' : '' }}">
    <a href="{!! route('buyers.index') !!}"><i class="fa fa-edit"></i><span>Buyers</span></a>
</li>

<li class="{{ Request::is('sellers*') ? 'active' : '' }}">
    <a href="{!! route('sellers.index') !!}"><i class="fa fa-edit"></i><span>Sellers</span></a>
</li>

<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>

<li class="{{ Request::is('stories*') ? 'active' : '' }}">
    <a href="{!! route('stories.index') !!}"><i class="fa fa-edit"></i><span>Stories</span></a>
</li>

