            
            <div id="sidebar-wrapper">
                <img class="mt-2" src="" id="emp_img"/>
                <div class="form-check form-switch ms-3">
                    <input class="form-check-input" type="checkbox" id="hide_pic" onchange="show_pic(this)">
                    <label class="form-check-label" for="hide_pic">Show picture</label>
                </div>
				<span class="ps-3 text-light">{{ strtoupper(session()->get('user')) }}</span>
				<ul id="sidebar-nav" class="mt-0">
                    <li class="d-flex flex-row" style="font-size:small">
                        <div><a href="{{ url('/logout') }}" class="nav-link p-2"><i class="fas fa-sign-out-alt"></i> Logout</a></div>
                        <div> <a href="{{ url('/user/password') }}" class="nav-link p-2"><i class="fas fa-cog"></i> Password</a><div>
					</li>

					<li><hr class="dropdown-divider bg-light"></li>
					
                    <li class="nav-item dropdown">
                        <a href="{{ url('/user') }}" class="nav-link"><i class="fas fa-home"></i> Home</a>
					</li>
                    
                    <li class="nav-item dropdown">
                        <a href="{{ url('/user/attend') }}" class="nav-link"><i class="fas fa-clock"></i> Attendance</a>
					</li>

                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-file"></i> Requests</a>
                        <div class="dropdown-menu submenu">
                            <a href="{{ url('/user/requests') }}" class="dropdown-item">View</a>
                            <a href="{{ url('/user/new_req') }}" class="dropdown-item">New</a>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a href="{{ url('/user/docs') }}" class="nav-link"><i class="fas fa-copy"></i> My Documents</a>
					</li>

					<li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-calendar"></i> Leaves</a>
                        <div class="dropdown-menu submenu">
                            <a href="{{ url('/user/leaves') }}" class="dropdown-item">View</a>
                            <a href="{{ url('/user/apply_lev') }}" class="dropdown-item">Apply</a>
                            <a href="{{ url('/user/quota') }}" class="dropdown-item">My Quota</a>
                        </div>
                    </li>
					
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-angle-double-down"></i> Salary</a>
                        <div class="dropdown-menu submenu">
                            <a href="{{ url('/user/salary') }}" class="dropdown-item">Package</a>
                            <a href="{{ url('/user/payments') }}" class="dropdown-item">Payments</a>
                        </div>
                    </li>
				</ul>
			</div>