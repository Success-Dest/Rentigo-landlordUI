// Tenant Dashboard JavaScript
document.addEventListener("DOMContentLoaded", () => {
  // Sidebar toggle functionality
  const sidebarToggle = document.getElementById("sidebarToggle")
  const mobileMenuToggle = document.getElementById("mobileMenuToggle")
  const sidebar = document.getElementById("sidebar")

  // Desktop sidebar toggle
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed")
    })
  }

  // Mobile sidebar toggle
  if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener("click", () => {
      sidebar.classList.toggle("open")
    })
  }

  // Close sidebar when clicking outside on mobile
  document.addEventListener("click", (event) => {
    if (window.innerWidth <= 1024) {
      if (!sidebar.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
        sidebar.classList.remove("open")
      }
    }
  })

  // User dropdown functionality
  const userMenuToggle = document.querySelector(".user-menu-toggle")
  const userDropdown = document.querySelector(".user-dropdown")

  if (userMenuToggle && userDropdown) {
    userMenuToggle.addEventListener("click", (e) => {
      e.preventDefault()
      userDropdown.style.display = userDropdown.style.display === "block" ? "none" : "block"
    })

    // Close dropdown when clicking outside
    document.addEventListener("click", (event) => {
      if (!userMenuToggle.contains(event.target)) {
        userDropdown.style.display = "none"
      }
    })
  }

  // Smooth scrolling for internal links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault()
      const target = document.querySelector(this.getAttribute("href"))
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        })
      }
    })
  })

  // Add loading states to buttons
  document.querySelectorAll('button[type="submit"]').forEach((button) => {
    button.addEventListener("click", function () {
      if (this.form && this.form.checkValidity()) {
        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...'
        this.disabled = true
      }
    })
  })

  // Auto-hide alerts after 5 seconds
  document.querySelectorAll(".alert").forEach((alert) => {
    setTimeout(() => {
      alert.style.opacity = "0"
      setTimeout(() => {
        alert.remove()
      }, 300)
    }, 5000)
  })

  // Initialize tooltips for sidebar items when collapsed
  function initTooltips() {
    const navLinks = document.querySelectorAll(".nav-link[data-tooltip]")
    navLinks.forEach((link) => {
      link.addEventListener("mouseenter", () => {
        if (sidebar.classList.contains("collapsed")) {
          // Show tooltip logic here if needed
        }
      })
    })
  }

  initTooltips()

  // Responsive sidebar handling
  function handleResize() {
    if (window.innerWidth > 1024) {
      sidebar.classList.remove("open")
    }
  }

  window.addEventListener("resize", handleResize)

  // Form validation enhancement
  const forms = document.querySelectorAll("form")
  forms.forEach((form) => {
    form.addEventListener("submit", (e) => {
      const requiredFields = form.querySelectorAll("[required]")
      let isValid = true

      requiredFields.forEach((field) => {
        if (!field.value.trim()) {
          field.classList.add("error")
          isValid = false
        } else {
          field.classList.remove("error")
        }
      })

      if (!isValid) {
        e.preventDefault()
        // Show error message
        const errorMsg = form.querySelector(".error-message") || document.createElement("div")
        errorMsg.className = "error-message"
        errorMsg.textContent = "Please fill in all required fields."
        if (!form.querySelector(".error-message")) {
          form.insertBefore(errorMsg, form.firstChild)
        }
      }
    })
  })

  // Add focus states for better accessibility
  document.querySelectorAll("input, select, textarea").forEach((field) => {
    field.addEventListener("focus", function () {
      this.parentElement.classList.add("focused")
    })

    field.addEventListener("blur", function () {
      this.parentElement.classList.remove("focused")
    })
  })
})

// Utility functions
function showNotification(message, type = "info") {
  const notification = document.createElement("div")
  notification.className = `notification notification-${type}`
  notification.innerHTML = `
        <i class="fas fa-${type === "success" ? "check-circle" : type === "error" ? "exclamation-circle" : "info-circle"}"></i>
        <span>${message}</span>
        <button class="notification-close">&times;</button>
    `

  document.body.appendChild(notification)

  // Auto remove after 5 seconds
  setTimeout(() => {
    notification.remove()
  }, 5000)

  // Manual close
  notification.querySelector(".notification-close").addEventListener("click", () => {
    notification.remove()
  })
}

function formatCurrency(amount) {
  return new Intl.NumberFormat("en-US", {
    style: "currency",
    currency: "USD",
  }).format(amount)
}

function formatDate(date) {
  return new Intl.DateTimeFormat("en-US", {
    year: "numeric",
    month: "long",
    day: "numeric",
  }).format(new Date(date))
}
