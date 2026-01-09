import "./bootstrap";

// DO NOT import Alpine here - Livewire v3 provides it via window.Alpine
// Livewire includes Alpine automatically

// Import AOS (Animate On Scroll)
import aosManager from "./components/aos";
window.aosManager = aosManager;

// Import components - they register with Alpine via alpine:init event listener
import "./components/theme";
import "./components/scroll";
import "./components/external-links";
import "./Livewire/navigation";
import "./components/navbar";
import "./components/footer";

// import home-page
import "./pages/home/home-page";

// import services-page
import "./pages/services-page";

// import about-page
import "./pages/about-page";

// import projects-page
import "./pages/projects/projects-page";

// import contact-page
import "./pages/contact-page";

// import auth login page
import "./pages/auth/login";

// import admin dashboard
import "./pages/admin/admin-dashboard";
import "./pages/admin/admin-pagination";
import "./pages/admin/visitor-charts";

// Alpine will be initialized by Livewire automatically

// Initialize AOS after Livewire is ready
document.addEventListener('livewire:initialized', () => {
    aosManager.init();
});
// Fallback initialization if Livewire doesn't fire event (for non-Livewire pages)
document.addEventListener('DOMContentLoaded', () => {
    if (!aosManager.initialized) {
        aosManager.init();
    }
});
