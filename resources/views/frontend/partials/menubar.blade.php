<nav class="primary-menu">
    <ul class="menu-container">
        <li class="menu-item">
            <a class="menu-link" href="{{ url('/') }}"><div>Home</div></a>
        </li>
        <li class="menu-item">
            <a class="menu-link" href="{{ url('about') }}"><div>About Us</div></a>
            <ul class="sub-menu-container">
                <li class="menu-item">
                    <a class="menu-link" href="{{ url('about') }}"><div>About Us</div></a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="{{ url('bod') }}"><div>Message From The Chairman</div></a>
                </li>
            </ul>
        </li>
        <li class="menu-item">
            <a class="menu-link" href="{{ url('services') }}"><div>Our Services</div></a>
        </li>
        <li class="menu-item">
            <a class="menu-link" href="{{ url('training') }}"><div>Training</div></a>
        </li>
        <li class="menu-item">
            <a class="menu-link" href="{{ url('news') }}"><div>News and Notices</div></a>
        </li>
        <li class="menu-item">
            <a class="menu-link" href="{{ url('contact') }}"><div>Contact Us</div></a>
        </li>
    </ul>
</nav>