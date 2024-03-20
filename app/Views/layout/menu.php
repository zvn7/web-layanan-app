<?php $uri = service('uri'); ?>
<li class="menu-header">Main Menu</li>
<li class="<?= $uri->getSegment(1) == 'dashboard' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('dashboard') ?>">
        <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
    </a>
</li>
<li class="<?= $uri->getSegment(1) == 'app' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('app') ?>">
        <i class="fas fa-laptop-code"></i> <span>App</span>
    </a>
</li>
<li class="<?= $uri->getSegment(1) == 'developer' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('developer') ?>">
        <i class="fas fa-file-code"></i> <span>Developer</span>
    </a>
</li>
<li class="<?= $uri->getSegment(1) == 'developing' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('developing') ?>">
        <i class="fab fa-connectdevelop"></i> <span>Developing</span>
    </a>
</li>
<li class="<?= $uri->getSegment(1) == 'pemohon' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('pemohon') ?>">
        <i class="fas fa-user-tag"></i> <span>Pemohon</span>
    </a>
</li>
<li class="<?= $uri->getSegment(1) == 'permohonanapp' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('permohonanapp') ?>">
        <i class="far fa-folder-open"></i> <span>Permohonan App</span>
    </a>
</li>
<?php if (in_groups('admin')) : ?>
    <li class="nav-item dropdown <?= $uri->getSegment(1) == 'users' ? 'active' : '' ?> <?= $uri->getSegment(1) == 'groups' ? 'active' : '' ?>">
        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>User</span></a>
        <ul class="dropdown-menu">
            <li class="<?= $uri->getSegment(1) == 'users' ? 'active' : '' ?>"><a href="<?= site_url('users') ?>">User List</a></li>
            <li class="<?= $uri->getSegment(1) == 'groups' ? 'active' : '' ?>"><a href="<?= site_url('groups') ?>">Level User</a></li>
        </ul>
    </li>
<?php endif ?>
<li class="<?= $uri->getSegment(1) == 'profile' ? 'active' : '' ?>">
    <a class="nav-link" href="<?= site_url('profile') ?>">
        <i class="fas fa-id-card"></i> <span>Profile</span>
    </a>
</li>