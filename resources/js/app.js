import "./bootstrap";
import setupPlugins from "./setup";
import vendor from "./vendor/vendor";
import windowManager from "./components/windowManager";
import terminal from "./components/terminal";
import filesystemManager from "./components/filesystemManager";

import.meta.glob(["../images/**", "../fonts/**"]);

setupPlugins();

Alpine.store("windowManager", windowManager);
Alpine.data("terminal", terminal);
Alpine.store("fs", filesystemManager);

Alpine.start();

vendor();
