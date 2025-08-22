<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="main-content">
    <div class="space-y-6">
        <div class="animate-fade-in">
            <h1 class="text-3xl font-bold text-foreground">Track Issue Status</h1>
            <p class="text-muted-foreground mt-2">Monitor the progress of your reported issues</p>
        </div>

        <div class="dashboard-card animate-slide-up">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Your Issues</h3>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-muted">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Issue ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Property</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Category</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Priority</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Status</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Report Date</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-foreground">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-border">
                        <?php foreach($issues as $issue): ?>
                        <tr class="hover:bg-sidebar-hover">
                            <td class="px-6 py-4 text-sm font-medium text-foreground"><?php echo $issue['id']; ?></td>
                            <td class="px-6 py-4 text-sm text-foreground">Oak Street Apartment</td>
                            <td class="px-6 py-4 text-sm text-foreground"><?php echo $issue['title']; ?></td>
                            <td class="px-6 py-4">
                                <?php if($issue['priority'] === 'high'): ?>
                                    <span class="status-badge bg-destructive text-destructive-foreground">High</span>
                                <?php elseif($issue['priority'] === 'medium'): ?>
                                    <span class="status-badge bg-warning-light text-warning">Medium</span>
                                <?php else: ?>
                                    <span class="status-badge bg-success-light text-success">Low</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php if($issue['status'] === 'in_progress'): ?>
                                    <span class="status-badge bg-info-light text-info">In Progress</span>
                                <?php elseif($issue['status'] === 'resolved'): ?>
                                    <span class="status-badge bg-success-light text-success">Resolved</span>
                                <?php else: ?>
                                    <span class="status-badge bg-warning-light text-warning">Pending</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-foreground"><?php echo date('F j, Y', strtotime($issue['created_at'])); ?></td>
                            <td class="px-6 py-4">
                                <button onclick="viewIssue('<?php echo $issue['id']; ?>', '<?php echo $issue['title']; ?>', '<?php echo $issue['status']; ?>', '<?php echo $issue['priority']; ?>', '<?php echo $issue['description']; ?>', '<?php echo $issue['created_at']; ?>')" class="btn-secondary text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Issue Details Modal -->
<div id="issueModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-modal max-w-2xl w-full mx-4 max-h-[80vh] overflow-y-auto animate-scale-in">
        <div class="flex items-center justify-between p-6 border-b border-border">
            <h3 class="text-lg font-semibold text-foreground">Issue Details</h3>
            <button onclick="closeIssueModal()" class="p-2 hover:bg-sidebar-hover rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="p-6 space-y-4" id="modalContent">
            <!-- Content will be populated by JavaScript -->
        </div>
    </div>
</div>

<script>
function viewIssue(id, title, status, priority, description, createdAt) {
    const modalContent = document.getElementById('modalContent');
    
    const priorityBadge = priority === 'high' ? 
        '<span class="status-badge bg-destructive text-destructive-foreground">High</span>' :
        priority === 'medium' ? 
        '<span class="status-badge bg-warning-light text-warning">Medium</span>' :
        '<span class="status-badge bg-success-light text-success">Low</span>';
    
    const statusBadge = status === 'in_progress' ? 
        '<span class="status-badge bg-info-light text-info">In Progress</span>' :
        status === 'resolved' ? 
        '<span class="status-badge bg-success-light text-success">Resolved</span>' :
        '<span class="status-badge bg-warning-light text-warning">Pending</span>';
    
    modalContent.innerHTML = `
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-foreground">Issue ID</label>
                <p class="text-sm text-muted-foreground">${id}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground">Property</label>
                <p class="text-sm text-muted-foreground">Oak Street Apartment</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground">Category</label>
                <p class="text-sm text-muted-foreground">${title}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground">Priority</label>
                <div class="mt-1">${priorityBadge}</div>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground">Status</label>
                <div class="mt-1">${statusBadge}</div>
            </div>
            <div>
                <label class="block text-sm font-medium text-foreground">Report Date</label>
                <p class="text-sm text-muted-foreground">${new Date(createdAt).toLocaleDateString()}</p>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-foreground">Description</label>
            <p class="text-sm text-muted-foreground mt-1">${description}</p>
        </div>

        <div>
            <label class="block text-sm font-medium text-foreground mb-3">Progress Timeline</label>
            <div class="space-y-3">
                <div class="flex items-start space-x-3">
                    <div class="w-2 h-2 rounded-full mt-2 bg-info"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-foreground">Issue reported by tenant</p>
                        <p class="text-xs text-muted-foreground">${new Date(createdAt).toLocaleDateString()}</p>
                    </div>
                </div>
                ${status !== 'pending' ? `
                <div class="flex items-start space-x-3">
                    <div class="w-2 h-2 rounded-full mt-2 bg-success"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-foreground">Maintenance team assigned</p>
                        <p class="text-xs text-muted-foreground">${new Date(createdAt).toLocaleDateString()}</p>
                    </div>
                </div>
                ` : ''}
                ${status === 'resolved' ? `
                <div class="flex items-start space-x-3">
                    <div class="w-2 h-2 rounded-full mt-2 bg-success"></div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-foreground">Issue resolved</p>
                        <p class="text-xs text-muted-foreground">${new Date(createdAt).toLocaleDateString()}</p>
                    </div>
                </div>
                ` : ''}
            </div>
        </div>
    `;
    
    document.getElementById('issueModal').classList.remove('hidden');
}

function closeIssueModal() {
    document.getElementById('issueModal').classList.add('hidden');
}
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>
