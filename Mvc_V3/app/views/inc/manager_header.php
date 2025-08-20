<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'] ?? 'Rentigo Manager'; ?></title>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/manager.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/components.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <i class="fas fa-building"></i>
                    <span class="logo-text">Rentigo Manager</span>
                </div>
                <button class="sidebar-toggle" id="sidebarToggle" title="Toggle Sidebar">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <nav class="sidebar-nav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/manager"
                            class="nav-link <?php echo ($data['page'] ?? '') === 'dashboard' ? 'active' : ''; ?>"
                            data-tooltip="Dashboard">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/manager/properties"
                            class="nav-link <?php echo ($data['page'] ?? '') === 'properties' ? 'active' : ''; ?>"
                            data-tooltip="Properties">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">Properties</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/manager/tenants"
                            class="nav-link <?php echo ($data['page'] ?? '') === 'tenants' ? 'active' : ''; ?>"
                            data-tooltip="Tenants">
                            <i class="fas fa-users"></i>
                            <span class="nav-text">Tenants</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/manager/maintenance"
                            class="nav-link <?php echo ($data['page'] ?? '') === 'maintenance' ? 'active' : ''; ?>"
                            data-tooltip="Maintenance">
                            <i class="fas fa-tools"></i>
                            <span class="nav-text">Maintenance</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/manager/inspections"
                            class="nav-link <?php echo ($data['page'] ?? '') === 'inspections' ? 'active' : ''; ?>"
                            data-tooltip="Inspections">
                            <i class="fas fa-clipboard-check"></i>
                            <span class="nav-text">Inspections</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/manager/issues"
                            class="nav-link <?php echo ($data['page'] ?? '') === 'issues' ? 'active' : ''; ?>"
                            data-tooltip="Issues">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span class="nav-text">Issues</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/manager/leases"
                            class="nav-link <?php echo ($data['page'] ?? '') === 'leases' ? 'active' : ''; ?>"
                            data-tooltip="Lease Agreements">
                            <i class="fas fa-file-contract"></i>
                            <span class="nav-text">Lease Agreements</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo URLROOT; ?>/manager/providers"
                            class="nav-link <?php echo ($data['page'] ?? '') === 'providers' ? 'active' : ''; ?>"
                            data-tooltip="Service Providers">
                            <i class="fas fa-handshake"></i>
                            <span class="nav-text">Service Providers</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="main-header">
                <div class="header-left">
                    <button class="mobile-menu-toggle" id="mobileMenuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <!-- Added search functionality from React Header component -->
                    <div class="header-search">
                        <div class="search-container">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" class="search-input" placeholder="Search properties, tenants..." id="globalSearch">
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <!-- Added notifications and language selector from React Header -->
                    <div class="header-actions">
                        <!-- Language Selector -->
                        <div class="language-selector">
                            <button class="language-toggle" id="languageToggle">
                                <i class="fas fa-globe"></i>
                                <span>EN</span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                            <div class="language-dropdown" id="languageDropdown">
                                <a href="#" class="dropdown-item">English</a>
                                <a href="#" class="dropdown-item">Español</a>
                                <a href="#" class="dropdown-item">Français</a>
                            </div>
                        </div>

                        <!-- Notifications -->
                        <button class="notification-btn" id="notificationBtn">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                        </button>
                    </div>

                    <div class="user-menu">
                        <button class="user-menu-toggle" id="userMenuToggle">
                            <div class="user-avatar">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="user-info">
                                <span class="user-name"><?php echo $data['user_name'] ?? 'Manager'; ?></span>
                                <span class="user-role">Property Manager</span>
                            </div>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="user-dropdown" id="userDropdown">
                            <div class="dropdown-header">My Account</div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user"></i> Profile Settings
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-credit-card"></i> Billing
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users"></i> Team
                            </a>
                            <hr class="dropdown-divider">
                            <a href="<?php echo URLROOT; ?>/users/logout" class="dropdown-item logout">
                                <i class="fas fa-sign-out-alt"></i> Log out
                            </a>
                        </div>
                    </div>
                </div>
            </header>
        </main>
    </div>
</body>

</html>
