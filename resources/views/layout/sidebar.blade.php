			<div class="sidebar col-md-2">
				<h3>HRSYS</h3>
				<ul>
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
					
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-sitemap"></i> Branches</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/branches') }}" class="dropdown-item">View</a>
                            <a href="{{ url('/add_branch') }}" class="dropdown-item">Add</a>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-cubes"></i> Departments</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/departments') }}" class="dropdown-item">View</a>
                            <a href="{{ url('/add_dept') }}" class="dropdown-item">Add</a>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user"></i> Employees</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/employees') }}" class="dropdown-item">View</a>
                            <a href="{{ url('/add_employee') }}" class="dropdown-item">Add</a>
                            <a href="{{ url('/emp_types') }}" class="dropdown-item">Types</a>
                            <a href="{{ url('/add_emptype') }}" class="dropdown-item">Add Type</a>
                        </div>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-clock"></i> Attendance</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/attendance') }}" class="dropdown-item">View</a>
                            <a href="{{ url('/add_attend') }}" class="dropdown-item">Add</a>
                            <a href="{{ url('/upl_attend') }}" class="dropdown-item">Upload</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-calendar"></i> Leaves</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/leaves') }}" class="dropdown-item">View</a>
                            <a href="{{ url('/add_leaves') }}" class="dropdown-item">Add</a>
                            <a href="{{ url('/levs_quota') }}" class="dropdown-item">Quota</a>
                            <a href="{{ url('/add_quota') }}" class="dropdown-item">Add Quota</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-file"></i> Documents</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/documents') }}" class="dropdown-item">View</a>
                            <a href="{{ url('/upload_docs') }}" class="dropdown-item">Upload</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" ><i class="fas fa-address-card"></i> Designations</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/designations') }}" class="dropdown-item">View</a>
                            <a href="{{ url('/add_dsgns') }}" class="dropdown-item">Add</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-angle-double-down"></i> Salary</a>
                        <div class="dropdown-menu">
                            <a href="{{ url('/payments') }}" class="dropdown-item">Payments</a>
                            <a href="{{ url('/gen_payments') }}" class="dropdown-item">Generate</a>
                            <a href="{{ url('/salaries') }}" class="dropdown-item">Salaries</a>
                            <a href="{{ url('/add_salary') }}" class="dropdown-item">Add Salary</a>
                        </div>
                    </li>
				</ul>
			</div>