import "./bootstrap";

// DO NOT import Alpine here - Livewire v3 provides it via window.Alpine
// Livewire includes Alpine automatically

// Import components - they register with Alpine via alpine:init event listener
import "./components/theme";
import "./components/scroll";
import "./Livewire/navigation";
import "./components/navbar";
import "./components/footer";

// Alpine will be initialized by Livewire automatically
