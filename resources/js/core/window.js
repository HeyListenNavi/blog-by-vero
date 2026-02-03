import { gsap } from "gsap";
import { Draggable } from "gsap/Draggable";

export class Window {
    constructor(template, title, desktop, callback) {
        this.minimized = false;
        this.maximized = false;
        this.desktop = desktop;
        this.title = title;

        const app = template.content.cloneNode(true);
        desktop.appendChild(app);

        const windowEl = desktop.lastElementChild;

        requestAnimationFrame(() => {
            this.id = windowEl.id;
            this.element = windowEl;
            this.element.style.zIndex = Draggable.zIndex - 1;
            this.makeDraggable();
            if (callback) callback(this);
        });
    }

    minimize() {
        this.minimized = !this.minimized;
    }

    maximize() {
        this.maximized = !this.maximized;
    }

    close() {
        if (this.element && this.element.parentNode) {
            this.element.parentNode.removeChild(this.element);
        }
    }

    makeDraggable() {
        const hasPositionClass = [...this.element.classList].some(
            (cls) =>
                cls.startsWith("top-") ||
                cls.startsWith("left-") ||
                cls.startsWith("right-") ||
                cls.startsWith("bottom-"),
        );

        const iframes = document.querySelectorAll("iframe");
        const togglePointerEvents = (state) => {
            iframes.forEach((iframe) => (iframe.style.pointerEvents = state));
        };

        Draggable.create(this.element, {
            inertia: true,
            bounds: "#screen",
            trigger: `#${this.id} > #titlebar`,
            allowEventDefault: true,
            onPress: () => togglePointerEvents("none"),
            onRelease: () => togglePointerEvents("auto"),
        });

        if (!hasPositionClass) {
            gsap.set(this.element, {
                position: "absolute",
                top: "50%",
                left: "50%",
                xPercent: -50,
                yPercent: -50,
            });

            return;
        }

        gsap.set(this.element, {
            position: "absolute",
            xPercent: 0,
            yPercent: 0,
        });
    }
}
