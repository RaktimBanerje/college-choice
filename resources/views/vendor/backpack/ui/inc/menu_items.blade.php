{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<!--@includeWhen(class_exists(\Backpack\DevTools\DevToolsServiceProvider::class), 'backpack.devtools::buttons.sidebar_item')-->


<!--<x-backpack::menu-item title="Colleges" icon="la la-question" :link="backpack_url('college')" />-->
<!--<x-backpack::menu-item title="College details" icon="la la-question" :link="backpack_url('college-detail')" />-->
<!--<x-backpack::menu-item title="Users" icon="la la-question" :link="backpack_url('user')" />-->
<!--<x-backpack::menu-item title="Courses" icon="la la-question" :link="backpack_url('course')" />-->
<!--<x-backpack::menu-item title="Course details" icon="la la-question" :link="backpack_url('course-detail')" />-->
<!--<x-backpack::menu-item title="Countries" icon="la la-question" :link="backpack_url('country')" />-->
<!--<x-backpack::menu-item title="States" icon="la la-question" :link="backpack_url('state')" />-->
<!--<x-backpack::menu-item title="Districts" icon="la la-question" :link="backpack_url('district')" />-->
<!--<x-backpack::menu-item title="Leads" icon="la la-question" :link="backpack_url('lead')" />-->
<!--<x-backpack::menu-item title="Exams" icon="la la-question" :link="backpack_url('exam')" />-->
<!--<x-backpack::menu-item title="Notifications" icon="la la-question" :link="backpack_url('notification')" />-->

<x-backpack::menu-item title="Colleges" icon="las la-university" :link="backpack_url('college')" />
<x-backpack::menu-item title="College details" icon="las la-info-circle" :link="backpack_url('college-detail')" />
<x-backpack::menu-item title="Users" icon="las la-users" :link="backpack_url('user')" />
<x-backpack::menu-item title="Courses" icon="las la-book" :link="backpack_url('course')" />
<x-backpack::menu-item title="Course details" icon="las la-file-alt" :link="backpack_url('course-detail')" />
<x-backpack::menu-item title="Countries" icon="las la-globe" :link="backpack_url('country')" />
<x-backpack::menu-item title="States" icon="las la-map" :link="backpack_url('state')" />
<x-backpack::menu-item title="Districts" icon="las la-map-marker" :link="backpack_url('district')" />
<!--<x-backpack::menu-item title="Leads" icon="las la-user-plus" :link="backpack_url('lead')" />-->
<x-backpack::menu-item title="Exams" icon="las la-clipboard-list" :link="backpack_url('exam')" />
<x-backpack::menu-item title="Notifications" icon="las la-bell" :link="backpack_url('notification')" />