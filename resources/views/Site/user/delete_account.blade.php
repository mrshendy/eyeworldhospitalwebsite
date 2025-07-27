@extends('site')

@section('content')
   <main id="main">
    <!-- Confirm Delete Section -->
    <article class="thankyou pdt">
        <div class="thankyou-box text-center">
            <img src="{{ asset('siteassets/images/settings/delete.gif') }}" alt="Delete" width="250" height="250" class="mb-3">
            <h3 class="mb-2">هل انت متأكد من حذف حسابك؟</h3>
            <p class="mb-4 text-muted">بحذف حسابك سوف تخسر تاريخ الحجوزات الخاص بك معنا فهل انت متأكد من ذلك؟!</p>

            <div class="d-flex flex-column gap-3">
                <a href="{{ route('Site.user.settings') }}" class="btn btn-outline-secondary w-100">عودة</a>

                <form method="POST" action="{{ route('Site.user.settings.delete') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100 delete_account">حذف الحساب</button>
                </form>
            </div>
        </div>
    </article>
</main>


@endsection
