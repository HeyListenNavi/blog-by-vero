import './bootstrap';
import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
import collapse from '@alpinejs/collapse'
import persist from '@alpinejs/persist'
import typewriter from '@marcreichel/alpine-typewriter';

import { gsap } from "gsap";
import { InertiaPlugin } from "gsap/InertiaPlugin";
import { Draggable } from "gsap/Draggable";

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

gsap.registerPlugin(Draggable, InertiaPlugin);

window.gsap = gsap;
window.Draggable = Draggable;

Alpine.plugin(persist)
Alpine.plugin(focus)
Alpine.plugin(collapse)
Alpine.plugin(typewriter)

window.Alpine = Alpine

Alpine.store('windowManager', {
    windows: [],
    desktop: document.getElementById("desktop"),

    spawn(appTemplate) {
        const app = appTemplate.content.cloneNode(true);
        this.desktop.appendChild(app);

        const window = this.desktop.lastElementChild;

        setTimeout(() => {
            this.windows.push(
                {
                    id: window.id,
                    title: window.getAttribute("name") || "Untitled",
                    minimized: false,
                    maximized: false,
                    element: window,
                }
            );
        })

    },

    minimize(id) {
        const index = this.findWindowIndex(id);
        if (index === -1) return;

        this.windows[index].minimized = !this.windows[index].minimized;
    },

    maximize(id) {
        const index = this.findWindowIndex(id);
        if (index === -1) return;

        this.windows[index].maximized = !this.windows[index].maximized;
    },

    close(id) {
        const index = this.findWindowIndex(id);
        if (index === -1) return;

        const window = this.windows[index];
        this.desktop.removeChild(window.element);
        this.windows.splice(index, 1);
    },

    isOpen(id) {
        return this.windows.some(function (window) {
            return window.id === id;
        });
    },

    findWindowIndex(id) {
        return this.windows.findIndex(function (window) {
            return window.id === id;
        });
    },

    get(id) {
        return this.windows.find(win => win.id === id);
    }
})

Alpine.start()