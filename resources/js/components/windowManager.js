import Alpine from "alpinejs";
import { Window } from "../core/window";

export default {
    windows: {},
    desktop: null,

    init() {
        this.desktop = document.getElementById("screen");
    },

    spawn(appTemplate) {
        if (!this.desktop) this.init();

        const name = appTemplate.getAttribute("name") || "Untitled";

        new Window(appTemplate, name, this.desktop, (winInstance) => {
            this.windows[winInstance.id] = winInstance;
        });
    },

    minimize(id) {
        if (this.isOpen(id)) this.windows[id].minimize();
    },

    maximize(id) {
        if (this.isOpen(id)) this.windows[id].maximize();
    },

    close(id) {
        if (this.isOpen(id)) {
            this.windows[id].close();
            delete this.windows[id];
        }
    },

    isOpen(id) {
        return Object.prototype.hasOwnProperty.call(this.windows, id);
    },

    get(id) {
        return this.windows[id];
    },
};
