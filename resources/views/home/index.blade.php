<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
</head>

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <header>
        @include('home.header')
    </header>
    <!-- end header inner -->
    <!-- end header -->
    <!-- banner -->
    <div>
        @include('home.slider')
    </div>
    <!-- end banner -->
    <!-- about -->
    <div id="about">
        @include('home.about')
    </div>

    <!-- end about -->
    <!-- our_room -->
    <div id="room">
        @include('home.room')
    </div>
    <!-- end our_room -->
    <!-- gallery -->
    <div id="gallery">
        @include('home.gallery')
    </div>

    <div id="contact">
        @include('home.contact')
    </div>

    <!-- end contact -->
    <!--  footer -->
    <div>
        @include('home.footer')
    </div>
    <!-- end footer -->
    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <script>
        window.addEventListener('beforeunload', function() {
            localStorage.setItem('scrollPosition', window.scrollY);
        });
    </script>

    <script>
        window.addEventListener('load', function() {
            const scrollPosition = localStorage.getItem('scrollPosition');
            if (scrollPosition) {
                window.scrollTo(0, scrollPosition);
                localStorage.removeItem('scrollPosition');
            }
        });
    </script>
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const target = document.querySelector(this.getAttribute('href'));

                if (target) {
                    window.scrollTo({
                        top: target.offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
    <script>
        document.querySelectorAll('.nav-link').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                // Prevent the default link behavior
                e.preventDefault();

                // Scroll to the section smoothly
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>


</body>

</html>
