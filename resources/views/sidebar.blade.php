<li class="header" style="font-weight:bold;">MENU UTAMA</li>
<li class="{{ set_active('dashboard') }}">
    <a href="{{ route('dashboard') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
    </a>
</li>

{{--  <li class="{{ set_active('roles') }}">
    <a href="{{ route('roles') }}">
        <i class="fa fa-lock"></i> <span>Manajemen Akses</span>
    </a>
</li>  --}}
<li class="{{ set_active('mitras') }}">
    <a href="{{ route('mitras') }}">
        <i class="fa fa-user"></i> <span>Semua Mitra</span>
    </a>
</li>
<li class="{{ set_active('layanans') }}">
    <a href="{{ route('layanans') }}">
        <i class="fa fa-stethoscope"></i> <span>Manajemen Layanan</span>
    </a>
</li>

<li class="{{ set_active(['jadwals','jadwals.edit','jadwals.create']) }}">
    <a href="{{ route('jadwals') }}">
        <i class="fa fa-clock-o"></i> <span>Jadwal Pelayanan</span>
    </a>
</li>
<li class="{{ set_active('alurlayanans') }}">
    <a href="{{ route('alurlayanans') }}">
        <i class="fa fa-stethoscope"></i> <span> Alur Layanan</span>
    </a>
</li>
<li class="{{ set_active('syaratpendaftarans') }}">
    <a href="{{ route('syaratpendaftarans') }}">
        <i class="fa fa-stethoscope"></i> <span> Syarat Pendaftaran</span>
    </a>
</li>

<li class="">
    <a href="">
        <i class="fa fa-user"></i> <span>Profil Saya</span>
    </a>
</li>

<li style="padding-left:2px;">
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off text-danger"></i><span>Logout</span>
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

</li>
