import fileSystem from "../config/filesystem";
import { commandRegistry } from "../core/command";

export default () => ({
    outputHistory: [],
    commandHistory: [],
    historyIndex: 0,
    fileSystem: fileSystem,
    input: "",
    user: "user",
    currentPath: "~",
    commands: commandRegistry,

    userPrompt() {
        return `${this.user}@verOS: ${this.currentPath}$`;
    },

    runCommand(input) {
        if (!input.trim()) return;

        const [inputCommand, ...options] = input.trim().split(/\s+/);

        const command = this.commands[inputCommand];

        this.recordHistory(input);

        this.print(`${this.userPrompt()} ${input}`);

        console.log(command)
        if (!command) {
            this.print("Command not found");
            return;
        }

        const flags = options.filter((p) => p.startsWith("-"));
        const args = options.filter((p) => !p.startsWith("-"));

        Promise.resolve(command.run(flags, args, this)).then((output) => {
            if (output) {
                this.print(output);
            }
        });
    },

    recordHistory(input) {
        this.commandHistory.push(input);
        this.historyIndex = this.commandHistory.length;
        this.input = "";
    },

    print(text) {
        this.outputHistory.push(text);
        this.$nextTick(() => {
            const container = this.$refs.terminal;
            if (container) container.scrollTop = container.scrollHeight;
        });
    },

    nextCommand() {
        if (this.commandHistory.length === this.historyIndex) return;
        this.historyIndex++;
        this.input = this.commandHistory[this.historyIndex] || "";
    },

    previousCommand() {
        if (this.historyIndex === 0) return;
        this.historyIndex--;
        this.input = this.commandHistory[this.historyIndex];
    },

    clear() {
        this.outputHistory = [];
    },
});
