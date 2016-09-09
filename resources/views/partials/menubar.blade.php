<!-- BEGIN MENUBAR-->
<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="{{ url('') }}">
                <span class="text-lg text-bold text-primary ">{{ config('website.name') }}</span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">
        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">

            <!-- BEGIN DASHBOARD -->
            <li>
                <a href="{{ url('') }}">
                    <div class="gui-icon">
                        <i class="md md-home"></i>
                    </div>
                    <span class="title">Home</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->

            <!-- BEGIN CUSTOMER -->
            <li>
                <a href="{{ route('customer.index') }}">
                    <div class="gui-icon">
                        <i class="md md-account-child"></i>
                    </div>
                    <span class="title">Customer</span>
                </a>
            </li>
            <!-- END CUSTOMER -->

            <!-- BEGIN USERS -->
            <li class="gui-folder">
                <a href="javascript:void(0);">
                    <div class="gui-icon">
                        <i class="md md-face-unlock"></i>
                    </div>
                    <span class="title">Users</span>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('user.index') }}">
                            <span class="title">List</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.create') }}">
                            <span class="title">Create</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('role.index') }}">
                            <span class="title">Role</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- END USERS -->

            <!-- BEGIN SERVICES -->
            <li>
                <a href="{{ route('operatingSystem.index') }}">
                    <div class="gui-icon">
                        <i class="md md-layers"></i>
                    </div>
                    <span class="title">Operating System</span>
                </a>
            </li>
            <!-- END SERVICES -->

            <!-- BEGIN SERVICES -->
            <li>
                <a href="{{ route('service.index') }}">
                    <div class="gui-icon">
                        <i class="md md-layers"></i>
                    </div>
                    <span class="title">Services</span>
                </a>
            </li>
            <!-- END SERVICES -->

            <!-- BEGIN TESTIMONIALS -->
            <li>
                <a href="{{ route('testimonial.index') }}">
                    <div class="gui-icon">
                        <i class="md md-message"></i>
                    </div>
                    <span class="title">Testimonials</span>
                </a>
            </li>
            <!-- END TESTIMONIALS -->

            <!-- BEGIN CERTIFICATE -->
            <li>
                <a href="{{ route('certificate.index') }}">
                    <div class="gui-icon">
                        <i class="md md-layers"></i>
                    </div>
                    <span class="title">Certificate</span>
                </a>
            </li>
            <!-- END CERTIFICATE -->

            <!-- BEGIN CLIENT -->
            <li>
                <a href="{{ route('client.index') }}">
                    <div class="gui-icon">
                        <i class="md md-layers"></i>
                    </div>
                    <span class="title">Client</span>
                </a>
            </li>
            <!-- END CLIENT -->

            <!-- BEGIN EMAIL PACKAGE -->
            <li>
                <a href="{{ route('emailPackage.index') }}">
                    <div class="gui-icon">
                        <i class="md md-layers"></i>
                    </div>
                    <span class="title">Email Package</span>
                </a>
            </li>
            <!-- END EMAIL PACKAGE -->

            <!-- BEGIN DATACENTER -->
            <li>
                <a href="{{ route('dataCenter.index') }}">
                    <div class="gui-icon">
                        <i class="md md-layers"></i>
                    </div>
                    <span class="title">DataCenter</span>
                </a>
            </li>
            <!-- END DATACENTER -->

            <!-- BEGIN PAGES -->
            <li>
                <a href="{{ route('page.index') }}">
                    <div class="gui-icon">
                        <i class="md md-pages"></i>
                    </div>
                    <span class="title">Pages</span>
                </a>
            </li>
            <!-- END PAGES -->

            <!-- BEGIN MENU -->
            <li>
                <a href="{{ route('menu.index') }}">
                    <div class="gui-icon">
                        <i class="md md-list"></i>
                    </div>
                    <span class="title">Menu</span>
                </a>
            </li>
            <!-- END MENU -->

            <!-- BEGIN STAFF -->
            <li>
                <a href="{{ route('staff.index') }}">
                    <div class="gui-icon">
                        <i class="md md-assignment-ind"></i>
                    </div>
                    <span class="title">Staff</span>
                </a>
            </li>
            <!-- END STAFF -->

        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->
        <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
                <span class="opacity-75">Copyright &copy; 2016</span>
                <strong>
                    <a href="{{ config('website.url') }}">{{ config('website.title') }}</a>
                </strong>
            </small>
        </div>
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->
<!-- END MENUBAR -->
