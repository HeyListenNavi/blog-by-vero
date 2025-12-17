import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
import collapse from "@alpinejs/collapse";
import persist from "@alpinejs/persist";
import typewriter from "@marcreichel/alpine-typewriter";
import resize from "@alpinejs/resize";
import anchor from "@alpinejs/anchor";
import { gsap } from "gsap";
import { Draggable } from "gsap/Draggable";
import { InertiaPlugin } from "gsap/InertiaPlugin";

export default function setupPlugins() {
    gsap.registerPlugin(Draggable, InertiaPlugin);
    window.Draggable = Draggable;
    window.gsap = gsap;

    Alpine.plugin(persist);
    Alpine.plugin(focus);
    Alpine.plugin(collapse);
    Alpine.plugin(typewriter);
    Alpine.plugin(resize);
    Alpine.plugin(anchor);

    window.Alpine = Alpine;
}
