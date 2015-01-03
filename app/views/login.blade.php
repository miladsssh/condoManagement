@extends('layout.default')



@section('content')


<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->


<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<!-- 	
		<a href="index.html">
			<img src="../../assets/admin/layout2/img/logo-big.png" alt=""/>
		</a> 
	-->
	<h3 style="font-weight: bold;">
		<span style="color:white">Condo</span>
		<span style="color:rgb(255, 107, 0)">Management</span>
	</h3>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->

<div class="content">

	@include('partials.errors')
	@include('partials.forms.forgetPassword')
	@include('partials.forms.login')
	@include('partials.forms.register')

</div>

@stop

