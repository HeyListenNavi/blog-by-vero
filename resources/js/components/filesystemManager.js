import initialTree from "../core/filesystem";

const HOME_PATH = ["home", "naviheylisten"];

export default {
    tree: initialTree,

    resolvePath(currentPath, pathString) {
        let newPath;

        switch (pathString[0]) {
            case "~":
                newPath = [...HOME_PATH];
                pathString = pathString.substring(1);
                break;
            case "/":
                newPath = [];
                break;
            default:
                newPath = [...currentPath];
                break;
        }

        const segments = pathString.split("/");

        for (const segment of segments) {
            if (segment === "" || segment === ".") continue;

            if (segment === "..") {
                newPath.pop();
            } else {
                newPath.push(segment);
            }
        }
        return newPath;
    },

    getNode(pathArray) {
        let current = this.tree;

        for (const segment of pathArray) {
            current = current.children?.[segment];

            if (!current) return null;
        }
        return current;
    },

    ls(path) {
        const node = this.getNode(path);
        if (node && node.type === "folder") {
            return Object.keys(node.children).map((key) => ({
                name: key,
                type: node.children[key].type,
            }));
        }
        return [];
    },

    cat(currentPath, pathString) {
        const fullPath = this.resolvePath(currentPath, pathString);
        const node = this.getNode(fullPath);

        if (node && node.type === "file") {
            return node.content;
        }
        return null;
    },

    verifyDir(currentPath, pathString) {
        const fullPath = this.resolvePath(currentPath, pathString);
        const node = this.getNode(fullPath);

        if (node && node.type === "folder") {
            return fullPath;
        }
        return false;
    },
};
