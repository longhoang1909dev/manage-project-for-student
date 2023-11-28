<div class="sidebar">
    <ul class="nav nav-pills flex-column mb-auto " style="padding-top: 50px;">
        <li>
            <a href="{{ route('teacher.TE_dashboard') }}" class="nav-link link-body-emphasis">
                <i class="bi bi-house-door"></i>
                Tổng quan
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.register_list') }}" class="nav-link link-body-emphasis">
                <i class="bi bi-people-fill"></i>
                Danh sách sinh viên đăng ký đồ án
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.update') }}" class="nav-link link-body-emphasis">
                <i class="fa-solid fa-list-check"></i>
                Cập nhật đồ án
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.calendar') }}" class="nav-link link-body-emphasis">
                <i class="bi bi-calendar4-range"></i>
                Lịch thống kê báo cáo
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.teacherChat') }}" class="nav-link link-body-emphasis">
                <i class="bi bi-chat-dots"></i>
                Chat với sinh viên
            </a>
        </li>
        <li>
            <a href="{{ route('teacher.monitor_process') }}" class="nav-link link-body-emphasis">
                <i class="bi bi-ui-radios"></i>
                Theo dõi tiến trình
            </a>
        </li>
    </ul>
</div>

<div class="sidebar_mobile" id="sidebar_mobile" style="">
    <button class="btn-expand" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1"
        aria-expanded="false" aria-controls="flush-collapseOne">
        <i class="bi bi-border-width"></i>
    </button>
    <div style="width: 100vw; margin-left: -15px;" id="flush-collapseOne1" class="accordion-collapse collapse"
        data-bs-parent="#accordionFlushExample">
        <ul class="nav nav-pills flex-column mb-auto " style="">
            <li>
                <a href="{{ route('teacher.TE_dashboard') }}" class="nav-link link-body-emphasis">
                    <i class="bi bi-house-door"></i>
                    Tổng quan
                </a>
            </li>
            <li>
                <a href="{{ route('teacher.register_list') }}" class="nav-link link-body-emphasis">
                    <i class="bi bi-people-fill"></i>
                    Danh sách sinh viên đăng ký đồ án
                </a>
            </li>
            <li>
                <a href="{{ route('teacher.update') }}" class="nav-link link-body-emphasis">
                    <i class="fa-solid fa-list-check"></i>

                    Cập nhật đồ án
                </a>
            </li>
            <li>
                <a href="{{ route('teacher.calendar') }}" class="nav-link link-body-emphasis">
                    <i class="bi bi-calendar4-range"></i>
                    Lịch thống kê báo cáo
                </a>
            </li>
            <li>
                <a href="{{ route('teacher.teacherChat') }}" class="nav-link link-body-emphasis">
                    <i class="bi bi-chat-dots"></i>
                    Chat với sinh viên
                </a>
            </li>
            <li>
                <a href="{{ route('teacher.monitor_process') }}" class="nav-link link-body-emphasis">
                    <i class="bi bi-ui-radios"></i>
                    Theo dõi tiến trình
                </a>
            </li>
        </ul>
    </div>
</div>
