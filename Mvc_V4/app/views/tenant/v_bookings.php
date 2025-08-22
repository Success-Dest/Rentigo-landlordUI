<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="main-content">
    <div class="space-y-6">
        <div class="animate-fade-in">
            <h1 class="text-3xl font-bold text-foreground">My Bookings</h1>
            <p class="text-muted-foreground mt-2">View and manage your property bookings</p>
        </div>

        <!-- Current Bookings -->
        <div class="dashboard-card animate-slide-up">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Current Bookings</h3>
            </div>
            
            <div class="divide-y divide-border">
                <div class="p-6">
                    <div class="flex items-start justify-between">
                        <div class="flex items-start space-x-4">
                            <img src="/placeholder.svg?height=80&width=80" alt="Oak Street Apartment" class="w-20 h-20 object-cover rounded-lg">
                            <div>
                                <h4 class="font-semibold text-foreground">Oak Street Apartment</h4>
                                <p class="text-sm text-muted-foreground">Downtown</p>
                                <p class="text-lg font-bold text-primary mt-1">$1200/mo</p>
                                <div class="flex items-center space-x-4 mt-2">
                                    <span class="text-sm text-muted-foreground">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4h3a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2V9a2 2 0 012-2h3z"></path>
                                        </svg>
                                        Jan 1, 2024 - Dec 31, 2024
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col items-end space-y-2">
                            <span class="status-badge bg-success-light text-success">Active</span>
                            <button class="btn-secondary text-sm">View Details</button>
                        </div>
                    </div>
                    
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="p-3 bg-secondary rounded-lg text-center">
                            <p class="text-sm text-muted-foreground">Days Remaining</p>
                            <p class="text-xl font-bold text-foreground">334</p>
                        </div>
                        <div class="p-3 bg-secondary rounded-lg text-center">
                            <p class="text-sm text-muted-foreground">Next Payment</p>
                            <p class="text-xl font-bold text-foreground">Feb 1</p>
                        </div>
                        <div class="p-3 bg-secondary rounded-lg text-center">
                            <p class="text-sm text-muted-foreground">Total Paid</p>
                            <p class="text-xl font-bold text-foreground">$1200</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Booking History -->
        <div class="dashboard-card animate-scale-in">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Booking History</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-muted">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Property</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Location</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Duration</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Monthly Rent</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        <tr class="hover:bg-sidebar-hover">
                            <td class="px-6 py-4 text-sm font-medium text-foreground">Oak Street Apartment</td>
                            <td class="px-6 py-4 text-sm text-foreground">Downtown</td>
                            <td class="px-6 py-4 text-sm text-foreground">Jan 2024 - Dec 2024</td>
                            <td class="px-6 py-4 text-sm font-medium text-foreground">$1200</td>
                            <td class="px-6 py-4"><span class="status-badge bg-success-light text-success">Active</span></td>
                            <td class="px-6 py-4">
                                <button class="btn-secondary text-sm">View</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-sidebar-hover">
                            <td class="px-6 py-4 text-sm font-medium text-foreground">Maple Avenue Studio</td>
                            <td class="px-6 py-4 text-sm text-foreground">Midtown</td>
                            <td class="px-6 py-4 text-sm text-foreground">Jun 2023 - Nov 2023</td>
                            <td class="px-6 py-4 text-sm font-medium text-foreground">$800</td>
                            <td class="px-6 py-4"><span class="status-badge bg-muted text-muted-foreground">Completed</span></td>
                            <td class="px-6 py-4">
                                <button class="btn-secondary text-sm">View</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-sidebar-hover">
                            <td class="px-6 py-4 text-sm font-medium text-foreground">Elm Street Apartment</td>
                            <td class="px-6 py-4 text-sm text-foreground">Downtown</td>
                            <td class="px-6 py-4 text-sm text-foreground">Jan 2023 - Dec 2023</td>
                            <td class="px-6 py-4 text-sm font-medium text-foreground">$1100</td>
                            <td class="px-6 py-4"><span class="status-badge bg-muted text-muted-foreground">Completed</span></td>
                            <td class="px-6 py-4">
                                <button class="btn-secondary text-sm">View</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="dashboard-card animate-fade-in">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Quick Actions</h3>
            </div>
            
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="<?php echo URLROOT; ?>/tenant/search_properties" class="action-card">
                        <div class="p-4 bg-primary-light rounded-lg mb-3">
                            <svg class="w-8 h-8 text-primary mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-foreground text-center">Search Properties</h4>
                        <p class="text-sm text-muted-foreground text-center mt-1">Find new rental properties</p>
                    </a>
                    
                    <a href="<?php echo URLROOT; ?>/tenant/pay_rent" class="action-card">
                        <div class="p-4 bg-primary-light rounded-lg mb-3">
                            <svg class="w-8 h-8 text-primary mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-foreground text-center">Pay Rent</h4>
                        <p class="text-sm text-muted-foreground text-center mt-1">Make rent payments</p>
                    </a>
                    
                    <a href="<?php echo URLROOT; ?>/tenant/report_issue" class="action-card">
                        <div class="p-4 bg-primary-light rounded-lg mb-3">
                            <svg class="w-8 h-8 text-primary mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                            </svg>
                        </div>
                        <h4 class="font-semibold text-foreground text-center">Report Issue</h4>
                        <p class="text-sm text-muted-foreground text-center mt-1">Report maintenance issues</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>
