import { Window } from "../core/window";

export default {
    windows: {},
    desktop: null,
    appRegistry: {},

    init() {
        this.desktop = document.getElementById("screen");
    },

    register(appName, templateElement) {
        const id = appName.toLowerCase().replace(/\s+/g, "-");
        this.appRegistry[id] = templateElement;
    },

    open(appId, data = null) {
        const id = appId.toLowerCase().replace(/\s+/g, "-");
        const template = this.appRegistry[id];

        if (template) {
            this.spawn(template, data);
        }
    },

    spawn(appTemplate, data = null) {
        if (!this.desktop) this.init();

        const name = appTemplate.getAttribute("name") || "Untitled";

        new Window(appTemplate, name, this.desktop, (winInstance) => {
            this.windows[winInstance.id] = winInstance;

            if (data) {
                winInstance.element.dispatchEvent(
                    new CustomEvent("appdata", {
                        detail: data,
                        bubbles: true,
                    })
                );
            }
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
