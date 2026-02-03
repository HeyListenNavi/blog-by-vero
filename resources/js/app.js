import "./bootstrap";
import setupPlugins from "./setup";
import vendor from "./vendor/vendor";
import windowManager from "./components/windowManager";
import terminal from "./components/terminal";
import filesystemManager from "./components/filesystemManager";
import fileExplorer from "./components/fileExplorer";
import dancingCat from "./components/dancingCat";
import musicPlayer from "./components/musicPlayer";

import.meta.glob(["../images/**", "../fonts/**"]);

setupPlugins();

Alpine.store("windowManager", windowManager);
Alpine.data("terminal", terminal);
Alpine.store("fs", filesystemManager);
Alpine.data("fileExplorer", fileExplorer);
Alpine.data("dancingCat", dancingCat);
Alpine.data("musicPlayer", musicPlayer)

Alpine.start();

vendor();
