<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="">
            <p>Gewoon Joost</p>
        </a>

        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item">
                Home
            </a>

            <a class="navbar-item" href="{{ url('upload') }}">
                Upload
            </a>

{{--            <div class="navbar-item has-dropdown is-hoverable">--}}
{{--                <a class="navbar-link" href="{{ url('upload') }}">--}}
{{--                    upload--}}
{{--                </a>--}}

{{--                <div class="navbar-dropdown">--}}
{{--                    <a class="navbar-item">--}}
{{--                        About--}}
{{--                    </a>--}}
{{--                    <a class="navbar-item">--}}
{{--                        Jobs--}}
{{--                    </a>--}}
{{--                    <a class="navbar-item">--}}
{{--                        Contact--}}
{{--                    </a>--}}
{{--                    <hr class="navbar-divider">--}}
{{--                    <a class="navbar-item">--}}
{{--                        Report an issue--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</nav>
