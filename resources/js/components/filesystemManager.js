import initialTree from "../core/filesystem";

const HOME_PATH = ['home', 'naviheylisten'];

export default {
    tree: initialTree,

    resolvePath(currentPath, pathString) {
        let newPath;

        if (pathString.startsWith('~')) {
            newPath = [...HOME_PATH];
            pathString = pathString.substring(1);
        } else if (pathString.startsWith('/')) {
            newPath = [];
        } else {
            newPath = [...currentPath];
        }

        const segments = pathString.split('/');

        for (const segment of segments) {
            if (segment === '' || segment === '.') continue;

            if (segment === '..') {
                if (newPath.length > 0) newPath.pop();
            } else {
                newPath.push(segment);
            }
        }
        return newPath;
    },

    getNode(pathArray) {
        let current = this.tree;

        for (const segment of pathArray) {
            if (current[segment]) {
                current = current[segment];
            } else if (current.children && current.children[segment]) {
                current = current.children[segment];
            } else {
                return null;
            }
        }
        return current;
    },

    ls(currentPath) {
        const node = this.getNode(currentPath);
        if (node && node.type === 'folder') {
            return Object.keys(node.children).map(key => ({
                name: key,
                type: node.children[key].type
            }));
        }
        return [];
    },

    cat(currentPath, pathString) {
        const fullPath = this.resolvePath(currentPath, pathString);
        const node = this.getNode(fullPath);

        if (node && node.type === 'file') {
            return node.content;
        }
        return null;
    },

    verifyDir(currentPath, pathString) {
        const fullPath = this.resolvePath(currentPath, pathString);
        const node = this.getNode(fullPath);

        if (node && node.type === 'folder') {
            return fullPath;
        }
        return false;
    }
};
