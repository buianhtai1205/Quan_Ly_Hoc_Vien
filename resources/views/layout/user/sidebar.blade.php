<!-- header section starts  -->
<style>
    /*
        * Custom scrollbar
        *  STYLE 15
        * SOURCE: https://codepen.io/devstreak/pen/dMYgeO
    */


    ::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.1);
        background-color: #F5F5F5;
        border-radius: 10px;
    }

    ::-webkit-scrollbar
    {
        width: 10px;
        background-color: #F5F5F5;
    }

    ::-webkit-scrollbar-thumb
    {
        border-radius: 10px;
        background-color: #FFF;
        background-image: -webkit-gradient(linear,
        40% 0%,
        75% 84%,
        from(#4D9C41),
        to(#19911D),
        color-stop(.6,#54DE5D))
    }
</style>
<div class="sidebar">

    <div class="user">
        @if (Auth ::guard('academic')->check())
            <h3>{{ Auth ::guard('academic')->user()->fullName }}</h3>
            <p>ID: {{ Auth ::guard('academic')->user()->academicID }}</p>
            <p>Academic Staff</p>
        @endif
        @if (Auth ::guard('teacher')->check())
            <h3>{{ Auth ::guard('teacher')->user()->fullName }}</h3>
            <p>ID: {{ Auth ::guard('teacher')->user()->teacherID }}</p>
            <p>Teacher</p>
        @endif
        @if (Auth ::guard('student')->check())
            <h3>{{ Auth ::guard('student')->user()->fullName }}</h3>
            <p>ID: {{ Auth ::guard('student')->user()->studentID }}</p>
            <p>Student</p>
        @endif
    </div>

    <nav class="sidebar-nav">
        <a class="side-nav-feat" href="#"><i class="fa-solid fa-house-chimney icon-sidebar"></i>Home</a>
        <a class="side-nav-feat" href="#"><i class="fa-solid fa-user icon-sidebar"></i>Portfolio</a>

        @if (Auth ::guard('academic')->check())
            <a id="feat-first-level" class="side-nav-feat" href="#" ><i class="fa-solid fa-compass icon-sidebar"></i>General Management</a>
            <ul id="feat-second-level" class="side-nav-second-level element-hidden" >
                <li class="">
                    <a href="{{ route('manage_education_programs.index') }}" class="side-nav-feat"><i class="fa-solid fa-angles-right icon-sidebar"></i>Mannage Education Program</a>
                </li>
                <li class="">
                    <a href="{{ route('manage_teachers.index') }}" class="side-nav-feat"><i class="fa-solid fa-angles-right icon-sidebar"></i>Mannage Teacher</a>
                </li>
                <li class="">
                    <a href="{{ route('manage_courses.index') }}" class="side-nav-feat"><i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Course</a>
                </li>
                <li class="">
                    <a href="{{ route('manage_student_classes.index') }}" class="side-nav-feat"><i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Student Class</a>
                </li>
                <li class="">
                    <a href="{{ route('manage_students.index') }}" class="side-nav-feat"><i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Student</a>
                </li>
                <li class="">
                    <a href="{{ route('manage_sections.index') }}" class="side-nav-feat"><i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Section</a>
                </li>
            </ul>
            <a class="side-nav-feat" href="{{ route('divide_class_students.getInformationStudents') }}"><i class="fa-solid fa-compass icon-sidebar"></i>Divide Class Student</a>
            <a class="side-nav-feat" href="{{ route('teaching_assignments.index') }}"><i class="fa-solid fa-compass icon-sidebar"></i>Teaching Assignment</a>
        @endif

        @if (Auth ::guard('teacher')->check())
            <a class="side-nav-feat" href="{{ route('register_teachings.index') }}"><i class="fa-solid fa-compass icon-sidebar"></i>
                Register For Teaching
            </a>
            <a class="side-nav-feat" href="{{ route('accept_assignments.index') }}"><i class="fa-solid fa-compass icon-sidebar"></i>
                Accept Assignment
            </a>
        @endif

        @if (Auth ::guard('student')->check())

        @endif

        <a class="side-nav-feat" href="{{ route('users.logout') }}"><i class="fa-solid fa-right-from-bracket icon-sidebar"></i>Logout</a>
    </nav>

</div>

<!-- header section ends -->

<div id="menu-btn" class="fas fa-bars"></div>

<!-- theme toggler  -->

<div id="theme-toggler" class="fas fa-moon"></div>

<script>
    let menu = document.querySelector('#menu-btn');
    menu.onclick = () =>{
        menu.classList.toggle('fa-times');
        header.classList.toggle('active');
    }

    window.onscroll = () =>{
        menu.classList.remove('fa-times');
        header.classList.remove('active');
    }

    let themeToggler = document.querySelector('#theme-toggler');

    themeToggler.onclick = () =>{
        themeToggler.classList.toggle('fa-sun');
        if(themeToggler.classList.contains('fa-sun')){
            document.body.classList.add('active');
        }else{
            document.body.classList.remove('active');
        }
    }

    let feat_first_level = document.getElementById('feat-first-level');
    let feat_second_level = document.getElementById('feat-second-level');

    feat_first_level.onclick = () => {
        if (feat_second_level.classList.contains('element-hidden')) {
            feat_second_level.classList.remove('element-hidden');
        } else {
            feat_second_level.classList.add('element-hidden');
        }

    }

</script>
