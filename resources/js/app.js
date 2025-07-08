import './bootstrap';
import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'
import collapse from '@alpinejs/collapse'
import persist from '@alpinejs/persist'
import typewriter from '@marcreichel/alpine-typewriter';
import resize from '@alpinejs/resize'
import anchor from '@alpinejs/anchor'

import { gsap } from "gsap";

import { Draggable } from "gsap/Draggable";
import { InertiaPlugin } from "gsap/InertiaPlugin";

gsap.registerPlugin(Draggable, InertiaPlugin);

window.Draggable = Draggable;
window.gsap = gsap;

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

Alpine.plugin(persist)
Alpine.plugin(focus)
Alpine.plugin(collapse)
Alpine.plugin(typewriter)
Alpine.plugin(resize)
Alpine.plugin(anchor)

window.Alpine = Alpine

class Window {
    id;
    template;
    element;
    title;
    maximized;
    minimized;
    desktop;

    constructor(template, title, desktop, callback) {
        this.minimized = false;
        this.maximized = false;
        this.desktop = desktop;
        this.title = title;

        const app = template.content.cloneNode(true);
        desktop.appendChild(app);

        const window = desktop.lastElementChild;

        setTimeout(() => {
            this.id = window.id;
            this.element = window;

            this.makeDraggable();
            callback();
        })

    }

    minimize() {
        this.minimized = !this.minimized;
    }

    maximize() {
        this.maximized = !this.maximized;
    }

    close() {
        this.desktop.removeChild(this.element);
    }

    makeDraggable() {
        gsap.set(this.element, {
            position: 'absolute',
            top: '50%',
            left: '50%',
            xPercent: -50,
            yPercent: -50
        });

        const iframes = document.querySelectorAll('iframe');

        Draggable.create(this.element, {
            inertia: true,
            bounds: '#screen',
            trigger: `#${this.id} > #titlebar`,
            onPress: function () {
                iframes.forEach(iframe => {
                    iframe.style.pointerEvents = 'none';
                });
            },
            onRelease: function () {
                iframes.forEach(iframe => {
                    iframe.style.pointerEvents = 'auto';
                });
            },
        });
    }
}

Alpine.store('windowManager', {
    windows: {},
    desktop: document.getElementById('screen'),

    spawn(appTemplate) {
        let window = new Window(
            appTemplate,
            appTemplate.getAttribute('name') || 'Untitled',
            this.desktop,
            () => {
                this.windows[window.id] = window;
            }
        );
    },

    minimize(id) {
        this.windows[id].minimize();
    },

    maximize(id) {
        this.windows[id].maximize();
    },

    close(id) {
        this.windows[id].close();
        delete this.windows[id];
    },

    isOpen(id) {
        return id in this.windows;
    },

    get(id) {
        return this.windows[id];
    }
})

class Command {
    constructor(name, handler) {
        this.name = name;
        this.handler = handler;
    }

    run(flags, args, terminal) {
        return this.handler(flags, args, terminal);
    }
}

const commandRegistry = {
    help: new Command('help', () => {
        const list = Object.keys(commandRegistry)
            .join('\n');

        return `commands:\n${list}`;
    }),

    clear: new Command('clear', (_, __, terminal) => {
        terminal.clear();
        return;
    }),

    echo: new Command('echo', (_, args) => {
        return args.join(' ');
    }),

    elmaifriend: new Command('elmaifriend', () => {
        const confirmed = confirm('Are you sure you want to ban yourself from the site?');

        if (confirmed) {
            return 'chao chaooo';
        } else {
            return 'welcome back!';
        }
    }),

    420169: new Command('420169', () => {
        return 'this blog was oficially brought with the help of our sponsor\n*drumroll*\nGABYYY\nthank you so much gaby for always being there as the good friend you are and for your five bucks';
    }),

    ls: new Command('ls', (_, args, terminal) => {
        return Object.keys(terminal.fileSystem).join('\n');
    }),

    cat: new Command('cat', (_, args, terminal) => {
        if (args.length === 0) {
            return 'cat: missing file operand';
        }

        const file = terminal.fileSystem[args[0]];

        if (!file) {
            return 'cat: no such file'
        };

        return file;
    }),

    git: new Command('git', (_, __, terminal) => {
        fetch('https://api.github.com/repos/HeyListenNavi/blog-by-vero/commits')
            .then(res => res.json())
            .then(commits => {
                const latest = commits[0];

                if (!latest) {
                    terminal.outputHistory.push('No commits found.');
                    return;
                }

                const message = latest.commit.message;
                const author = latest.commit.author.name;
                const date = latest.commit.author.date;

                const formatted = `=> ${message} \n\t\t(by ${author} on ${date})`;
                terminal.print(formatted);
            })
            .catch(err => {
                terminal.print('Error fetching commit.');
                console.error(err);
            });

        return;
    }),

    kofi: new Command('kofi', () => {
        return 'Buy me a Kofi! \nhttps://ko-fi.com/naviheylisten';
    }),

    byte: new Command('byte', () => {
        return 'Also check my job! ByteByte Studio\n@bytebytestudio in all social media\ngo to bytebytestudio.com'
    }),
};

const files = {
    'pompompurin.txt':
        `⠀     ⢠⠔⠚⠒⢦⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⢠⠏⠀⠀⠀⣸⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⢸⡀⠀⠀⠀⡇⠀⠀⢀⠀⣠⣄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
⠀⠀⠀⢧⠀⠀⠀⢳⣾⣿⣿⣿⣿⣿⣶⣄⠀⠀⠀⠀⠀⢀⡀⠀⠀
⠀⠀⠀⠀⠑⡶⠀⠀⠙⠛⠻⠿⣿⣿⣿⣿⠷⠶⠒⠚⠉⠉⠉⠓⡄
⠀⠀⠀⠀⡼⠁⠀⠠⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⡇
⠀⡴⠲⢤⠇⠀⠀⠀⠀⣆⡸⠂⠀⠀⠐⠀⠀⠀⢶⣤⣀⣀⡤⠞⠁
⠀⢧⡀⠈⠀⠀⠀⠀⠀⠀⠀⠉⠁⠀⠀⠀⠀⠀⢈⡷⠒⢆⠀⠀⠀
⠀⠀⢹⡏⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣠⠏⠀⠀⠀
⠀⠀⢸⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⡏⠁⠀⠀⠀⠀
⢰⠒⠻⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⡇⠀⠀⠀⠀⠀
⢹⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⡼⠃⠀⠀⠀⠀⠀
⠀⠙⠲⠞⠓⠢⢤⣄⣀⠀⠀⠀⠀⠀⠀⠀⠀⠈⣹⠀⠀⠀⠀⠀⠀
⠀⠀⠀⠀⠀⠀⠀⠀⠈⠉⠉⠉⠉⠉⠛⠳⠤⠖⠃`,

    'cat.txt':
        `╱|_
(＞.＜7
 |       \\ 
 | |  | |  \\ノ`,

    'bow':
        `⠀⣾⣿⣦⣀⣴⣿⣷
⠀⠛⣻⣿⠛⣿⣟⠛
⢠⣾⣿⡏ ⠀⢹⣿⣷⡄
⠀⠀⡟ ⠀⠀⠀⢻⡀`,

    'navi': '@heylisten.navi in ig',
    'github': 'https://github.com/HeyListenNavi/blog-by-vero'
};

Alpine.data('terminal', () => ({
    outputHistory: [],
    commandHistory: [],
    historyIndex: 0,
    fileSystem: files,
    input: '',
    user: 'user',
    currentPath: '~',
    commands: commandRegistry,

    userPrompt() {
        return `${this.user}@verOS: ${this.currentPath}$`;
    },

    runCommand(input) {
        const [inputCommand, ...options] = input.trim().split(/\s+/);
        const command = this.commands[inputCommand];

        const flags = options.filter(p => p.startsWith('-'));
        const args = options.filter(p => !p.startsWith('-'));

        this.commandHistory.push(input);
        this.historyIndex = this.commandHistory.length;
        this.input = '';

        if (!command) {
            this.print('Command not found');
            return;
        }

        const output = command.run(flags, args, this);

        if (typeof output === 'string' && output.trim() !== '') {
            this.print(input, output);
        }
    },

    print(command, output) {
        this.outputHistory.push(`${this.currentPath}$ ${command} \n${output ?? ''}`);
        setTimeout(() => {
            const container = this.$refs.terminal;
            container.scrollTop = container.scrollHeight;
        });
    },

    nextCommand() {
        if (this.commandHistory.length === this.historyIndex) return;

        this.historyIndex++;
        this.input = this.commandHistory[this.historyIndex]
    },

    previousCommand() {
        if (this.historyIndex === 0) return;

        this.historyIndex--;
        this.input = this.commandHistory[this.historyIndex];
    },

    clear() {
        this.outputHistory = [];
    }
}))

Alpine.start()

/*!
 * long-press-event - v2.5.0
 * Pure JavaScript long-press-event
 * https://github.com/john-doherty/long-press-event
 * @author John Doherty <www.johndoherty.info>
 * @license MIT
 */
!function (e, t) { "use strict"; var n = null, a = "PointerEvent" in e || e.navigator && "msPointerEnabled" in e.navigator, i = "ontouchstart" in e || navigator.MaxTouchPoints > 0 || navigator.msMaxTouchPoints > 0, o = a ? "pointerdown" : i ? "touchstart" : "mousedown", r = a ? "pointerup" : i ? "touchend" : "mouseup", m = a ? "pointermove" : i ? "touchmove" : "mousemove", u = a ? "pointerleave" : i ? "touchleave" : "mouseleave", s = 0, c = 0, l = 10, v = 10; function f(e) { p(), e = function (e) { if (void 0 !== e.changedTouches) return e.changedTouches[0]; return e }(e), this.dispatchEvent(new CustomEvent("long-press", { bubbles: !0, cancelable: !0, detail: { clientX: e.clientX, clientY: e.clientY, offsetX: e.offsetX, offsetY: e.offsetY, pageX: e.pageX, pageY: e.pageY }, clientX: e.clientX, clientY: e.clientY, offsetX: e.offsetX, offsetY: e.offsetY, pageX: e.pageX, pageY: e.pageY, screenX: e.screenX, screenY: e.screenY })) || t.addEventListener("click", function e(n) { t.removeEventListener("click", e, !0), function (e) { e.stopImmediatePropagation(), e.preventDefault(), e.stopPropagation() }(n) }, !0) } function d(a) { p(a); var i = a.target, o = parseInt(function (e, n, a) { for (; e && e !== t.documentElement;) { var i = e.getAttribute(n); if (i) return i; e = e.parentNode } return a }(i, "data-long-press-delay", "1500"), 10); n = function (t, n) { if (!(e.requestAnimationFrame || e.webkitRequestAnimationFrame || e.mozRequestAnimationFrame && e.mozCancelRequestAnimationFrame || e.oRequestAnimationFrame || e.msRequestAnimationFrame)) return e.setTimeout(t, n); var a = (new Date).getTime(), i = {}, o = function () { (new Date).getTime() - a >= n ? t.call() : i.value = requestAnimFrame(o) }; return i.value = requestAnimFrame(o), i }(f.bind(i, a), o) } function p(t) { var a; (a = n) && (e.cancelAnimationFrame ? e.cancelAnimationFrame(a.value) : e.webkitCancelAnimationFrame ? e.webkitCancelAnimationFrame(a.value) : e.webkitCancelRequestAnimationFrame ? e.webkitCancelRequestAnimationFrame(a.value) : e.mozCancelRequestAnimationFrame ? e.mozCancelRequestAnimationFrame(a.value) : e.oCancelRequestAnimationFrame ? e.oCancelRequestAnimationFrame(a.value) : e.msCancelRequestAnimationFrame ? e.msCancelRequestAnimationFrame(a.value) : clearTimeout(a)), n = null } "function" != typeof e.CustomEvent && (e.CustomEvent = function (e, n) { n = n || { bubbles: !1, cancelable: !1, detail: void 0 }; var a = t.createEvent("CustomEvent"); return a.initCustomEvent(e, n.bubbles, n.cancelable, n.detail), a }, e.CustomEvent.prototype = e.Event.prototype), e.requestAnimFrame = e.requestAnimationFrame || e.webkitRequestAnimationFrame || e.mozRequestAnimationFrame || e.oRequestAnimationFrame || e.msRequestAnimationFrame || function (t) { e.setTimeout(t, 1e3 / 60) }, t.addEventListener(r, p, !0), t.addEventListener(u, p, !0), t.addEventListener(m, function (e) { var t = Math.abs(s - e.clientX), n = Math.abs(c - e.clientY); (t >= l || n >= v) && p() }, !0), t.addEventListener("wheel", p, !0), t.addEventListener("scroll", p, !0), t.addEventListener("contextmenu", p, !0), t.addEventListener(o, function (e) { s = e.clientX, c = e.clientY, d(e) }, !0) }(window, document);