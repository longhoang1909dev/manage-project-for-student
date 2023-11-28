<nav class="navbar navbar-expand-lg p-2 position-sticky">
    <!-- left -->
    <div class="container-fluid">
        <div class="center-center">
            <div class="logo">
                <a href="#"><img src="{{asset('img/logo.png')}}" alt="Logo Header"></a>
            </div>
        </div>
    </div>
    <!-- /left -->

    <!-- right -->
    <div class="info t-14 fw-700" id="userDropdown" role="button">
        <img class="avatar" src="{{asset('storage/image/'.$img)}}" alt="" style="border-radius: 50%; object-fit: cover;">
        <div class="fullname ms-2">{{$name}}</div>
        <i class="bi bi-caret-down-fill"></i>
        <ul id="userDropdownMenu">
            <li><a href="{{ route('logout') }}"><i class="me-2 bi bi-box-arrow-right"></i>Đăng xuất</a></li>
            @if (Session::has('id'))
             <li><a href="{{ route('student.infoStudent') }}"><i class="me-2 bi bi-pen"></i>Chỉnh sửa thông tin</a></li>
            @else
             <li><a href="{{ route('teacher.infoTeacher') }}"><i class="me-2 bi bi-pen"></i>Chỉnh sửa thông tin</a></li>
            @endif
            <li class="has-submenu" id="settingsMenu"> <!-- Add a class for submenu and an id -->
                <a class="submenu-trigger" role="button">
                    <i class="me-2 bi bi-gear"></i>Cài đặt
                </a>
                <ul class="submenu" id="subSettingsMenu"> <!-- Submenu for "Cài đặt" and an id -->
                    <li><a href="">Ngôn ngữ</a></li>
                    <li><a href="">Bảo mật</a></li>
                    <li><a href="">Màu nền</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- right -->
</nav>
<script>
    const userDropdown = document.querySelector('#userDropdown');
    const userDropdownMenu = document.getElementById('userDropdownMenu');
    const settingsMenu = document.getElementById('settingsMenu');
    const subSettingsMenu = document.querySelector('#subSettingsMenu');

    userDropdown.addEventListener('click', () => {
        userDropdownMenu.classList.toggle('active');
    });

    settingsMenu.addEventListener('click', (e) => {
        e.stopPropagation(); 
        subSettingsMenu.classList.toggle('active'); 
    });

    document.addEventListener('click', (e) => {
        if (!userDropdown.contains(e.target)) {
            userDropdownMenu.classList.remove('active');
            subSettingsMenu.classList.remove('active');
        }
    });
</script>
