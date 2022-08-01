<ul class="nav nav-tabs justify-content-center">
    <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('dashboard*') ? 'active fw-bold' : null }}" aria-current="page"
            href="{{ route('dashboard') }}">
            Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('bobot*') ? 'active fw-bold' : null }}" href="{{ route('bobot') }}">
            Bobot Penilaian
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('data-kk*') ? 'active fw-bold' : null }}"
            href="{{ route('datakk') }}">
            Data KK
        </a>
    </li>
    @if (Auth::user()->level == 0)
        <li class="nav-item">
            <a class="nav-link text-dark {{ Request::is('data-rtlh*') ? 'active fw-bold' : null }}"
                href="{{ route('datartlh', ['tahun' => date('Y')]) }}">
                Data RTLH
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-dark {{ Request::is('administrator*') ? 'active fw-bold' : null }}"
                href="{{ route('administrator') }}">
                Administrator Daerah
            </a>
        </li>
    @else
    @endif
    <li class="nav-item">
        <a class="nav-link text-dark {{ Request::is('setting*') ? 'active fw-bold' : null }}"
            href="{{ route('setting') }}">
            Pengaturan
        </a>
    </li>
</ul>
