<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>


<li class="{{ Request::is('statusOrders*') ? 'active' : '' }}">
    <a href="{!! route('statusOrders.index') !!}"><i class="fa fa-edit"></i><span>Status Orders</span></a>
</li>

