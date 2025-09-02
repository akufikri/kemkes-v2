<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard"><i class="fa fa-home"></i> <span>Beranda</span></a>
            </li>
            <li class="{{ request()->is('dashboard/type/document*') ? 'active' : '' }}">
                <a href="/dashboard/type/document"><i class="fa fa-file-text"></i> <span>Tipe dokumen</span></a>
            </li>
            <li class="{{ request()->is('dashboard/biodata*') ? 'active' : '' }}">
                <a href="/dashboard/biodata"><i class="fa fa-id-card"></i> <span>Biodata</span></a>
            </li>
            <li class="{{ request()->is('dashboard/certificate*') ? 'active' : '' }}">
                <a href="/dashboard/certificate"><i class="fa fa-shield"></i> <span>Sertifikat Vaksin</span></a>
            </li>
        </ul>
    </section>
</aside>
