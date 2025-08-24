<?php require APPROOT . '/views/inc/admin_header.php'; ?>

<div class="page-content">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h2>Service Providers</h2>
            <p>Manage and oversee service provider network</p>
        </div>
        <div class="header-actions">
            <button class="btn btn-primary" onclick="addProvider()">
                <i class="fas fa-plus"></i> Add Provider
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">3</h3>
                <p class="stat-label">Total Providers</p>
                <span class="stat-change">All registered</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">2</h3>
                <p class="stat-label">Active Providers</p>
                <span class="stat-change positive">Currently available</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-pause-circle"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">1</h3>
                <p class="stat-label">Inactive Providers</p>
                <span class="stat-change">Temporarily unavailable</span>
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="stat-info">
                <h3 class="stat-number">4.6</h3>
                <p class="stat-label">Average Rating</p>
                <span class="stat-change positive">Customer satisfaction</span>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section -->
    <div class="search-filter-section">
        <div class="search-filter-content">
            <div class="search-input-wrapper">
                <input type="text" class="form-input" placeholder="Search providers..." id="searchProviders">
            </div>
            <div class="filter-dropdown-wrapper">
                <select class="form-select" id="filterProviders">
                    <option value="">All Providers</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Service Provider Directory -->
    <div class="dashboard-section">
        <div class="section-header">
            <h3>Service Provider Directory (3)</h3>
        </div>

        <div class="table-container">
            <table class="data-table providers-table">
                <thead>
                    <tr>
                        <th>Provider</th>
                        <th>Category</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr data-status="active">
                        <td>
                            <div class="provider-info">
                                <div class="provider-icon">
                                    <i class="fas fa-wrench"></i>
                                </div>
                                <div class="provider-details">
                                    <div class="provider-name">Quick Fix Plumbing</div>
                                    <div class="provider-description">Professional plumbing services with 24/7 emergency support</div>
                                </div>
                            </div>
                        </td>
                        <td>Plumbing</td>
                        <td>+1 234 567 8901</td>
                        <td>contact@quickfixplumbing.com</td>
                        <td>
                            <div class="rating-display">
                                <i class="fas fa-star"></i>
                                <span>4.8</span>
                            </div>
                        </td>
                        <td><span class="status-badge active">Active</span></td>
                        <td>
                            <div class="provider-actions">
                                <button class="action-btn view-btn" onclick="editProvider('PRV001')" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn deactivate-btn" onclick="deactivateProvider('PRV001')" title="Deactivate">
                                    Deactivate
                                </button>
                                <button class="action-btn danger-btn" onclick="deleteProvider('PRV001')" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-status="inactive">
                        <td>
                            <div class="provider-info">
                                <div class="provider-icon">
                                    <i class="fas fa-bolt"></i>
                                </div>
                                <div class="provider-details">
                                    <div class="provider-name">Bright Electric Solutions</div>
                                    <div class="provider-description">Licensed electricians for residential and commercial properties</div>
                                </div>
                            </div>
                        </td>
                        <td>Electrical</td>
                        <td>+1 234 567 8902</td>
                        <td>info@brightelectric.com</td>
                        <td>
                            <div class="rating-display">
                                <i class="fas fa-star"></i>
                                <span>4.6</span>
                            </div>
                        </td>
                        <td><span class="status-badge inactive">Inactive</span></td>
                        <td>
                            <div class="provider-actions">
                                <button class="action-btn view-btn" onclick="editProvider('PRV002')" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn activate-btn" onclick="activateProvider('PRV002')" title="Activate">
                                    Activate
                                </button>
                                <button class="action-btn danger-btn" onclick="deleteProvider('PRV002')" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr data-status="active">
                        <td>
                            <div class="provider-info">
                                <div class="provider-icon">
                                    <i class="fas fa-hammer"></i>
                                </div>
                                <div class="provider-details">
                                    <div class="provider-name">HomeRepair Experts</div>
                                    <div class="provider-description">General maintenance and repair services</div>
                                </div>
                            </div>
                        </td>
                        <td>Maintenance</td>
                        <td>+1 234 567 8903</td>
                        <td>service@homerepair.com</td>
                        <td>
                            <div class="rating-display">
                                <i class="fas fa-star"></i>
                                <span>4.5</span>
                            </div>
                        </td>
                        <td><span class="status-badge active">Active</span></td>
                        <td>
                            <div class="provider-actions">
                                <button class="action-btn view-btn" onclick="editProvider('PRV003')" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="action-btn deactivate-btn" onclick="deactivateProvider('PRV003')" title="Deactivate">
                                    Deactivate
                                </button>
                                <button class="action-btn danger-btn" onclick="deleteProvider('PRV003')" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Provider Management Functions - Global scope for onclick handlers
    function addProvider() {
        showNotification('Add Provider functionality to be implemented', 'info')
        // Here you would open an add provider modal or navigate to add page
    }

    function editProvider(providerId) {
        console.log('Editing provider:', providerId)
        showNotification('Opening provider editor...', 'info')
        // Here you would open an edit modal or navigate to edit page
    }

    function activateProvider(providerId) {
        if (confirm('Are you sure you want to activate this provider?')) {
            const row = event.target.closest('tr')
            const statusCell = row.querySelector('.status-badge')
            const actionsCell = row.querySelector('.provider-actions')

            // Update status
            statusCell.textContent = 'Active'
            statusCell.className = 'status-badge active'

            // Update data attribute
            row.dataset.status = 'active'

            // Update actions - show deactivate instead of activate
            actionsCell.innerHTML = `
            <button class="action-btn view-btn" onclick="editProvider('${providerId}')" title="Edit">
                <i class="fas fa-edit"></i>
            </button>
            <button class="action-btn deactivate-btn" onclick="deactivateProvider('${providerId}')" title="Deactivate">
                Deactivate
            </button>
            <button class="action-btn danger-btn" onclick="deleteProvider('${providerId}')" title="Delete">
                <i class="fas fa-trash"></i>
            </button>
        `

            showNotification('Provider activated successfully!', 'success')
            updateProviderStats()
        }
    }

    function deactivateProvider(providerId) {
        if (confirm('Are you sure you want to deactivate this provider?')) {
            const row = event.target.closest('tr')
            const statusCell = row.querySelector('.status-badge')
            const actionsCell = row.querySelector('.provider-actions')

            // Update status
            statusCell.textContent = 'Inactive'
            statusCell.className = 'status-badge inactive'

            // Update data attribute
            row.dataset.status = 'inactive'

            // Update actions - show activate instead of deactivate
            actionsCell.innerHTML = `
            <button class="action-btn view-btn" onclick="editProvider('${providerId}')" title="Edit">
                <i class="fas fa-edit"></i>
            </button>
            <button class="action-btn activate-btn" onclick="activateProvider('${providerId}')" title="Activate">
                Activate
            </button>
            <button class="action-btn danger-btn" onclick="deleteProvider('${providerId}')" title="Delete">
                <i class="fas fa-trash"></i>
            </button>
        `

            showNotification('Provider deactivated successfully!', 'warning')
            updateProviderStats()
        }
    }

    function deleteProvider(providerId) {
        if (confirm('Are you sure you want to delete this provider? This action cannot be undone.')) {
            const row = event.target.closest('tr')
            row.remove()

            // Update count in section header
            const sectionHeader = document.querySelector('.section-header h3')
            if (sectionHeader) {
                const currentCount = parseInt(sectionHeader.textContent.match(/\((\d+)\)/)?.[1] || 0)
                sectionHeader.textContent = `Service Provider Directory (${Math.max(0, currentCount - 1)})`
            }

            showNotification('Provider deleted successfully!', 'success')
            updateProviderStats()
        }
    }

    function updateProviderStats() {
        const rows = document.querySelectorAll('.providers-table tbody tr')
        const totalProviders = rows.length

        let activeCount = 0
        let inactiveCount = 0

        rows.forEach(row => {
            const status = row.dataset.status
            if (status === 'active') activeCount++
            if (status === 'inactive') inactiveCount++
        })

        // Update stat cards
        const statCards = document.querySelectorAll('.stat-card')
        if (statCards.length >= 4) {
            // Total Providers
            const totalStatNumber = statCards[0].querySelector('.stat-number')
            if (totalStatNumber) totalStatNumber.textContent = totalProviders

            // Active Providers
            const activeStatNumber = statCards[1].querySelector('.stat-number')
            if (activeStatNumber) activeStatNumber.textContent = activeCount

            // Inactive Providers
            const inactiveStatNumber = statCards[2].querySelector('.stat-number')
            if (inactiveStatNumber) inactiveStatNumber.textContent = inactiveCount
        }
    }

    // Search and filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchProviders')
        const filterDropdown = document.getElementById('filterProviders')

        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase()
                filterProviders(searchTerm, filterDropdown.value)
            })
        }

        if (filterDropdown) {
            filterDropdown.addEventListener('change', function() {
                const searchTerm = searchInput.value.toLowerCase()
                filterProviders(searchTerm, this.value)
            })
        }
    })

    function filterProviders(searchTerm, statusFilter) {
        const rows = document.querySelectorAll('.providers-table tbody tr')
        let visibleCount = 0

        rows.forEach(row => {
            const rowText = row.textContent.toLowerCase()
            const rowStatus = row.dataset.status

            const matchesSearch = !searchTerm || rowText.includes(searchTerm)
            const matchesStatus = !statusFilter || rowStatus === statusFilter

            if (matchesSearch && matchesStatus) {
                row.style.display = ''
                visibleCount++
            } else {
                row.style.display = 'none'
            }
        })

        // Update section header count
        const sectionHeader = document.querySelector('.section-header h3')
        if (sectionHeader) {
            const baseText = sectionHeader.textContent.replace(/\(\d+\)/, '')
            sectionHeader.textContent = `${baseText}(${visibleCount})`
        }
    }
</script>

<?php require APPROOT . '/views/inc/admin_footer.php'; ?>