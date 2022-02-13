<ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('dashboard*') ? 'active fw-bold' : null }}" aria-current="page" href="{{ route('dashboard') }}">
            Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('data-kk*') ? 'active fw-bold' : null }}" href="{{ route('datakk') }}">
            Data KK
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('data-verifikasi*') ? 'active fw-bold' : null }}" href="{{ route('dataverifikasi') }}">
            Data KK Terverifikasi
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('data-rtlh*') ? 'active fw-bold' : null }}" href="{{ route('datartlh') }}">
            Data RTLH
        </a>
    </li>
</ul>