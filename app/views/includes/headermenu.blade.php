<div class="hor-menu">
				<ul class="nav navbar-nav">
					<li class="active">
						<a href="index.html">Dashboard</a>
					</li>
					<li class="menu-dropdown classic-menu-dropdown">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;" class="dropdown-toggle">
						Submit <i class="fa fa-angle-down"></i>
						</a>

						<ul class="mega-menu dropdown-menu" style="min-width: 260px;">
							<li><a href="{{URL::to('/submit-company')}}"><i class="fa fa-angle-right"></i> Register Company for Sell</a></li>
							<li><a href="{{URL::to('/submit-requirement')}}"><i class="fa fa-angle-right"></i> Submit Requirement for Purchase</a></li>

						</ul>
					</li>
					<li class="menu-dropdown classic-menu-dropdown">
						<a data-hover="megamenu-dropdown" data-close-others="true" data-toggle="dropdown" href="javascript:;">
						Search <i class="fa fa-angle-down"></i>
						</a>

						<ul class="dropdown-menu">
							<li><a href="{{URL::to('/companies')}}"><i class="fa fa-angle-right"></i> Search Companies{{-- Find Buyer Here --}} </a></li>
							<li><a href="{{URL::to('/requirements')}}"><i class="fa fa-angle-right"></i> Search Requirements </a></li>
						</ul>
					</li>
				</ul>
			</div>