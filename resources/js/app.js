import './bootstrap';
import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
import collapse from '@alpinejs/collapse'
import persist from '@alpinejs/persist'
import typewriter from '@marcreichel/alpine-typewriter';

import { createDraggable } from 'animejs';

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

window.createDraggable = createDraggable;

Alpine.plugin(persist)
Alpine.plugin(focus)
Alpine.plugin(collapse)
Alpine.plugin(typewriter)

window.Alpine = Alpine

Alpine.store('windowManager', {
    windows: [],
    desktop: document.getElementById("screen"),

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

/*!
 * long-press-event - v2.5.0
 * Pure JavaScript long-press-event
 * https://github.com/john-doherty/long-press-event
 * @author John Doherty <www.johndoherty.info>
 * @license MIT
 */
!function(e,t){"use strict";var n=null,a="PointerEvent"in e||e.navigator&&"msPointerEnabled"in e.navigator,i="ontouchstart"in e||navigator.MaxTouchPoints>0||navigator.msMaxTouchPoints>0,o=a?"pointerdown":i?"touchstart":"mousedown",r=a?"pointerup":i?"touchend":"mouseup",m=a?"pointermove":i?"touchmove":"mousemove",u=a?"pointerleave":i?"touchleave":"mouseleave",s=0,c=0,l=10,v=10;function f(e){p(),e=function(e){if(void 0!==e.changedTouches)return e.changedTouches[0];return e}(e),this.dispatchEvent(new CustomEvent("long-press",{bubbles:!0,cancelable:!0,detail:{clientX:e.clientX,clientY:e.clientY,offsetX:e.offsetX,offsetY:e.offsetY,pageX:e.pageX,pageY:e.pageY},clientX:e.clientX,clientY:e.clientY,offsetX:e.offsetX,offsetY:e.offsetY,pageX:e.pageX,pageY:e.pageY,screenX:e.screenX,screenY:e.screenY}))||t.addEventListener("click",function e(n){t.removeEventListener("click",e,!0),function(e){e.stopImmediatePropagation(),e.preventDefault(),e.stopPropagation()}(n)},!0)}function d(a){p(a);var i=a.target,o=parseInt(function(e,n,a){for(;e&&e!==t.documentElement;){var i=e.getAttribute(n);if(i)return i;e=e.parentNode}return a}(i,"data-long-press-delay","1500"),10);n=function(t,n){if(!(e.requestAnimationFrame||e.webkitRequestAnimationFrame||e.mozRequestAnimationFrame&&e.mozCancelRequestAnimationFrame||e.oRequestAnimationFrame||e.msRequestAnimationFrame))return e.setTimeout(t,n);var a=(new Date).getTime(),i={},o=function(){(new Date).getTime()-a>=n?t.call():i.value=requestAnimFrame(o)};return i.value=requestAnimFrame(o),i}(f.bind(i,a),o)}function p(t){var a;(a=n)&&(e.cancelAnimationFrame?e.cancelAnimationFrame(a.value):e.webkitCancelAnimationFrame?e.webkitCancelAnimationFrame(a.value):e.webkitCancelRequestAnimationFrame?e.webkitCancelRequestAnimationFrame(a.value):e.mozCancelRequestAnimationFrame?e.mozCancelRequestAnimationFrame(a.value):e.oCancelRequestAnimationFrame?e.oCancelRequestAnimationFrame(a.value):e.msCancelRequestAnimationFrame?e.msCancelRequestAnimationFrame(a.value):clearTimeout(a)),n=null}"function"!=typeof e.CustomEvent&&(e.CustomEvent=function(e,n){n=n||{bubbles:!1,cancelable:!1,detail:void 0};var a=t.createEvent("CustomEvent");return a.initCustomEvent(e,n.bubbles,n.cancelable,n.detail),a},e.CustomEvent.prototype=e.Event.prototype),e.requestAnimFrame=e.requestAnimationFrame||e.webkitRequestAnimationFrame||e.mozRequestAnimationFrame||e.oRequestAnimationFrame||e.msRequestAnimationFrame||function(t){e.setTimeout(t,1e3/60)},t.addEventListener(r,p,!0),t.addEventListener(u,p,!0),t.addEventListener(m,function(e){var t=Math.abs(s-e.clientX),n=Math.abs(c-e.clientY);(t>=l||n>=v)&&p()},!0),t.addEventListener("wheel",p,!0),t.addEventListener("scroll",p,!0),t.addEventListener("contextmenu",p,!0),t.addEventListener(o,function(e){s=e.clientX,c=e.clientY,d(e)},!0)}(window,document);