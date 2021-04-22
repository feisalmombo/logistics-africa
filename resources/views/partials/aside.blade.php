<aside class="main-sidebar">
<section class="sidebar">
<ul class="sidebar-menu" data-widget="tree">
        <li class="header">OVERVIEW</li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li class="active"><a href="{{url('/home')}}"><i class="fa fa-home"></i> Home</a></li>
        </ul>
    </li>

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Manage users</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{ url('/view/all/users') }}"><i class="fa fa-user"></i> All users</a></li>
        </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-square"></i>
                <span>Manage projects</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/projects') }}"><i class="fa fa-clipboard"></i> All projects</a></li>
                <li><a href="{{ url('/projects/create') }}"><i class="fa fa-plus"></i> Add project</a></li>
            </ul>
    </li>
    @endif

    {{-- @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-square"></i>
                <span>Manage procurements</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/kind/procurements') }}"><i class="fa fa-clipboard"></i> All procurements</a></li>
                <li><a href="{{ url('/kind/procurements/create') }}"><i class="fa fa-plus"></i> Add procurement</a></li>
            </ul>
    </li>
    @endif --}}

   {{-- @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-square"></i>
                <span>Budget expenditure</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/budget/expenditures') }}"><i class="fa fa-clipboard"></i> Budget expenditure</a></li>
                <li><a href="{{ url('/budget/expenditures/create') }}"><i class="fa fa-plus"></i> Add budget expenditure</a></li>
            </ul>
    </li>
    @endif --}}

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-square"></i>
                <span>Insurance Monitoring</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/insurance/monitorings') }}"><i class="fa fa-clipboard"></i> Insurance monitoring</a></li>
                <li><a href="{{ url('/insurance/monitorings/create') }}"><i class="fa fa-plus"></i> Add insurance monitoring</a></li>
            </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-square"></i>
                <span>Vehicle Log</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/vehicle/log/sheets') }}"><i class="fa fa-clipboard"></i> Vehicle log</a></li>
                <li><a href="{{ url('/vehicle/log/sheets/create') }}"><i class="fa fa-plus"></i> Add vehicle log</a></li>
            </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-square"></i>
                <span>Maintenance monitoring</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/maintenance/monitoring/assets') }}"><i class="fa fa-clipboard"></i> Maintenance monitoring</a></li>
                <li><a href="{{ url('/maintenance/monitoring/assets/create') }}"><i class="fa fa-plus"></i> Add maintenance monitoring</a></li>
            </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-square"></i>
                <span>Procurement request</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/procurement/requests') }}"><i class="fa fa-clipboard"></i> Procurement request</a></li>
                <li><a href="{{ url('/procurement/requests/create') }}"><i class="fa fa-plus"></i> Add procurement request</a></li>
            </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-square"></i>
                <span>Purchase order</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/purchase/orders') }}"><i class="fa fa-clipboard"></i> Purchase order</a></li>
                <li><a href="{{ url('/purchase/orders/create') }}"><i class="fa fa-plus"></i> Add purchase order</a></li>
            </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-square"></i>
                <span>Payment Voucher</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/payment/vouchers') }}"><i class="fa fa-clipboard"></i> Payment voucher</a></li>
                <li><a href="{{ url('/payment/voucherscreate') }}"><i class="fa fa-plus"></i> Add payment voucher</a></li>
            </ul>
    </li>
    @endif


    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
        <a href="#">
            <i class="fa fa-universal-access"></i> <span>Manage Permissions</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        <ul class="treeview-menu">
            <li>
            <a href="{{ url('/settings/manage_users/permissions') }}"><i class="fa fa-circle-o"></i> View Permission</a>
            </li>

            <li>
            <a href="{{ url('/settings/manage_users/permissions/entrust_role') }}"><i class="fa fa-circle-o"></i> Assign Permissions to Role</a>
            </li>

            <li>
            <a href="{{ url('/settings/manage_users/permissions/entrust_user') }}"><i class="fa fa-circle-o"></i> Entrust Permission to User</a>
            </li>
        </ul>
    </li>
    @endif

    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
        <a href="#">
            <i class="fa fa-times"></i> <span>Manage Roles</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li>
            <a href="{{ url('/settings/manage_users/roles') }}"><i class="fa fa-circle-o"></i> View Roles</a>
            </li>

            <li>
            <a href="{{ url('/settings/manage_users/roles/create') }}"><i class="fa fa-circle-o"></i> Entrust Role to User</a>
            </li>
        </ul>
    </li>
    @endif


    <li class="treeview">

        <a href="#">
            <i class="fa fa-cogs"></i> <span>Settings</span>
            <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">

            <li>
                <a href="{{ url('/view-users') }}"><i class="fa fa-circle-o"></i>Edit profile</a>
            </li>

            <li>
            <a href="{{url('/change-password')}}"><i class="fa fa-circle-o"></i> Change password</a>
            </li>

        </ul>

    </li>

    {{--  @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('administrator'))
    <li class="treeview">
            <a href="#">
                <i class="fa fa-comment"></i>
                <span>Manage Comment</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('/contact/all/contacts') }}"><i class="fa fa-comments-o"></i> All Comments</a></li>
            </ul>
    </li>
    @endif  --}}

</ul>
</section>
</aside>
