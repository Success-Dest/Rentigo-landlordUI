<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="dashboard-content">
    <!-- Welcome Section -->
    <div class="welcome-section animate-fade-in">
        <h1 class="welcome-title">Welcome back, <?php echo $data['user_name']; ?>!</h1>
        <p class="welcome-subtitle">Here's what's happening with your properties today.</p>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid animate-slide-up">
        <div class="stats-card">
            <div class="stats-card-content">
                <div>
                    <p class="stats-label">Active Bookings</p>
                    <p class="stats-value">2</p>
                </div>
                <div class="stats-icon bg-primary">
                    <i class="fas fa-calendar"></i>
                </div>
            </div>
        </div>
        
        <div class="stats-card">
            <div class="stats-card-content">
                <div>
                    <p class="stats-label">Rent Due</p>
                    <p class="stats-value">$1,200</p>
                </div>
                <div class="stats-icon bg-warning">
                    <i class="fas fa-credit-card"></i>
                </div>
            </div>
        </div>
        
        <div class="stats-card">
            <div class="stats-card-content">
                <div>
                    <p class="stats-label">Reported Issues</p>
                    <p class="stats-value">1</p>
                </div>
                <div class="stats-icon bg-destructive">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
            </div>
        </div>
        
        <div class="stats-card">
            <div class="stats-card-content">
                <div>
                    <p class="stats-label">Total Reviews</p>
                    <p class="stats-value">8</p>
                </div>
                <div class="stats-icon bg-success">
                    <i class="fas fa-star"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-grid">
        <!-- Recent Notifications -->
        <div class="dashboard-card animate-scale-in">
            <div class="card-header">
                <h3 class="card-title">Recent Notifications</h3>
                <a href="<?php echo URLROOT; ?>/tenant/notifications" class="view-all-link">View all</a>
            </div>
            <div class="notifications-list">
                <div class="notification-item">
                    <div class="notification-indicator bg-warning"></div>
                    <div>
                        <p class="notification-title">Rent Payment Due</p>
                        <p class="notification-message">Your rent payment for Oak Street Apartment is due in 3 days</p>
                        <p class="notification-time">2 hours ago</p>
                    </div>
                </div>
                
                <div class="notification-item">
                    <div class="notification-indicator bg-success"></div>
                    <div>
                        <p class="notification-title">Issue Update</p>
                        <p class="notification-message">Your maintenance request for broken faucet has been resolved</p>
                        <p class="notification-time">1 day ago</p>
                    </div>
                </div>
                
                <div class="notification-item">
                    <div class="notification-indicator bg-info"></div>
                    <div>
                        <p class="notification-title">Booking Confirmed</p>
                        <p class="notification-message">Your reservation for Maple Avenue Studio has been confirmed</p>
                        <p class="notification-time">2 days ago</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="dashboard-card animate-scale-in">
            <div class="card-header">
                <h3 class="card-title">Quick Actions</h3>
            </div>
            <div class="quick-actions-grid">
                <a href="<?php echo URLROOT; ?>/tenant/search" class="quick-action-item">
                    <div class="quick-action-icon bg-primary">
                        <i class="fas fa-search"></i>
                    </div>
                    <span class="quick-action-text">Search Properties</span>
                </a>
                
                <a href="<?php echo URLROOT; ?>/tenant/pay_rent" class="quick-action-item">
                    <div class="quick-action-icon bg-success">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <span class="quick-action-text">Pay Rent</span>
                </a>
                
                <a href="<?php echo URLROOT; ?>/tenant/report_issue" class="quick-action-item">
                    <div class="quick-action-icon bg-destructive">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <span class="quick-action-text">Report Issue</span>
                </a>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>
