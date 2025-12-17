export class Command {
    constructor(name, handler) {
        this.name = name;
        this.handler = handler;
    }

    run(flags, args, terminal) {
        return this.handler(flags, args, terminal);
    }
}

export const commandRegistry = {
    help: new Command("help", () => {
        const list = Object.keys(commandRegistry).join("\n");
        return `commands:\n${list}`;
    }),

    clear: new Command("clear", (_, __, terminal) => {
        terminal.clear();
    }),

    echo: new Command("echo", (_, args) => args.join(" ")),

    elmaifriend: new Command("elmaifriend", async () => {
        if (!confirm("Are you sure you want to ban yourself from the site?")) {
            return "welcome back!";
        }

        try {
            const response = await fetch(window.Laravel.banUrl, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    Accept: "application/json",
                    "X-CSRF-TOKEN": window.Laravel.csrfToken,
                },
            });

            if (response.ok) {
                window.location.reload();
                return "chao chaooo. You will now be banned.";
            }
            return `Error: Could not process the ban. Status: ${response.status}`;
        } catch (error) {
            console.error("Ban request failed:", error);
            return "A network error occurred.";
        }
    }),

    420169: new Command("420169", () => {
        return "this blog was officially brought with the help of our sponsor\n*drumroll*\nGABYYY\nthank you so much gaby for always being there as the good friend you are and for your five bucks";
    }),

    cd: new Command("cd", (_, args, terminal) => {
        const target = args[0];
        if (!target) return;

        const newPath = Alpine.store("fs").verifyDir(terminal.path, target);

        if (newPath) {
            terminal.path = newPath;
        } else {
            return `cd: ${target}: No such directory`;
        }
    }),

    cat: new Command("cat", (_, args, terminal) => {
        if (!args[0]) return "cat: missing file operand";

        const content = Alpine.store("fs").cat(terminal.path, args[0]);

        return content ? content : "cat: no such file";
    }),

    ls: new Command("ls", (_, __, terminal) => {
        const items = Alpine.store("fs").ls(terminal.path);

        if (items.length === 0) return "(empty)";

        return items
            .map((i) => (i.type === "folder" ? `${i.name}/` : i.name))
            .join("  ");
    }),

    git: new Command("git", async (_, __, terminal) => {
        try {
            const res = await fetch(
                "https://api.github.com/repos/HeyListenNavi/blog-by-vero/commits"
            );
            const commits = await res.json();
            const latest = commits[0];

            if (!latest) return "No commits found.";

            const { message, author } = latest.commit;
            return `=> ${message} \n\t\t(by ${author.name} on ${author.date})`;
        } catch (err) {
            console.error(err);
            return "Error fetching commit.";
        }
    }),

    kofi: new Command(
        "kofi",
        () => "Buy me a Kofi! \nhttps://ko-fi.com/naviheylisten"
    ),

    byte: new Command(
        "byte",
        () =>
            "Also check my job! ByteByte Studio\n@bytebytestudio in all social media\ngo to bytebytestudio.com"
    ),
};
