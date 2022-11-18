<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="">
                            <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">{{trans('main_trans.home')}}</span>
                            </div>

                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{trans('main_trans.Components')}} </li>
                    <!-- menu item Elements-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="fa fa-bank"></i><span
                                    class="right-nav-text">{{trans('main_trans.grades')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('Grades.index')}}">{{trans('main_trans.grades_list')}}</a></li>
                        </ul>
                    </li>
                    <!-- menu item calendar-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left">
                                <i class="ti-calendar"></i>
                                <span class="right-nav-text">{{trans('My_Classes_trans.title_page')}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Classrooms.index')}}">{{trans('My_Classes_trans.List_classes')}}</a> </li>
{{--                            <li> <a href="calendar-list.html">List Calendar</a> </li>--}}
                        </ul>
                    </li>




                    <!-- sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left">
                                <i class="fa fa-sitemap"></i>
                                <span class="right-nav-text">{{trans('main_trans.sections')}}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('sections.index')}}">{{trans('main_trans.List_sections')}}</a></li>
                        </ul>
                    </li>




                    <!-- Students-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Student_information">
                            <div class="pull-left"><i class="fa fa fa-address-card"></i></i><span
                                    class="right-nav-text">{{trans('main_trans.Student_information')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Student_information" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Students.create')}}">{{trans('main_trans.add_student')}}</a></li>
                            <li> <a href="{{route('Students.index')}}">{{trans('main_trans.list_students')}}</a></li>
                        </ul>
                    </li>


                    <!-- Students_upgrade-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Students_upgrade">
                            <div class="pull-left"><i class="fa fa-star"></i></i><span
                                    class="right-nav-text">{{trans('main_trans.Students_Promotions')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Students_upgrade" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Promotion.index')}}">{{trans('main_trans.add_Promotion')}}</a> </li>
                            <li> <a href="{{route('Promotion.create')}}">{{trans('main_trans.list_Promotions')}}</a></li>
                        </ul>
                    </li>




                    <!-- Graduate-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Graduate students">
                            <div class="pull-left"><i class="fa  fa-graduation-cap"></i><span
                                    class="right-nav-text"></span>{{trans('main_trans.Graduate_students')}}</div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Graduate students" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Graduated.create')}}">{{trans('main_trans.add_Graduate')}}</a> </li>
                            <li> <a href="{{route('Graduated.index')}}">{{trans('main_trans.list_Graduate')}}</a> </li>
                        </ul>
                    </li>


                    <!-- Teachers-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left"><i class="fa  fa-group"></i></i><span
                                    class="right-nav-text">{{trans('main_trans.Teachers')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Teachers.index')}}">{{trans('main_trans.List_Teachers')}}</a> </li>
                        </ul>
                    </li>


                    <!-- Parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Parents-menu">
                            <div class="pull-left"><i class="fa fa-user"></i><span
                                    class="right-nav-text">{{trans('main_trans.Parents')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Parents-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('add_parent')}}">{{trans('main_trans.List_Parents')}}</a> </li>
                        </ul>
                    </li>

                    <!-- Accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fa fa-cc-visa"></i><span
                                    class="right-nav-text">{{trans('main_trans.Accounts')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('Fees.index')}}">الرسوم الدراسية</a> </li>
                            <li> <a href="{{route('Fees_Invoices.index')}}">الفواتير</a> </li>
                            <li> <a href="">سندات القبض</a> </li>
                            <li> <a href="">استبعاد رسوم</a> </li>
                            <li> <a href="">سندت الصرف</a> </li>
                        </ul>
                    </li>

                    <!-- Attendance-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Attendance-icon">
                            <div class="pull-left"><i class="fa  fa-calendar"></i><span class="right-nav-text">{{trans('main_trans.Attendance')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Attendance-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="">قائمة الطلاب</a> </li>
                        </ul>
                    </li>

                    <!-- Subjects-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Subjects">
                            <div class="pull-left"><i class="fa fa-file-pdf-o"></i><span class="right-nav-text">المواد الدراسية</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Subjects" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="">قائمة المواد</a> </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
