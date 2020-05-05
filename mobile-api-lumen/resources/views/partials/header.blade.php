<header id="header">
    <div class="headerbar">
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand">
                    <div class="brand-holder">
                        <a href="{{url('')}}">
                            <span class="text-lg text-bold text-primary">{{ config('website.name') }}</span>
                        </a>
                    </div>
                </li>
                <li>
                    <a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                        <i class="md md-menu"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="headerbar-right">
            <ul class="header-nav header-nav-options">
                @include('partials.countries')
                <li class="notification dropdown hidden-xs">
                    <a href="javascript:void(0);" class="btn btn-icon-toggle btn-default" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <sup class="badge style-danger" v-cloak>@{{ notifications | unreadCount }}</sup>
                    </a>
                    <ul class="notification-dropdown dropdown-menu animation-expand">
                        <li class="dropdown-header">Notifications</li>
                        <li v-for="notification in notifications">
                            <a class="alert" :class="notification.class" :href="notification.link">
                                <i class="dropdown-avatar pull-right" :class="'fa fa-'+notification.icon"></i>
                                <strong>@{{ notification.title }}</strong><br>
                                <small>@{{ notification.message  }}</small>
                            </a>
                        </li>
                        <li v-if="notifications.length == 0">
                            <a class="alert alert-priority-1">
                                <strong>No notifications.</strong>
                            </a>
                        </li>
                        <li class="dropdown-header">Options</li>
                        <li>
                            <a href="{{ route('notification.index') }}">View all messages
                                <span class="pull-right"><i class="fa fa-arrow-right"></i></span>
                            </a>
                        </li>
                        <li>
                            <a class="mark-all-read" href="javascript:void(0);" data-href="{{ route('api.notification.mark.all') }}">
                                Mark as read
                                <span class="pull-right"><i class="fa fa-arrow-right"></i></span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <img src="{{ user_avatar(50) }}" alt=""/>
                        <span class="profile-info">
                            {{ auth()->user()->first_name }}
                            <small>{{ display(auth()->user()->roles->pluck('name')->implode(', '), 'None') }}</small>
                        </span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li class="dropdown-header">Config</li>
                        <li>
                            <a href="{{ route('user.show', auth()->user()->username) }}">
                                <i class="md md-account-circle"></i>
                                My profile
                            </a>
                        </li>
                        @if(auth()->user()->isRole('super'))
                            <li>
                                <a href="{{ route('setting.index') }}">
                                    <i class="md md-settings"></i>
                                    Settings
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{url('/logout')}}">
                                <i class="md md-settings-power text-danger"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>

@push('scripts')
    <script>
        var notifications = JSON.parse('{!! addslashes(json_encode($notifications)) !!}');
        var auth_user_id = "{{ auth()->id() }}";
    </script>
    <!-- START NOTIFICATION SCRIPT -->
    <script src="{{ asset('js/notification.min.js') }}"></script>
    <!-- END NOTIFICATION SCRIPT -->
@endpush
