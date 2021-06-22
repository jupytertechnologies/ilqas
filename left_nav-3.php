<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$datas = $objUser->get_user($user_id);
foreach ($datas as $data){
$first_name = $data['first_name'];
$last_name = $data['last_name'];

	
echo '

<div id="layoutSidenav_nav">
	<nav class="sidenav shadow-right sidenav-light">
		<div class="sidenav-menu">
			<div class="nav accordion" id="accordionSidenav">
				<!-- Sidenav Menu Heading (Account)-->
				<!-- * * Note: * * Visible only on and above the sm breakpoint-->
				<div class="sidenav-menu-heading d-sm-none">Account</div>
				<!-- Sidenav Link (Alerts)-->
				<!-- * * Note: * * Visible only on and above the sm breakpoint-->
				<a class="nav-link d-sm-none" href="#!">
					<div class="nav-link-icon"><i data-feather="bell"></i></div>
					Alerts
					<span class="badge badge-warning-soft text-warning ml-auto">4 New!</span>
				</a>
				<!-- Sidenav Link (Messages)-->
				<!-- * * Note: * * Visible only on and above the sm breakpoint-->
				<a class="nav-link d-sm-none" href="#!">
					<div class="nav-link-icon"><i data-feather="mail"></i></div>
					Messages
					<span class="badge badge-success-soft text-success ml-auto">2 New!</span>
				</a>
				<!-- Sidenav Menu Heading (Core)-->
				<div class="sidenav-menu-heading">Home</div>
				<!-- Sidenav Accordion (Dashboard)-->
				<a class="nav-link collapsed" id="dashboard" href="dashboard-3.php?user='.$user_id.'" >
					<div class="nav-link-icon"><i data-feather="activity"></i></div>
					Dashboards
					<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<!-- Sidenav Heading (App Views)-->
				<div class="sidenav-menu-heading">Requests</div>
				<!-- Sidenav Accordion (Pages)-->
				<a class="nav-link collapsed" href="request.php?user_id='.$user_id.'" >
					<div class="nav-link-icon"><i data-feather="grid"></i></div>
					Requests
					<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				
				<!-- Sidenav Heading (UI Toolkit)-->
				<div class="sidenav-menu-heading">Deliveries</div>
				<!-- Sidenav Accordion (Layout)-->
				<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
					<div class="nav-link-icon"><i data-feather="layout"></i></div>
					Dispatches
					<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
					<nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
						<!-- Nested Sidenav Accordion (Layout -> Navigation)-->
						<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayoutSidenavVariations" aria-expanded="false" aria-controls="collapseLayoutSidenavVariations">
							Dispatch Panels
							<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayoutSidenavVariations" data-parent="#accordionSidenavLayout">
							<nav class="sidenav-menu-nested nav">
								<a class="nav-link" href="layout-static.html">Static Sidenav</a>
								<a class="nav-link" href="layout-dark.html">Dark Sidenav</a>
								<a class="nav-link" href="layout-rtl.html">RTL Layout</a>
							</nav>
						</div>
						<!-- Nested Sidenav Accordion (Layout -> Container Options)-->
						<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayoutContainers" aria-expanded="false" aria-controls="collapseLayoutContainers">
							<!---Accepted and rejected panels----> 
							Deliveries
							<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayoutContainers" data-parent="#accordionSidenavLayout">
							<nav class="sidenav-menu-nested nav">
								<a class="nav-link" href="layout-boxed.html">Boxed Layout</a>
								<a class="nav-link" href="layout-fluid.html">Fluid Layout</a>
							</nav>
						</div>
						<!-- Nested Sidenav Accordion (Layout -> Page Headers)-->
						<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayoutsPageHeaders" aria-expanded="false" aria-controls="collapseLayoutsPageHeaders">
							Storage
							<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayoutsPageHeaders" data-parent="#accordionSidenavLayout">
							<nav class="sidenav-menu-nested nav">
								<a class="nav-link" href="header-simplified.html">Simplified</a>
								<a class="nav-link" href="header-compact.html">Compact</a>
								<a class="nav-link" href="header-overlap.html">Content Overlap</a>
								<a class="nav-link" href="header-breadcrumbs.html">Breadcrumbs</a>
								<a class="nav-link" href="header-light.html">Light</a>
							</nav>
						</div>
						<!-- Nested Sidenav Accordion (Layout -> Starter Layouts)-->
						<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayoutsStarterTemplates" aria-expanded="false" aria-controls="collapseLayoutsStarterTemplates">
							Disposal
							<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayoutsStarterTemplates" data-parent="#accordionSidenavLayout">
							<nav class="sidenav-menu-nested nav">
								<a class="nav-link" href="starter-default.html">Default</a>
								<a class="nav-link" href="starter-minimal.html">Minimal</a>
							</nav>
						</div>
						<!-- Nested Sidenav Accordion (Layout -> Starter Layouts)-->
						<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayoutsStarterTemplates" aria-expanded="false" aria-controls="collapseLayoutsStarterTemplates">
							Payments
							<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
						</a>
						<div class="collapse" id="collapseLayoutsStarterTemplates" data-parent="#accordionSidenavLayout">
							<nav class="sidenav-menu-nested nav">
								<a class="nav-link" href="starter-default.html">Default</a>
								<a class="nav-link" href="starter-minimal.html">Minimal</a>
							</nav>
						</div>
					</nav>
				</div>
				<!-- Sidenav Heading (UI Toolkit)-->
				<div class="sidenav-menu-heading">Submissions</div>
				
				<!-- Sidenav Accordion (Components)-->
				<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseComponents" aria-expanded="false" aria-controls="collapseComponents">
					<div class="nav-link-icon"><i data-feather="package"></i></div>
					Submissions
					<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="collapseComponents" data-parent="#accordionSidenav">
					<nav class="sidenav-menu-nested nav">
						<a class="nav-link" href="alerts.html">Submit Results</a>
						<a class="nav-link" href="avatars.html">All Results Submissions</a>
						<a class="nav-link" href="badges.html">Trend Analysis</a>
					</nav>
				</div>
				<!-- Sidenav Heading (UI Toolkit)-->
				<div class="sidenav-menu-heading">Reports</div>
				<!-- Sidenav Accordion (Components)-->
				<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#reports" aria-expanded="false" aria-controls="collapseComponents">
					<div class="nav-link-icon"><i class = "bi bi-book"></i></div>
					Reports
					<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="reports" data-parent="#accordionSidenav">
					<nav class="sidenav-menu-nested nav">
						<a class="nav-link" href="charts.html">Charts</a>
						<a class="nav-link" href="tables.html">Tables</a>
					</nav>
				</div>
				<!-- Sidenav Heading (UI Toolkit)-->
				<div class="sidenav-menu-heading">Settings</div>
				<!-- Sidenav Accordion (Components)-->
				<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#settings" aria-expanded="false" aria-controls="collapseComponents">
					<div class="nav-link-icon" id="settings">
					<i class = "bi bi-gear"></i></div>
					Settings
					<div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
				</a>
				<div class="collapse" id="settings" data-parent="#accordionSidenav">
					<nav class="sidenav-menu-nested nav">
						<a class="nav-link" id="labDetails" onclick="loadLab('.$user_id.');">Laboratory Details</a>
						<a class="nav-link" href="preferences.php">User Preferences</a>
					</nav>
				</div>
				
			</div>
		</div>
		<!-- Sidenav Footer-->
		<div class="sidenav-footer">
			<div class="sidenav-footer-content">
			<div class="sidenav-footer-subtitle">Logged in as:</div>
				<div class="sidenav-footer-title">'.$first_name.' '.$last_name.'</div>
			</div>
		</div>
	</nav>
</div>';

} ?>