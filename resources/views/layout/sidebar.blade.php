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
        <h3>Bui Anh Tai</h3>
        <p>Academic Staff</p>
    </div>

    <nav class="sidebar-nav">
        <a href=""><i class="fa-solid fa-house-chimney icon-sidebar"></i>Home</a>
        <a href=""><i class="fa-solid fa-user icon-sidebar"></i>Portfolio</a>
        <a href=""><i class="fa-solid fa-compass icon-sidebar"></i>Divide Class Student</a>
        <a href=""><i class="fa-solid fa-compass icon-sidebar"></i>Teaching Assignment</a>
        <a href=""><i class="fa-solid fa-right-from-bracket icon-sidebar"></i>Logout</a>
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
</script>
