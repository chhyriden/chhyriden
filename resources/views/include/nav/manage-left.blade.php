<div id="manage-left-nav">
    <aside class="menu p-t-25 m-l-20 m-r-20">
            <p class="menu-label">
                General
            </p>
            <ul class="menu-list">
                <li><a href=" {{route('manage.dashboard')}} " class="{{ Request::is('manage/dashboard') ? 'is-active' : '' }}">Dashboard</a></li>
            </ul>
            <p class="menu-label">
                Administration
            </p>
            <ul class="menu-list">
                <li><a href=" {{route('users.index')}} " class="{{ Request::is('manage/users', 'manage/users/*') ? 'is-active' : '' }}">Manage Users</a></li>

                <li>
                    <a class="has-submenu {{ Request::is('manage/roles', 'manage/roles/*', 'manage/permissions', 'manage/permissions/*') ? 'is-opened' : '' }}">Settings</a>
                    <ul class="submenu">
                        <li><a href=" {{route('roles.index')}}" class="{{ Request::is('manage/roles', 'manage/roles/*') ? 'is-active' : '' }}">Roles</a></li>
                        <li><a href=" {{route('permissions.index')}}" class="{{ Request::is('manage/permissions', 'manage/permissions/*' ) ? 'is-active' : '' }}">Permissions</a></li>
                    </ul>
                </li>

            </ul>
    </aside>
    
</div>