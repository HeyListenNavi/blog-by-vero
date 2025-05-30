import './bootstrap';
import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
import collapse from '@alpinejs/collapse'
import persist from '@alpinejs/persist'
import typewriter from '@marcreichel/alpine-typewriter';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

Alpine.plugin(persist)
Alpine.plugin(focus)
Alpine.plugin(collapse)
Alpine.plugin(typewriter)

window.Alpine = Alpine

Alpine.start()