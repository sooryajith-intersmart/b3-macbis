<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ \App\Helpers\AdminHelper::getValueByKey('website_logo') }}" alt="@themeSettings('website_name')"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">@themeSettings('website_name')</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Nav::isRoute('admin.dashboard') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('enquiry.index') }}" class="nav-link {{ Nav::isRoute('enquiry.index') }}">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>
                        Enquiries
                        </p>
                    </a>
                </li>
                <li
                    class="nav-item {{ Nav::isRoute(['slider.index', 'slider.create', 'slider.edit', 'business.index', 'business.create', 'business.edit', 'home.edit'], 'menu-open') }}">
                    <a href="#"
                        class="nav-link {{ Nav::isRoute(['slider.index', 'slider.create', 'slider.edit', 'business.index', 'business.create', 'business.edit', 'home.edit']) }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('slider.index') }}"
                                class="nav-link {{ Nav::isRoute(['slider.index', 'slider.create', 'slider.edit']) }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('business.index') }}"
                                class="nav-link {{ Nav::isRoute(['business.index', 'business.create', 'business.edit']) }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Business</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home.edit') }}" class="nav-link {{ Nav::isRoute('home.edit') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Content</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about.edit') }}" class="nav-link {{ Nav::isRoute('about.edit') }}">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            About
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('contact.edit') }}" class="nav-link {{ Nav::isRoute('contact.edit') }}">
                        <i class="nav-icon fas fa-phone"></i>
                        <p>
                            Contact
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('blog.index') }}" class="nav-link {{ Nav::isRoute(['blog.index', 'blog.create', 'blog.edit']) }}">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Blogs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('policy.index') }}" class="nav-link {{ Nav::isRoute(['policy.index', 'policy.create', 'policy.edit']) }}">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Policy
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('page-banner.index') }}" class="nav-link {{ Nav::isRoute(['page-banner.index', 'page-banner.edit']) }}">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Page Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('meta-tag.index') }}" class="nav-link {{ Nav::isRoute(['meta-tag.index', 'meta-tag.edit']) }}">
                        <i class="nav-icon fas fa-code"></i>
                        <p>
                            Meta Tags
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>