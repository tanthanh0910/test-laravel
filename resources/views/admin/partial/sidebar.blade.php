<ul class="sidebar-menu" data-widget="tree">
    @hasPermission('admin.users.index')
    <li class="{{(Request::is('admin/users')) || (Request::is('admin/users/*')) ? 'active' : ''}}">
        <a style="padding-left: 18px;" class="{{(Request::is('admin/users')) || (Request::is('admin/users/*')) ? 'menu-active-color' : ''}}"
           href="{{route('admin.users.index')}}">
            <i class="fa fa-user"></i> <span>User</span>
            <span class="pull-right-container"></span>
        </a>
    </li>
    @endhasPermission

</ul>
