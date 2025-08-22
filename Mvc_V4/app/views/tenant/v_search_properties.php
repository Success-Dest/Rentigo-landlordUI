<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="main-content">
    <div class="space-y-6">
        <div class="animate-fade-in">
            <h1 class="text-3xl font-bold text-foreground">Search Properties</h1>
            <p class="text-muted-foreground mt-2">Find your perfect rental property</p>
        </div>

        <!-- Filters -->
        <div class="filter-section animate-slide-up">
            <div class="flex items-center gap-2 mb-4">
                <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.707A1 1 0 013 7V4z"></path>
                </svg>
                <h3 class="text-lg font-semibold text-foreground">Filters</h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Location -->
                <div>
                    <label class="block text-sm font-medium text-foreground mb-1">Location</label>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <input type="text" id="location" placeholder="Enter location" class="form-input pl-10">
                    </div>
                </div>

                <!-- Price Range -->
                <div>
                    <label class="block text-sm font-medium text-foreground mb-1">Min Price</label>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        <input type="number" id="minPrice" placeholder="0" class="form-input pl-10">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-foreground mb-1">Max Price</label>
                    <div class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-4 h-4 text-muted-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        <input type="number" id="maxPrice" placeholder="5000" class="form-input pl-10">
                    </div>
                </div>

                <!-- Property Type -->
                <div>
                    <label class="block text-sm font-medium text-foreground mb-1">Property Type</label>
                    <select id="propertyType" class="form-input">
                        <option value="">All Types</option>
                        <option value="Apartment">Apartment</option>
                        <option value="House">House</option>
                        <option value="Studio">Studio</option>
                    </select>
                </div>

                <!-- Availability -->
                <div>
                    <label class="block text-sm font-medium text-foreground mb-1">Availability</label>
                    <select id="availability" class="form-input">
                        <option value="">All</option>
                        <option value="available">Available</option>
                        <option value="reserved">Reserved</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Results -->
        <div class="animate-scale-in">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-foreground">
                    <span id="propertyCount"><?php echo count($properties); ?></span> Properties Found
                </h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="propertiesGrid">
                <?php foreach($properties as $property): ?>
                <div class="property-card" data-location="<?php echo strtolower($property['location']); ?>" data-type="<?php echo $property['type']; ?>" data-price="<?php echo $property['price']; ?>" data-availability="<?php echo $property['availability']; ?>">
                    <div class="relative">
                        <img src="<?php echo $property['image']; ?>" alt="<?php echo $property['title']; ?>" class="w-full h-48 object-cover">
                        <div class="absolute top-3 right-3">
                            <?php if($property['availability'] === 'available'): ?>
                                <span class="status-badge bg-success-light text-success">Available</span>
                            <?php elseif($property['availability'] === 'reserved'): ?>
                                <span class="status-badge bg-warning-light text-warning">Reserved</span>
                            <?php else: ?>
                                <span class="status-badge bg-info-light text-info">Booked</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-3">
                            <h3 class="text-lg font-semibold text-foreground"><?php echo $property['title']; ?></h3>
                            <span class="text-xl font-bold text-primary">$<?php echo $property['price']; ?>/mo</span>
                        </div>
                        
                        <div class="flex items-center text-muted-foreground mb-3">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            </svg>
                            <span class="text-sm"><?php echo $property['location']; ?></span>
                            <span class="mx-2">•</span>
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span class="text-sm"><?php echo $property['type']; ?></span>
                        </div>
                        
                        <div class="flex flex-wrap gap-2 mb-4">
                            <?php foreach($property['features'] as $feature): ?>
                                <span class="status-badge bg-secondary text-secondary-foreground"><?php echo $feature; ?></span>
                            <?php endforeach; ?>
                        </div>
                        
                        <button onclick="reserveProperty(<?php echo $property['id']; ?>, '<?php echo $property['title']; ?>', '<?php echo $property['location']; ?>', <?php echo $property['price']; ?>, '<?php echo $property['image']; ?>')" 
                                <?php echo $property['availability'] !== 'available' ? 'disabled' : ''; ?>
                                class="w-full py-2 px-4 rounded-lg font-medium transition-colors <?php echo $property['availability'] === 'available' ? 'btn-primary' : 'bg-muted text-muted-foreground cursor-not-allowed'; ?>">
                            <?php echo $property['availability'] === 'available' ? 'Reserve Property' : 'Not Available'; ?>
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<!-- Reservation Modal -->
<div id="reservationModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-modal max-w-md w-full mx-4 animate-scale-in">
        <div class="flex items-center justify-between p-6 border-b border-border">
            <h3 class="text-lg font-semibold text-foreground" id="modalTitle">Confirm Reservation</h3>
            <button onclick="closeReservationModal()" class="p-2 hover:bg-sidebar-hover rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <div class="p-6" id="modalContent">
            <!-- Content will be populated by JavaScript -->
        </div>
    </div>
</div>

<script>
let selectedProperty = null;
let modalStep = 'confirm';

function reserveProperty(id, title, location, price, image) {
    selectedProperty = { id, title, location, price, image };
    modalStep = 'confirm';
    showReservationModal();
}

function showReservationModal() {
    const modal = document.getElementById('reservationModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalContent = document.getElementById('modalContent');
    
    if (modalStep === 'confirm') {
        modalTitle.textContent = 'Confirm Reservation';
        modalContent.innerHTML = `
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <img src="${selectedProperty.image}" alt="${selectedProperty.title}" class="w-16 h-16 object-cover rounded-lg">
                    <div>
                        <h4 class="font-semibold text-foreground">${selectedProperty.title}</h4>
                        <p class="text-sm text-muted-foreground">${selectedProperty.location}</p>
                        <p class="text-lg font-bold text-primary">$${selectedProperty.price}/mo</p>
                    </div>
                </div>

                <div class="bg-warning-light p-4 rounded-lg">
                    <div class="flex items-start space-x-3">
                        <svg class="w-5 h-5 text-warning mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-medium text-warning">Reservation Terms</p>
                            <p class="text-sm text-foreground mt-1">
                                Your reservation will be held for 48 hours. Please visit our office to complete the rental agreement.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="flex space-x-3">
                    <button onclick="closeReservationModal()" class="btn-secondary flex-1">Cancel</button>
                    <button onclick="confirmReservation()" class="btn-primary flex-1">Confirm Reservation</button>
                </div>
            </div>
        `;
    } else {
        modalTitle.textContent = 'Reservation Confirmed!';
        modalContent.innerHTML = `
            <div class="text-center space-y-4">
                <div class="w-16 h-16 bg-success rounded-full flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8 text-success-foreground" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <h4 class="text-xl font-semibold text-foreground">Reservation Confirmed!</h4>
                <p class="text-muted-foreground">
                    Your reservation for <strong>${selectedProperty.title}</strong> is confirmed for 48 hours. 
                    Please visit our office to complete the agreement.
                </p>
                <div class="bg-success-light p-4 rounded-lg">
                    <p class="text-sm font-medium text-success">Next Steps:</p>
                    <ul class="text-sm text-foreground mt-1 space-y-1">
                        <li>• Visit our office within 48 hours</li>
                        <li>• Bring required documents</li>
                        <li>• Complete rental agreement</li>
                    </ul>
                </div>
            </div>
        `;
    }
    
    modal.classList.remove('hidden');
}

function confirmReservation() {
    modalStep = 'success';
    showReservationModal();
    
    setTimeout(() => {
        closeReservationModal();
        modalStep = 'confirm';
    }, 3000);
}

function closeReservationModal() {
    document.getElementById('reservationModal').classList.add('hidden');
}

// Filter functionality
function filterProperties() {
    const location = document.getElementById('location').value.toLowerCase();
    const minPrice = parseInt(document.getElementById('minPrice').value) || 0;
    const maxPrice = parseInt(document.getElementById('maxPrice').value) || 999999;
    const propertyType = document.getElementById('propertyType').value;
    const availability = document.getElementById('availability').value;
    
    const properties = document.querySelectorAll('.property-card');
    let visibleCount = 0;
    
    properties.forEach(property => {
        const propLocation = property.dataset.location;
        const propType = property.dataset.type;
        const propPrice = parseInt(property.dataset.price);
        const propAvailability = property.dataset.availability;
        
        const matchesLocation = !location || propLocation.includes(location);
        const matchesPrice = propPrice >= minPrice && propPrice <= maxPrice;
        const matchesType = !propertyType || propType === propertyType;
        const matchesAvailability = !availability || propAvailability === availability;
        
        if (matchesLocation && matchesPrice && matchesType && matchesAvailability) {
            property.style.display = 'block';
            visibleCount++;
        } else {
            property.style.display = 'none';
        }
    });
    
    document.getElementById('propertyCount').textContent = visibleCount;
}

// Add event listeners for filters
document.getElementById('location').addEventListener('input', filterProperties);
document.getElementById('minPrice').addEventListener('input', filterProperties);
document.getElementById('maxPrice').addEventListener('input', filterProperties);
document.getElementById('propertyType').addEventListener('change', filterProperties);
document.getElementById('availability').addEventListener('change', filterProperties);
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>
