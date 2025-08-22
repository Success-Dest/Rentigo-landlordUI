<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Notifications</h2>
            <p>Stay updated with your property activities</p>
        </div>
        <div class="header-actions">
            <button class="btn btn-secondary" onclick="markAllAsRead()">Mark all as read</button>
        </div>
    </div>

    <!-- Notifications Stats -->
    <div class="notification-stats">
        <div class="stat-item">
            <i class="fas fa-bell"></i>
            <span>3 unread notifications</span>
        </div>
    </div>

    <!-- Notifications List -->
    <div class="notifications-section">
        <!-- Unread Notifications -->
        <div class="notification-card unread" data-notification-id="1">
            <div class="notification-indicator warning">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="notification-content">
                <div class="notification-header">
                    <h4 class="notification-title">Rent Payment Reminder</h4>
                    <div class="notification-meta">
                        <span class="notification-time">2 hours ago</span>
                        <div class="unread-indicator"></div>
                    </div>
                </div>
                <p class="notification-message">Your rent payment for Oak Street Apartment is due in 3 days</p>
            </div>
        </div>

        <div class="notification-card unread" data-notification-id="2">
            <div class="notification-indicator success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="notification-content">
                <div class="notification-header">
                    <h4 class="notification-title">Maintenance Update</h4>
                    <div class="notification-meta">
                        <span class="notification-time">1 day ago</span>
                        <div class="unread-indicator"></div>
                    </div>
                </div>
                <p class="notification-message">Your maintenance request for broken faucet has been approved and scheduled for tomorrow</p>
            </div>
        </div>

        <div class="notification-card unread" data-notification-id="3">
            <div class="notification-indicator info">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="notification-content">
                <div class="notification-header">
                    <h4 class="notification-title">New Property Available</h4>
                    <div class="notification-meta">
                        <span class="notification-time">2 days ago</span>
                        <div class="unread-indicator"></div>
                    </div>
                </div>
                <p class="notification-message">A new property matching your preferences is now available in Downtown area</p>
            </div>
        </div>

        <!-- Read Notifications -->
        <div class="notification-card" data-notification-id="4">
            <div class="notification-indicator success">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="notification-content">
                <div class="notification-header">
                    <h4 class="notification-title">Payment Confirmed</h4>
                    <div class="notification-meta">
                        <span class="notification-time">3 days ago</span>
                    </div>
                </div>
                <p class="notification-message">Your rent payment of $1,200 has been successfully processed</p>
            </div>
        </div>

        <div class="notification-card" data-notification-id="5">
            <div class="notification-indicator info">
                <i class="fas fa-file-contract"></i>
            </div>
            <div class="notification-content">
                <div class="notification-header">
                    <h4 class="notification-title">Lease Renewal Available</h4>
                    <div class="notification-meta">
                        <span class="notification-time">1 week ago</span>
                    </div>
                </div>
                <p class="notification-message">Your lease renewal documents are ready for review and signing</p>
            </div>
        </div>

        <div class="notification-card" data-notification-id="6">
            <div class="notification-indicator warning">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <div class="notification-content">
                <div class="notification-header">
                    <h4 class="notification-title">Scheduled Maintenance</h4>
                    <div class="notification-meta">
                        <span class="notification-time">2 weeks ago</span>
                    </div>
                </div>
                <p class="notification-message">Building maintenance scheduled for next Tuesday 9AM-12PM. Please ensure access to your unit</p>
            </div>
        </div>
    </div>

    <!-- Notification Settings -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Notification Preferences</h3>
        </div>

        <div class="notification-preferences">
            <div class="preference-item">
                <div class="preference-info">
                    <h4>Email Notifications</h4>
                    <p>Receive notifications via email</p>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <div class="preference-item">
                <div class="preference-info">
                    <h4>SMS Notifications</h4>
                    <p>Receive notifications via text message</p>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox">
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <div class="preference-item">
                <div class="preference-info">
                    <h4>Rent Payment Reminders</h4>
                    <p>Get reminded before rent is due</p>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <div class="preference-item">
                <div class="preference-info">
                    <h4>Maintenance Updates</h4>
                    <p>Updates on maintenance requests</p>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox" checked>
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <div class="preference-item">
                <div class="preference-info">
                    <h4>Property Recommendations</h4>
                    <p>Receive new property suggestions</p>
                </div>
                <label class="toggle-switch">
                    <input type="checkbox">
                    <span class="toggle-slider"></span>
                </label>
            </div>

            <button class="btn btn-primary mt-4">Save Preferences</button>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>