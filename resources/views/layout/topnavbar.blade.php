            <div class="topbar">
                @if(session()->get('user'))
                    <a href="{{ url('/logout') }}"><span>{{ strtoupper(session()->get('user')) }} <i class="fas fa-sign-out-alt"></i></span></a>
                @else
                    <a href="{{ url('/logout') }}"><span>Logout <i class="fas fa-sign-out-alt"></i></span></a>
                @endif
                <a href="#"><span>Mail <i class="fas fa-envelope"></i></span></a>
                <a href="{{ url('/ad_sys_usrs') }}"><span>Add Users <i class="fas fa-user-plus"></i></span></a>
                <a href="{{ url('/workdays') }}"><span>Workdays <i class="fas fa-calendar-check"></i></span></a>
			</div>
