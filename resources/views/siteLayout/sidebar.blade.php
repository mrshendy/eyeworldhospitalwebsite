<div class="col-2 col-md-6 col-sm-12">
    <div class="aside-tabs">
        <a href="{{ route('Site.user.settings') }}"  class="aside-tab flex-between align-center {{ active_class('Site.user.settings') }}">
            <div class="flex-1">
                <h3>بياناتى</h3>
            </div>
            <i class="fa-solid fa-chevron-left"></i>
        </a>

        @if (Auth::user()->type === "patient")
            <a href="{{ route('Site.user_reservations') }}" class="aside-tab flex-between align-center {{ active_class('Site.user_reservations') }}">
                <div class="flex-1">
                    <h3>الحجوزات</h3>
                </div>
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        @endif

        @if (Auth::user()->type === "doctor")
            <a href="{{ route('Site.doctor.conferences') }}" class="aside-tab flex-between align-center {{ active_class('Site.doctor.conferences') }}">
                <div class="flex-1">
                    <h3>{{ __('Conferences') }}</h3>
                </div>
                <i class="fa-solid fa-chevron-left"></i>
            </a>

            <a href="{{ route('Site.doctor.academy') }}" class="aside-tab flex-between align-center {{ active_class('Site.doctor.academy') }}">
                <div class="flex-1">
                    <h3>{{ __('Academy') }}</h3>
                </div>
                <i class="fa-solid fa-chevron-left"></i>
            </a>

            <a href="{{ route('Site.doctor.requests') }}" class="aside-tab flex-between align-center {{ active_class('Site.doctor.requests') }}">
                <div class="flex-1">
                    <h3>{{ __('Requests') }}</h3>
                </div>
                <i class="fa-solid fa-chevron-left"></i>
            </a>

            <a href="{{ route('Site.doctor.books') }}" class="aside-tab flex-between align-center {{ active_class('Site.doctor.books') }}">
                <div class="flex-1">
                    <h3>{{ __('My Books') }}</h3>
                </div>
                <i class="fa-solid fa-chevron-left"></i>
            </a>
        @endif

        <a href="{{ route('Site.resetpassword') }}" class="aside-tab flex-between align-center {{ active_class('Site.resetpassword') }}">
            <div class="flex-1">
                <h3>تغيير كلمة المرور</h3>
            </div>
            <i class="fa-solid fa-chevron-left"></i>
        </a>

        <a href="{{ route('Site.user.settings.delete_account') }}" class="aside-tab flex-between align-center {{ active_class('Site.user.settings.delete_account') }}">
            <div class="flex-1">
                <h3>حذف الحساب</h3>
            </div>
            <i class="fa-solid fa-chevron-left"></i>
        </a>

        <form id="logout-form" action="{{ route('Site.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <a href="#" class="aside-tab flex-between align-center"
        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <div class="flex-1">
                <h3>تسجيل الخروج</h3>
            </div>
            <i class="fa-solid fa-chevron-left"></i>
        </a>

    </div>
</div>
