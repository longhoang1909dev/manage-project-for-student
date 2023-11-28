<div class="sidebar">
    <ul class="nav nav-pills flex-column mb-auto" style="padding-top: 50px;">
        <li>
            <a href="{{ route('student.dashboard') }}" class="nav-link link-body-emphasis">
                <i class="bi bi-house-door"></i>
                Trang chủ
            </a>
        </li>
        <li>
            <a href="{{ route('student.groupSV') }}" class="nav-link link-body-emphasis">
                <i class="bi bi-people-fill"></i>
                Nhóm của bạn
            </a>
        </li>
        <li>
            <a href="{{ route('student.register') }}" class="nav-link link-body-emphasis">
                <i class="fa-solid fa-list-check"></i>
                Đăng ký đồ án
            </a>
        </li>
        <li>
            <a href="{{ route('student.calendar') }}" class="nav-link link-body-emphasis">
                <i class="bi bi-calendar4-range"></i>
                Lịch thống kê báo cáo
            </a>
        </li>
        <li>
            <a href="{{ route('student.contact') }}" class="nav-link link-body-emphasis">
                <i class="bi bi-chat-dots"></i>
                Liên hệ với giảng viên
            </a>
        </li>
    </ul>
</div>

<div class="sidebar_mobile" id="sidebar_mobile" style="">
    <button class="btn-expand" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1"
        aria-expanded="false" aria-controls="flush-collapseOne">
        <i class="bi bi-border-width"></i>
    </button>
    <div style="width: 100vw; margin-left: -15px;" id="flush-collapseOne1" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
        <ul class="nav nav-pills flex-column mb-auto" style="">
            <li>
                <a href="{{ route('student.dashboard') }}" class="nav-link link-body-emphasis">
                    <i class="bi bi-house-door"></i>
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="{{ route('student.groupSV') }}" class="nav-link link-body-emphasis">
                    <i class="bi bi-people-fill"></i>
                    Nhóm của bạn
                </a>
            </li>
            <li>
                <a href="{{ route('student.register') }}" class="nav-link link-body-emphasis">
                    <i class="fa-solid fa-list-check"></i>
                    Đăng ký đồ án
                </a>
            </li>
            <li>
                <a href="{{ route('student.calendar') }}" class="nav-link link-body-emphasis">
                    <i class="bi bi-calendar4-range"></i>
                    Lịch thống kê báo cáo
                </a>
            </li>
            <li>
                <a href="{{ route('student.contact') }}" class="nav-link link-body-emphasis">
                    <i class="bi bi-chat-dots"></i>
                    Liên hệ với giảng viên
                </a>
            </li>
        </ul>
    </div>
</div>
