<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="main-content">
    <div class="space-y-6">
        <div class="animate-fade-in">
            <h1 class="text-3xl font-bold text-foreground">Notifications</h1>
            <p class="text-muted-foreground mt-2">Stay updated with your property activities</p>
        </div>

        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.868 19.718l8.485-8.485a2 2 0 112.828 2.828l-8.485 8.485a2 2 0 01-2.828-2.828z"></path>
                </svg>
                <span class="text-sm text-muted-foreground">
                    <?php 
                    $unreadCount = 0;
                    foreach($notifications as $notification) {
                        if (!$notification['read']) $unreadCount++;
                    }
                    echo $unreadCount;
                    ?> unread notifications
                </span>
            </div>
            <button onclick="markAllAsRead()" class="btn-secondary text-sm">Mark all as read</button>
        </div>

        <div class="space-y-3 animate-slide-up">
            <?php foreach($notifications as $notification): ?>
            <div class="dashboard-card p-4 border-l-4 <?php 
                echo $notification['type'] === 'warning' ? 'bg-warning-light border-warning' : 
                    ($notification['type'] === 'success' ? 'bg-success-light border-success' : 'bg-info-light border-info');
            ?> <?php echo !$notification['read'] ? 'shadow-hover' : ''; ?>" data-notification-id="<?php echo $notification['id']; ?>">
                <div class="flex items-start space-x-4">
                    <div class="p-2 rounded-lg <?php 
                        echo $notification['type'] === 'warning' ? 'bg-warning-light' : 
                            ($notification['type'] === 'success' ? 'bg-success-light' : 'bg-info-light');
                    ?>">
                        <?php if($notification['type'] === 'warning'): ?>
                            <svg class="w-5 h-5 text-warning" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        <?php elseif($notification['type'] === 'success'): ?>
                            <svg class="w-5 h-5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        <?php else: ?>
                            <svg class="w-5 h-5 text-info" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        <?php endif; ?>
                    </div>
                    
                    <div class="flex-1">
                        <div class="flex items-start justify-between">
                            <div>
                                <h4 class="font-semibold <?php echo !$notification['read'] ? 'text-foreground' : 'text-muted-foreground'; ?>">
                                    <?php echo $notification['title']; ?>
                                </h4>
                                <p class="text-sm text-muted-foreground mt-1">
                                    <?php echo $notification['message']; ?>
                                </p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-muted-foreground">
                                    <?php echo $notification['time']; ?>
                                </span>
                                <?php if(!$notification['read']): ?>
                                    <div class="w-2 h-2 bg-primary rounded-full"></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if(empty($notifications)): ?>
        <div class="dashboard-card p-12 text-center">
            <svg class="w-12 h-12 text-muted-foreground mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM4.868 19.718l8.485-8.485a2 2 0 112.828 2.828l-8.485 8.485a2 2 0 01-2.828-2.828z"></path>
            </svg>
            <h3 class="text-lg font-semibold text-foreground mb-2">No notifications</h3>
            <p class="text-muted-foreground">You're all caught up! New notifications will appear here.</p>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
function markAllAsRead() {
    const notifications = document.querySelectorAll('[data-notification-id]');
    notifications.forEach(notification => {
        // Remove unread styling
        notification.classList.remove('shadow-hover');
        
        // Update text color
        const title = notification.querySelector('h4');
        if (title) {
            title.classList.remove('text-foreground');
            title.classList.add('text-muted-foreground');
        }
        
        // Remove unread indicator
        const indicator = notification.querySelector('.w-2.h-2.bg-primary');
        if (indicator) {
            indicator.remove();
        }
    });
    
    // Update unread count
    const unreadCount = document.querySelector('.text-sm.text-muted-foreground');
    if (unreadCount) {
        unreadCount.textContent = '0 unread notifications';
    }
}
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>
