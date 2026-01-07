export default () => ({
    currentPath: ["home", "naviheylisten"],
    selectedItem: null,

    pinned: [
        { name: "Root", path: "/" },
        { name: "Home", path: "~/" },
        { name: "Links", path: "~/links" },
        { name: "pompompurin.txt", path: "~/pompompurin.txt" },
        { name: "cat.txt", path: "~/cat.txt" },
    ],

    get items() {
        return window.parent.Alpine.store("fs").ls(this.currentPath);
    },

    navigate(folderName) {
        this.currentPath.push(folderName);
        this.selectedItem = null;
    },

    goUp() {
        if (this.currentPath.length >= 0) {
            this.currentPath.pop();
            this.selectedItem = null;
        }
    },

    select(name) {
        this.selectedItem = name;
    },

    deselect() {
        this.selectedItem = null;
    },

    open(pathString) {
        const fs = window.parent.Alpine.store("fs");

        const fullPath = fs.resolvePath(this.currentPath, pathString);

        const node = fs.getNode(fullPath);

        if (node) {
            if (node.type === "folder") {
                this.currentPath = fullPath;
                this.selectedItem = null;
            } else if (node.type === "file") {
                window.parent.Alpine.store("windowManager").open("text-editor", node.content);
            }
        }
    },

    jumpTo(index) {
        this.currentPath = this.currentPath.slice(0, index + 1);
        this.selectedItem = null;
    },
});
