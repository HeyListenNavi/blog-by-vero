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

Alpine.start()