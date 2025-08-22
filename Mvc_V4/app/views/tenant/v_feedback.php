<?php require APPROOT . '/views/inc/tenant_header.php'; ?>

<div class="main-content">
    <div class="space-y-6">
        <div class="animate-fade-in">
            <h1 class="text-3xl font-bold text-foreground">Platform Feedback</h1>
            <p class="text-muted-foreground mt-2">Help us improve your experience</p>
        </div>

        <div id="successMessage" class="dashboard-card p-12 text-center animate-scale-in hidden">
            <svg class="w-16 h-16 text-success mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <h3 class="text-xl font-semibold text-foreground mb-2">Thank You!</h3>
            <p class="text-muted-foreground mb-6">
                Your feedback has been submitted successfully. We appreciate your input!
            </p>
            <button onclick="submitMoreFeedback()" class="btn-primary">Submit More Feedback</button>
        </div>

        <div id="feedbackForm" class="dashboard-card animate-slide-up">
            <div class="p-6 border-b border-border">
                <h3 class="text-lg font-semibold text-foreground">Rate Your Experience</h3>
            </div>
            
            <form onsubmit="submitFeedback(event)" class="p-6 space-y-6">
                <div class="text-center">
                    <label class="block text-sm font-medium text-foreground mb-4">
                        How would you rate your overall experience with our platform?
                    </label>
                    <div class="flex justify-center space-x-1" id="feedbackStars">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <button type="button" onclick="setFeedbackRating(<?php echo $i; ?>)" class="feedback-star text-muted-foreground hover:text-warning" data-rating="<?php echo $i; ?>">
                                <svg class="w-8 h-8 fill-current" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </button>
                        <?php endfor; ?>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-foreground mb-1">
                        Comments & Suggestions
                    </label>
                    <textarea id="feedbackComment" placeholder="Share your thoughts, suggestions, or report any issues..." class="form-input min-h-32" required></textarea>
                </div>

                <button type="submit" id="submitFeedbackBtn" class="btn-primary w-full opacity-50 cursor-not-allowed" disabled>
                    Submit Feedback
                </button>
            </form>
        </div>
    </div>
</div>

<script>
let feedbackRating = 0;
let feedbackSubmitStatus = 'idle';

function setFeedbackRating(rating) {
    feedbackRating = rating;
    updateFeedbackStarDisplay();
    updateFeedbackSubmitButton();
}

function updateFeedbackStarDisplay() {
    const stars = document.querySelectorAll('.feedback-star');
    stars.forEach((star, index) => {
        if (index < feedbackRating) {
            star.classList.remove('text-muted-foreground');
            star.classList.add('text-warning');
        } else {
            star.classList.remove('text-warning');
            star.classList.add('text-muted-foreground');
        }
    });
}

function updateFeedbackSubmitButton() {
    const submitBtn = document.getElementById('submitFeedbackBtn');
    if (feedbackRating > 0) {
        submitBtn.disabled = false;
        submitBtn.classList.remove('opacity-50', 'cursor-not-allowed');
    } else {
        submitBtn.disabled = true;
        submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    }
}

function submitFeedback(e) {
    e.preventDefault();
    if (feedbackRating === 0 || feedbackSubmitStatus === 'submitting') return;
    
    feedbackSubmitStatus = 'submitting';
    const submitBtn = document.getElementById('submitFeedbackBtn');
    submitBtn.textContent = 'Submitting...';
    submitBtn.disabled = true;
    submitBtn.classList.add('opacity-50', 'cursor-not-allowed');
    
    // Simulate submission
    setTimeout(() => {
        feedbackSubmitStatus = 'success';
        document.getElementById('feedbackForm').classList.add('hidden');
        document.getElementById('successMessage').classList.remove('hidden');
        
        // Reset form
        document.getElementById('feedbackComment').value = '';
        feedbackRating = 0;
        updateFeedbackStarDisplay();
    }, 2000);
}

function submitMoreFeedback() {
    feedbackSubmitStatus = 'idle';
    document.getElementById('feedbackForm').classList.remove('hidden');
    document.getElementById('successMessage').classList.add('hidden');
    
    const submitBtn = document.getElementById('submitFeedbackBtn');
    submitBtn.textContent = 'Submit Feedback';
    updateFeedbackSubmitButton();
}
</script>

<?php require APPROOT . '/views/inc/tenant_footer.php'; ?>
