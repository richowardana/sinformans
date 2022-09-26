<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ Request()->is('/') ? '' : 'collapsed' }}" href="/">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-heading">Kependudukan</li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('keluarga*') || Request::is('penduduk*') || Request::is('anggotaKeluarga*') ? '' : 'collapsed' }} "
                data-bs-target="#kependudukan" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i>
                <span>Data Kependudukan</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="kependudukan"
                class="nav-content {{ Request::is('keluarga*') || Request::is('penduduk*') || Request::is('anggotaKeluarga*') ? '' : 'collapse' }}"
                data-bs-parent="#kependudukan">
                <li>
                    <a href="/penduduk" class="{{ Request::is('penduduk*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Data Penduduk</span>
                    </a>
                </li>
                <li>
                    <a href="/keluarga"
                        class="{{ Request::is('keluarga*') || Request::is('anggotaKeluarga*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Data Keluarga</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('bantuan*') ? '' : 'collapsed' }}" data-bs-target="#bantuanSosial"
                data-bs-toggle="collapse" href="#">
                <i class="bi bi-journal-text"></i>
                <span>Bantuan</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="bantuanSosial" class="nav-content {{ Request::is('bantuan*') ? '' : 'collapse' }} "
                data-bs-parent="#bantuanSosial">
                <li>
                    <a href="/detailbantuan">
                        <i class="bi bi-circle"></i>
                        <span>Penerima Per-keluarga</span>
                    </a>
                </li>
                <li>
                    <a href="/penerimaBantuan">
                        <i class="bi bi-circle"></i>
                        <span>Penerima Per-Individu</span>
                    </a>
                </li>
                <li>
                    <a href="/bantuan" class="{{ Request::is('bantuan*') ? 'active' : '' }}">
                        <i class="bi bi-circle"></i>
                        <span>Jenis Bantuan</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-heading">Kependudukan</li>
    </ul>
</aside>