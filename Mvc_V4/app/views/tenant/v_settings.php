<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="main-content">
    <div class="space-y-6">
        <div class="animate-fade-in">
            <h1 class="text-3xl font-bold text-foreground">Settings</h1>
            <p class="text-muted-foreground mt-2">Manage your account preferences and settings</p>
        </div>

        <!-- Profile Settings -->
        <div class="dashboard-card animate-slide-up">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Profile Information</h3>
            </div>
            
            <form class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-1">First Name</label>
                        <input type="text" value="<?php echo $_SESSION['user_name'] ?? 'John'; ?>" class="form-input">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-1">Last Name</label>
                        <input type="text" value="Doe" class="form-input">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-1">Email</label>
                        <input type="email" value="john.doe@example.com" class="form-input">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-foreground mb-1">Phone</label>
                        <input type="tel" value="+1 (555) 123-4567" class="form-input">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-foreground mb-1">Address</label>
                    <textarea class="form-input min-h-20" placeholder="Enter your current address">123 Main Street, City, State 12345</textarea>
                </div>

                <button type="submit" class="btn-primary">Update Profile</button>
            </form>
        </div>

        <!-- Notification Preferences -->
        <div class="dashboard-card animate-scale-in">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Notification Preferences</h3>
            </div>
            
            <div class="p-6 space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-medium text-foreground">Email Notifications</h4>
                        <p class="text-sm text-muted-foreground">Receive notifications via email</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-medium text-foreground">SMS Notifications</h4>
                        <p class="text-sm text-muted-foreground">Receive notifications via SMS</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-medium text-foreground">Rent Payment Reminders</h4>
                        <p class="text-sm text-muted-foreground">Get reminded before rent is due</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-medium text-foreground">Maintenance Updates</h4>
                        <p class="text-sm text-muted-foreground">Updates on maintenance requests</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-medium text-foreground">Property Recommendations</h4>
                        <p class="text-sm text-muted-foreground">Receive new property suggestions</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <button class="btn-primary">Save Preferences</button>
            </div>
        </div>

        <!-- Security Settings -->
        <div class="dashboard-card animate-fade-in">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Security Settings</h3>
            </div>
            
            <div class="p-6 space-y-6">
                <div>
                    <h4 class="font-medium text-foreground mb-4">Change Password</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Current Password</label>
                            <input type="password" class="form-input">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">New Password</label>
                            <input type="password" class="form-input">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-foreground mb-1">Confirm New Password</label>
                            <input type="password" class="form-input">
                        </div>
                        <button class="btn-primary">Update Password</button>
                    </div>
                </div>

                <div class="border-t border-border pt-6">
                    <h4 class="font-medium text-foreground mb-4">Two-Factor Authentication</h4>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-foreground">Add an extra layer of security to your account</p>
                            <p class="text-sm text-muted-foreground">Status: Not enabled</p>
                        </div>
                        <button class="btn-secondary">Enable 2FA</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Actions -->
        <div class="dashboard-card animate-slide-up">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Account Actions</h3>
            </div>
            
            <div class="p-6 space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-medium text-foreground">Download Account Data</h4>
                        <p class="text-sm text-muted-foreground">Download a copy of your account information</p>
                    </div>
                    <button class="btn-secondary">Download</button>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-medium text-foreground">Deactivate Account</h4>
                        <p class="text-sm text-muted-foreground">Temporarily disable your account</p>
                    </div>
                    <button class="btn-secondary text-warning">Deactivate</button>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <h4 class="font-medium text-destructive">Delete Account</h4>
                        <p class="text-sm text-muted-foreground">Permanently delete your account and all data</p>
                    </div>
                    <button class="bg-destructive text-destructive-foreground hover:bg-destructive/90 px-4 py-2 rounded-lg font-medium transition-colors">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.toggle-switch {
    position: relative;
    display: inline-block;
    width: 48px;
    height: 24px;
}

.toggle-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.toggle-slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: hsl(var(--muted));
    transition: .4s;
    border-radius: 24px;
}

.toggle-slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 18px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}

input:checked + .toggle-slider {
    background-color: hsl(var(--primary));
}

input:checked + .toggle-slider:before {
    transform: translateX(24px);
}
</style>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>
